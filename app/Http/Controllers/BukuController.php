<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 22/12/2019
 * Time: 22:19
 */

namespace App\Http\Controllers;


use App\Buku;
use App\Http\Controllers\Api\v1\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BukuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function search(Request $request){
        $searchQuery = $request->query('query');
        if(is_null($searchQuery)){
            return redirect()->route('home');
        }
        $data = [
            'searchQuery' => $searchQuery,
        ];
        return  $this->renderPage($request, 'buku.search', $data);
    }

    public function detail(Request $request, $id = 0){
        $buku = Buku::where('id', $id)->first();
        if(is_null($buku)){
            return redirect()->back();
        }
        $bukuTerkait = Buku::where('tajuk_subjek', $buku->tajuk_subjek)->where('id','!=',$buku->id)
        ->orderBy('tahun_terbit','DESC')->get();
        $data = [
            'buku'=>$buku,
            'bukuTerkait' => $bukuTerkait
        ];
        return $this->renderPage($request, 'buku.detail', $data);
    }

    public function advancedSearch(Request $request)
    {
        //dd($request->query);
        $searchQuery = [
            'judul' => $request->query('inputjudul'),
            'pengarang' => $request->query('inputpengarang'),
            'penerbit' => $request->query('inputpenerbit'),
            'tahun_terbit' => $request->query('inputtahun_terbit'),
        ];
        //dd ($searchQuery);
        if(is_null($searchQuery)){
            return redirect()->route('home');
        }

        $data = [
            'searchQuery' => $searchQuery,
        ];
        return  $this->renderPage($request, 'buku.advancedsearch', $data);

    }
}
