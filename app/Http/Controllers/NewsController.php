<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Support\Str;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller {
    public function index() {
        $news = News::with('images')->paginate(5);
        return view('dashboard.news.index', compact('news'));
    }
    public function create() {
        return view('dashboard.news.create');
    }
    public function store(NewsRequest $request) {
        try {
            // Validar y almacenar imágenes
            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    if ($image->isValid()) {
                        $imagePath = $image->store('public/img');
                        $imageUrl = Storage::url($imagePath);
                        $isMain = $index === 0; // Marcar la primera imagen como principal

                        $images[] = [
                            'url' => $imageUrl,
                            'is_main' => $isMain,
                        ];
                    } else {
                        return response()->json(['error' => 'Error al cargar una de las imágenes.'], 422);
                    }
                }
            }

            // Crear slug a partir del título
            $slug = Str::slug($request->input('title'));

            // Crear nueva instancia de News con los datos del formulario
            $news = new News([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'slug' => $slug,
                'date_of_the_new_story' => $request->input('date_of_the_new_story'),
            ]);

            // Guardar la noticia en la base de datos
            $news->save();

            // Guardar las URLs de las imágenes como registros en la base de datos
            foreach ($images as $imageData) {
                $news->images()->create([
                    'url' => $imageData['url'],
                    'is_main' => $imageData['is_main'],
                ]);
            }

            // Retornar respuesta JSON con éxito y el ID de la noticia
            return response()->json(['id' => $news->id, 'success' => true]);
        } catch (\Exception $e) {
            // Loguear el error para depuración
            \Log::error('Error al guardar la noticia: ' . $e->getMessage());

            // Manejar errores y retornar mensaje de error
            return response()->json(['error' => 'Error al guardar la noticia: ' . $e->getMessage()], 422);
        }
    }

  
    public function show(News $news) {
        return view('dashboard.news.show', compact('news'));
    }

    public function edit(News $news) {
        return view('dashboard.news.edit', compact('news'));
    }
    public function update(UpdateNewsRequest $request, News $news) {
        if ($request->hasFile('url') && $request->file('url')->isValid()) {
            // Eliminar la imagen anterior
            if ($news->url) {
                $oldImagePath = str_replace('/storage', 'public', $news->url);
                Storage::delete($oldImagePath);
            }
            // Guardar la nueva imagen
            $imagePath = $request->file('url')->store('public/img');
            $img = Storage::url($imagePath);
            $news->url = $img;
        }
    
        $slug = Str::slug($request->input('title'));
    
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->content = $request->input('content');
        $news->slug = $slug;
        $news->date_of_the_new_story = $request->input('date_of_the_new_story');
        $changes = $news->getChanges();
        try {
            $news->save();
            if (empty($changes)) {
                return redirect()->route('news.show', $news->id);
            }
            return response()->json([
                'success' => true,
                'id' => $news->id,
                'redirect_url' => route('news.show', $news->id)
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withInput()->withErrors(['error' => 'Error al actualizar la noticia: ' . $e->getMessage()]);
        }
    }    
    public function deactivate(News $news) {
        $news->update(['state' => 0]);

        return redirect()->route('news.index')->with('success', 'Noticia desactivada exitosamente.');
    }
    public function activate(News $news) {
        try {
            $news->update(['state' => 1]);
            return redirect()->route('news.index')->with('success', 'Noticia activada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Ha ocurrido un error al activar la noticia.');
        }
    }
    
}