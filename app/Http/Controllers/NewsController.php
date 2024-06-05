<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Muestra una lista paginada de noticias.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        try {
            $news = News::paginate(5);
            return view('dashboard.news.index', compact('news'));
        } catch (\Exception $e) {
            abort(500, 'Error interno del servidor.');
        }
    }

    /**
     * Muestra el formulario para crear una nueva noticia.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.news.create');
    }

    /**
     * Almacena una nueva noticia en la base de datos.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsRequest $request) {
        try {
            if ($request->hasFile('url') && $request->file('url')->isValid()) {
                $imagePath = $request->file('url')->store('public/img');
                $img = Storage::url($imagePath); // Esto genera la URL correcta para la imagen
            } else {
                throw new \Exception('Error al cargar el archivo.');
            }
    
            $slug = Str::slug($request->input('title'));
    
            $news = new News([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'slug' => $slug,
                'date_of_the_new_story' => $request->input('date_of_the_new_story'),
                'url' => $img,
            ]);
    
            $news->save();
    
            return response()->json([ 'success' => 'se a guardado corecta mente', 'redirect' => route('news.index')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }           
    }


    /**
     * Muestra una noticia específica.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View
     */
    public function show(News $news)
    {
        return view('dashboard.news.show', compact('news'));
    }

    /**
     * Muestra el formulario para editar una noticia.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        return view('dashboard.news.edit', compact('news'));
    }

    /**
     * Actualiza una noticia existente en la base de datos.
     *
     * @param  \App\Http\Requests\NewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsRequest $request, News $news) {
        try {
            $validatedData = $request->validated(); // Obtener los datos validados del formulario
    
            if ($request->hasFile('url') && $request->file('url')->isValid()) {
                // Guardar la nueva imagen
                $imagePath = $request->file('url')->store('public/img');
                $img = Storage::url($imagePath);
                // Actualizar la URL de la imagen solo si se proporciona un nuevo archivo
                $validatedData['url'] = $img;
            } else {
                // Si no se proporciona un nuevo archivo, mantener la URL existente
                $validatedData['url'] = $news->url;
            }
    
            // Actualizar la noticia con los datos validados
            $news->update($validatedData);
    
            // Redirigir a la página de índice de noticias con un mensaje de éxito
            return redirect()->route('news.index')->with('success', 'La noticia se ha actualizado correctamente.');
        } catch (\Exception $e) {
            // En caso de error, redirigir de nuevo al formulario de edición con el mensaje de error
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }    
      
    /**
     * Desactiva una noticia.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deactivate(News $news)
    {
        try {
            $news->update(['state' => 0]);
            return redirect()->route('news.index')->with('success', 'Noticia desactivada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Ha ocurrido un error al desactivar la noticia.');
        }
    }

    /**
     * Activa una noticia.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activate(News $news)
    {
        try {
            $news->update(['state' => 1]);
            return redirect()->route('news.index')->with('success', 'Noticia activada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('news.index')->with('error', 'Ha ocurrido un error al activar la noticia.');
        }
    }
}