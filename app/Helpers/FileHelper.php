<?php

namespace App\Helpers;

class FileHelper
{
    public static function isImage($extension)
    {
        $extensionesImagen = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
        return in_array(strtolower($extension), $extensionesImagen);
    }

    public static function isPDF($extension)
    {
        return strtolower($extension) === 'pdf';
    }

    public static function isVideo($extension)
    {
        $extensionesVideo = ['mp4', 'avi', 'mkv', 'mov'];
        return in_array(strtolower($extension), $extensionesVideo);
    }

    public static function isAudio($extension)
    {
        $extensionesAudio = ['mp3', 'wav', 'ogg'];
        return in_array(strtolower($extension), $extensionesAudio);
    }

    public static function isDocumentWord($extension)
    {
        return strtolower($extension) === 'doc';
    }
}
