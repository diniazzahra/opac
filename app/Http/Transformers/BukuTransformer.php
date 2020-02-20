<?php
/**
 * Created by PhpStorm.
 * User: Dini
 * Date: 19/02/2020
 * Time: 15:46
 */

namespace App\Http\Transformers;
use App\Buku;
use Illuminate\Http\Request;


use League\Fractal\TransformerAbstract;

class BukuTransformer extends TransformerAbstract
{
    public function paginatesearch(Request $request)
    {
        $judul = Buku::where('judul','like','%'.$request->query('q').'%');
        $penerbit = Buku::where('penerbit','like','%'.$request->query('q').'%');
        $pengarang = Buku::where('pengarang','like','%'.$request->query('q').'%');

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
}