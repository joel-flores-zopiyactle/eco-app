<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
use App\Models\Documents;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function showBooks() {
        $categorys = Categorys::all();
        $documents = Documents::all();
        return view('books-page', ['categorys' => $categorys, 'documents' => $documents]);
    }

    public function search(Request $document) {
        $categorys = Categorys::all();
        $documents = Documents::where('title', 'LIKE', '%' . $document->keywords . '%')->paginate(10);
        return view('books-page', [
            'documents' => $documents,
            'categorys' => $categorys
        ]);
    }

    public function filter(string $filter) {
        $category = Categorys::where('name', $filter)->get();
        $categorys = Categorys::all();
        $documents = Documents::where('category_id',  $category[0]->id)->paginate(10);
        return view('books-page', [
            'documents' => $documents,
            'categorys' => $categorys
        ]);
    }
}
