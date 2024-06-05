<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Str;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller {
    public function index() {
        $news = News::paginate(5);
        return view('dashboard.news.index', compact('news'));
    }
    
    public function create() {
        return view('dashboard.news.create');
    }

    public function store(NewsRequest $request) {
        // Verificar si el archivo 'url' se ha cargado y es válido
        if ($request->hasFile('url') && $request->file('url')->isValid()) {
            $imagePath = $request->file('url')->store('public/img');
            $img = Storage::url($imagePath);
        } else {
            return redirect()->back()->withInput()->withErrors(['url' => 'Error al cargar el archivo.']);
        }
        
        // Verificar si el título está presente y es válido
        if (!$request->filled('title')) {
            return redirect()->back()->withInput()->withErrors(['title' => 'El título es obligatorio']);
        }
        
        // Generar el slug a partir del título
        $slug = Str::slug($request->input('title'));
    
     
    
        // Crear una nueva instancia de News con el slug generado
        $news = new News([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'slug' => $slug, 
            'date_of_the_new_story' => $request->input('date_of_the_new_story'),
            'url' => $img,
        ]);
    
        // Guardar la nueva noticia
        $news->save();
    
        return redirect()->route('news.index')->with('success', 'Noticia creada exitosamente.');
    }
    
    

    public function show(News $news) {
        return view('dashboard.news.show', compact('news'));
    }

    public function edit(News $news) {
        return view('dashboard.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news) {
        $data = $request->validated();

        if ($request->hasFile('url') && $request->file('url')->isValid()) {
            $imagePath = $request->file('url')->store('public/img');
            $data['url'] = Storage::url($imagePath);
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Noticia actualizada exitosamente.');
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