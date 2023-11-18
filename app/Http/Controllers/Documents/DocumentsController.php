<?php

namespace App\Http\Controllers\Documents;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\File\FileController;
use App\Models\Categorys;


class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $filter)
    {

        $documents = [];
        if($filter === 'all') {
            $documents = Documents::orderByDesc('id')->paginate(10);
        }

        if($filter !== 'all') {
            $category = Categorys::where('name', $filter)->first();
            $documents = Documents::where('category_id', $category->id)->orderByDesc('id')->paginate(10);
        }

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
        $messages = [
            'title.required' => 'El campo título es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'category_id.required' => 'El campo categoría es obligatorio.',
            'cover.required' => 'El campo portada es obligatorio.',
            'cover.file' => 'El campo portada debe ser un archivo.',
            'cover.mimes' => 'El campo portada debe ser un archivo de tipo jpg, png, o jpeg.',
            'file.required' => 'El campo archivo es obligatorio.',
            'file.file' => 'El campo archivo debe ser un archivo.',
            'file.mimes' => 'El campo archivo debe ser un archivo de tipo pdf, doc, docx, jpg, png o jpeg.',
        ];

        $document->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'cover' => 'required|file|mimes:jpg,png,jpeg', // Validación del tipo de archivo
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png,jpeg' // Validación del tipo de archivo
        ], $messages);

        $newCategory = new CategoryController();
        $category = $newCategory->show($document->category_id);

        $doc = new Documents();
        $doc->title = $document->title ?? 'N/A';
        $doc->description = $document->description;
        $doc->isPublished = $document->ispublished ? true : false;
        $doc->category()->associate($category);
        $doc->save();

        $cover = new CoverDocumentController();
        $cover->store($document->cover ,$doc);

        /* Arhivo */
        $fileDocument = new FileController();
        $fileDocument = $fileDocument->store($document->file ,$doc);

        $doc->type = $this->varifyFileType($fileDocument->type);

        if($category->save()) {
            return back()->with('success', 'Documento registrado con éxito.');
        }

        return back()->with('error', 'Fallo al crear el documento. Intente de nuevo');

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
        $documents = Documents::where('title', 'LIKE', '%' . $document->keywords . '%')->paginate(20);
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

        // Se actualiza un nuevo documento
        if($request->updateFile) {
            $fileDocument = new FileController();

            if($document->file) {
                $fileDocument->destroy($document->file);
            }

            $fileDocument = $fileDocument->store($request->updateFile ,$document);
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
            if($doc->delete()) {
                return back()->with('success', 'Registro eliminado exitosamente');
            }

            return back()->with('error', 'Se produjo un error al eliminar el documento.');

        }

        return back()->with('error', 'No se pudo encontrar el registro');
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
