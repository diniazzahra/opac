<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function detail(Request $request, $id = 0){
        $data = [];
        return $this->renderPage($request,'buku.detail', $data);
    }
}
