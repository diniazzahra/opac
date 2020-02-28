<?php

namespace App\Http\Controllers\Api\v1;

use App\Buku;
use App\Http\Controllers\Api\ApiApp;
use App\Http\Controllers\Api\ApiResponse;
use App\Http\Controllers\BukuController;
//use App\Http\Transformers\BukuTransformer;
use Illuminate\Http\Request;

//use App\Http\Transformers\IlluminatePaginatorAdapter;

class ApiController extends ApiApp
{
    use ApiResponse;

    // get all data buku
    public function getAll()
    {
        // meminta response server dari table buku = $bukus
        $bukus = Buku::all();
        $this->reply['status'] = true;
        $this->reply['data'] = $bukus;
        return response($this->reply, 200);
    }

    //get id buku yang akan ditampilkan
    public function details(Request $request,$id=0)
    {
        $buku = Buku::where('id',$id)->first();
        $bukuTerkait = Buku::where('tajuk_subjek', $buku->tajuk_subjek)->where('id','!=',$buku->id)
                    ->orderBy('tahun_terbit','DESC')->get();
        $data = [
            'buku'=>$buku,
            'bukuTerkait' => $bukuTerkait
        ];

        $this->reply['status'] = true;
        $this->reply['data'] = $data;
        return response($this->reply, 200);

    }

    public function search(Request $request)
    {
        $judul = Buku::where('judul','like','%'.$request->query('q').'%')->paginate(6);
        $penerbit = Buku::where('penerbit','like','%'.$request->query('q').'%')->paginate(6);
        $pengarang = Buku::where('pengarang','like','%'.$request->query('q').'%')->paginate(6);

        $data =
        [
            'judul' => $judul,
            'penerbit' => $penerbit,
            'pengarang' => $pengarang
        ];
        $this->reply['status'] = true;
        $this->reply['data'] = $data;
        return response($this->reply,200);
    }

//    public function paginateSearch(Request $request)
//    {
//        $paginator = Buku::paginate();
//        $buku = $paginator->getCollection();
//
//        $response = fractal()
//            ->collection($buku, new BukuTransformer())
//            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
//            ->toArray();
//
//        return response()->json($response);
//    }

    public function advancedSearch(Request $request)
    {
        $judul = $request->judul;
        $penerbit = $request->penerbit;
        $pengarang = $request->pengarang;
        $tahun_terbit = $request->tahun_terbit;
        $buku = Buku::when($judul, function($query, $judul){
                        return $query->where('judul', 'like', '%'.$judul.'%');})
                    ->when($penerbit, function($query, $penerbit){
                        return $query->where('penerbit', 'like', '%'.$penerbit.'%');})
                    ->when($pengarang, function($query, $pengarang){
                        return $query->where('pengarang', 'like', '%'.$pengarang.'%');})
                    ->when($tahun_terbit, function($query, $tahun_terbit){
                        return $query->where('tahun_terbit', 'like', '%'.$tahun_terbit.'%');})
                    ->get();
        // $this->reply['request'] = $request;
        $this->reply['status'] = true;
        $this->reply['data'] = $buku;
        return response($this->reply,200);
    }
}
