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
        $categories = Categorys::orderByDesc('id')->paginate(15);
        $successMessage = session('success', ''); // Recupera el mensaje de éxito -> ¿Si existe?
        return view('categories.index', ['categories' => $categories])
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
        Categorys::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return redirect('/category')
        ->with('success', 'Categoría registrado exitosamente.');
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
        $category = $this->show($id);
        $category->name = $request->name;
        $category->description = $request->description;
        if($category->save()) {
            return back()->with('success', 'Categoría actualizada exitosamente.');
        }

        return back()->with('error', 'Fallo al actualizar la categoria.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->show($id);

        if ($category) {
            $category->delete();
            return redirect('/category')
            ->with('success', 'Categoría eliminado exitosamente.');
        }

        return redirect('/category')
        ->with('error', 'Fallo al eliminar la categoria.');
    }
}
