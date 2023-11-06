<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\Documents;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index() {
        $categorys = Categorys::all();
        $documents = Documents::all();
        return view('welcome', ['categorys' => $categorys, 'documents' => $documents]);
    }

    public function search(Request $document) {
        $categorys = Categorys::all();
        $documents = Documents::where('title', 'LIKE', '%' . $document->keywords . '%')->paginate(10);
        return view('welcome', [
            'documents' => $documents,
            'categorys' => $categorys
        ]);
    }
}
