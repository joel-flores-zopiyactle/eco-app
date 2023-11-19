<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\CoverDocument;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CoverDocumentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadedFile $file, Documents $document)
    {

        if (!$file->isValid()) return "Falta subir una imagen de portada";

        $cover = new CoverDocument();
        $fileExtension = $file->getClientOriginalExtension();
        $uuid = Str::uuid()->toString(); // Generar un nombre único
        $fileName = $uuid . '.' . $fileExtension;
        $file->storeAs('public', $fileName); // Almacenar el archivo en la carpeta 'public'

        // Almacena el archivo en el disco de almacenamiento personalizado
        Storage::disk('public')->put($fileName, file_get_contents($file));

        // Obtiene la URL del archivo almacenado
        $url = Storage::url($fileName);

        $cover->url = $url;
        $cover->type = $fileExtension;
        $cover->document()->associate($document);
        $cover->save();
        return $this->findCoverById($cover->id);
    }


    public function findCoverById(int $id)
    {
        $cover = CoverDocument::find($id);
        if(!$cover) return "Portada no encontrada";
        return $cover;
    }

    public function showByDocument(int $documentId)
    {
        $cover = $this->findCoverByDocumentId($documentId);
        echo($cover);
        $rutaImagen = public_path($cover->url); // Reemplaza con la ruta de tu imagen
        return response()->file($rutaImagen);
    }

    public function findCoverByDocumentId(int $documentId)
    {

        $cover = CoverDocument::where('document_id', $documentId)->get();
        if(!$cover) {
            return 'Cover not found';
        }

        return $cover[0];

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CoverDocument $coverDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoverDocument $coverDocument)
    {
        // Convierte la URL en una ruta de archivo válida

        $fileName = pathinfo($coverDocument->url, PATHINFO_BASENAME);

        if (Storage::disk('public')->exists($fileName)) {
            Storage::disk('public')->delete($fileName);
            $coverDocument->delete();

        }
    }
}
