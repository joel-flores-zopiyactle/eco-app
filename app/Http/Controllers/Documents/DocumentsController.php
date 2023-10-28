<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $document)
    {
        $document->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $newCategory = new CategoryController();
        $category = $newCategory->show($document['category_id']);

        echo($document->title);
        $doc = new Documents();
        $doc->title = $document->title ?? 'Hola';
        $doc->description = $document->description;
        $doc->type = 'pdf';
        $doc->category()->associate($category);
        $doc->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
