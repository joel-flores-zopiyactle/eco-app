<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\FilesDocument;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FileController extends Controller
{
    public function store(UploadedFile $file, Documents $document) {
        if (!$file->isValid()) return "Falta subir una imagen de portada";

        $fileDcoument = new FilesDocument();
        $fileExtension = $file->getClientOriginalExtension();
        $uuid = Str::uuid()->toString(); // Generar un nombre único
        $fileName = $uuid . '.' . $fileExtension;
        $file->storeAs('public', $fileName); // Almacenar el archivo en la carpeta 'public'

        // Almacena el archivo en el disco de almacenamiento personalizado
        Storage::disk('public')->put($fileName, file_get_contents($file));

        // Obtiene la URL del archivo almacenado
        $url = Storage::url($fileName);

        $fileDcoument->url = $url;
        $fileDcoument->type = $fileExtension;
        $fileDcoument->document()->associate($document);

        if($fileDcoument->save()) {
            return $this->findFileById($fileDcoument->id);
        }
    }

    public function findFileById(int $id)
    {
        $file = FilesDocument::find($id);
        if(!$file) return "Archivo no encotrado";
        return $file;
    }


    public function destroy(FilesDocument $fileDocument)
    {
        // Convierte la URL en una ruta de archivo válida

        $fileName = pathinfo($fileDocument->url, PATHINFO_BASENAME);

        if (Storage::disk('public')->exists($fileName)) {
            Storage::disk('public')->delete($fileName);
           return  $fileDocument->delete();

        }

       return false;
    }

    public function dowloandFile(int $id)
    {
        $file = $this->findFileById($id);

        if (!$file) abort(404, 'No se encontro el archivo para descargar.');

        $fileName = pathinfo($file->url, PATHINFO_BASENAME);
        $filePath = storage_path("app/public/{$fileName}");
        if (!Storage::disk('public')->exists($fileName)) abort(404, 'No se encontro el archivo para descargar.');

        return response()->download($filePath, $fileName);
    }
}
