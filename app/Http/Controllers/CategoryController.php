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
        $category = Categorys::orderByDesc('id')->paginate(15);
        $successMessage = session('success', ''); // Recupera el mensaje de éxito -> ¿Si existe?
        return view('categorys.index', ['categorys' => $category])
        ->with('successMessage', $successMessage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorys.create');
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

        notify()->success('Categoría registrado exitosamente.');
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
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
