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

    public function index(Request $request)
    {
        $buku = Buku::all();
        $data = [
            'buku' => $buku
        ];
        return $this->renderPage($request, 'buku.index', $data);
    }

    public function create(Request $request)
    {
        return $this->renderPage($request, 'buku.create');
    }

    public function store(Request $request)
    {
        // Buku::create($request->all());
        // return redirect()->route('buku.index');
    }

    public function edit(Request $request, $id)
    {
        // $buku = Buku::findOrFail($id);
        // return $this->renderPage($request, 'buku.edit', $buku);
    }

    public function update(Request $request, $id)
    {
        // $buku = Buku::findOrFail($id);
        // $buku->update($request->all());
        // return redirect()->route('buku.index');
    }
    
    public function destroy($id)
    {
        // $buku = Buku::findOrfail($id);
        // $buku->delete();
        // return redirect()->route('buku.index');
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
