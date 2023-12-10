<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorys::orderByDesc('id')->paginate(20);
        $successMessage = session('success', ''); // Recupera el mensaje de éxito -> ¿Si existe?
        return view('categories.index', [
            'categories' => $categories,
            'active' => true,
            'isNotFound' => false
        ])
        ->with('success', $successMessage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ], [
            'name.required' => 'El campo titulo es obligatorio.',
            'name.max' => 'El campo titulo no debe tener más de 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
        ]);

        $category = new Categorys();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->isPublished = $request->ispublished ? true : false;

        if($category->save()) {
            return back()->with('success', 'Categoría registrada con éxito.');
        }

        return back()->with('error', 'Fallo al crear la categoría.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Categorys::find($id);
        if(!$category) {
            return 'No ha resultados de la categoria con ID: #' + strval($id);
        }
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = $this->show($id);
        return view('categories.edit', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ], [
            'name.required' => 'El campo titulo es obligatorio.',
            'name.max' => 'El campo titulo no debe tener más de 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
        ]);

        $category = $this->show($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->isPublished = $request->ispublished ? true : false;

        if($category->save()) {
            return back()->with('success', 'Categoría actualizada exitosamente.');
        }

        return back()->with('error', 'Fallo al actualizar la categoría.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->show($id);

        try {
            if ($category) {
                $category->delete();
                return redirect('/category')->with('success', 'Categoría eliminado exitosamente.');
                return back()
                ->with('success', 'Categoría eliminado exitosamente.');
            }

            return redirect('/category')->with('error', 'Fallo al eliminar la categoría.');

        } catch (\Throwable $th) {
            return redirect('/category')->with('error', "Fallo al eliminar la categoría. Verifica si hay documentos asociados.");
        }
    }


    public function searchCategory(Request $category) {
        $categories = Categorys::where('name', 'LIKE', '%' . $category->keywords . '%')->paginate(20);
        $isNotFound = $categories->count() < 1; // True o False
        return view('categories.index', ['categories' => $categories, 'isNotFound' => $isNotFound]);
    }
}
