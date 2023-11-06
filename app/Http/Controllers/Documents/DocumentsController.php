<?php

namespace App\Http\Controllers\Documents;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

use App\Http\Controllers\CategoryController;
use App\Models\Categorys;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $documents = Documents::orderByDesc('id')->paginate(10);

        return view('documents.index', [
            'documents' => $documents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Categorys::all();
        return view('documents.create', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $document)
    {
        $document->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png,jpeg' // Validación del tipo de archivo
        ]);

        $newCategory = new CategoryController();
        $category = $newCategory->show($document['category_id']);

        $doc = new Documents();
        $doc->title = $document->title ?? 'N/A';
        $doc->description = $document->description;
        $doc->isPublished = $document->ispublished ? true : false;
        $doc->category()->associate($category);
        $doc->save();

        $cover = new CoverDocumentController();
        $file = $cover->store($document->file ,$doc);
        $doc->type = $this->varifyFileType($file->type);
        return $doc->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $doc = Documents::find($id);
        if(!$doc) {
            return 'Documento no encontrado en nuestra BD';
        }

        return $doc;
    }


    public function search(Request $document) {
        $documents = Documents::where('title', 'LIKE', '%' . $document->keywords . '%')->paginate(10);
        return view('documents.index', [
            'documents' => $documents
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $successMessage = session('success', ''); // Recupera el mensaje de éxito -> ¿Si existe?
        $document = $this->show($id);
        $categorys = Categorys::all();
        return view('documents.edit', [
            'document' => $document,
            'categorys' => $categorys
        ])->with('success', $successMessage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $document = $this->show($id);

        $newCategory = new CategoryController();
        $category = $newCategory->show($request->category_id);

        $document->title = $request->title ?? 'N/A';
        $document->description = $request->description;
        $document->isPublished = $request->ispublished ? true : false;
        $document->category()->associate($category);
        if($request->newFile) {
            $cover = new CoverDocumentController();
           if($document->image) $cover->destroy($document->image);
            // Se registra nueva portada
            $file = $cover->store($request->newFile ,$document);
            $document->type = $this->varifyFileType($file->type);
        }

        $url = "/documents/$document->id/edit/";
        if($document->save()) {
            return redirect($url)->with('success', 'El producto se ha actualizado correctamente.');
        }

        return redirect($url)->with('error', 'Fallo al actualizar el documento.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $doc = $this->show($id);

        if ($doc) {
            $doc->delete();
            return redirect()->route('documents')->with('success', 'Registro eliminado exitosamente');
        }

        return redirect()->route('documents')->with('error', 'No se pudo encontrar el registro');
    }


    /* Helper */
    public function varifyFileType(string $extension)
    {
        if (FileHelper::isImage($extension)) {
            return "image";
        }
        if (FileHelper::isPDF($extension)) {
            return "pdf";
        }

        if (FileHelper::isVideo($extension)) {
            return "video";
        }

        if (FileHelper::isAudio($extension)) {
            return "audio";
        }

        if (FileHelper::isDocumentWord($extension)) {
            return "doc";
        }

        return "Tipo de archivo no válido.";
    }
}