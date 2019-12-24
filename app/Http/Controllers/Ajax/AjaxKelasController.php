<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 01/05/2019
 * Time: 8:42
 */

namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\AjaxController;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxKelasController extends AjaxController
{
    private $rules = [
        'kelas' => 'bail|required|alpha_dash',
        'wali_kelas' => 'bail|required|alpha_num',
        'semester' => 'bail|required|numeric'
    ];

    public function save(Request $request){
        $validator = Validator::make($request->all(), $this->rules);
        if($validator->fails()){
            $this->reply['data'] = $validator->getMessageBag();
            $this->reply['message'] = 'Invalid request';
            return response($this->reply, 422);
        }
        $kelas = new Kelas();
        $kelas->kelas = $request->kelas;
        $kelas->semester = $request->semester;
        $kelas->wali_kelas = $request->wali_kelas;
        try{
            $kelas->save();
            $lastInsertedId = $kelas->id;
            $this->reply['data'] = Kelas::find($lastInsertedId);
        }catch (\Exception $ex){
            $this->reply['message'] = $ex->getMessage();
            return response($this->reply, 500);
        }
        //store reply
        $this->reply['status'] = true;
        return response($this->reply, 200);
    }

    public function all(Request $request, $limit = 25, $offset = 0){
        $all = Kelas::all();
        $this->reply['status'] = true;
        $this->reply['data'] = [
            'total'=> $all->count(),
            'record'=>$all->toArray(),
        ];
        return response($this->reply, 200);
    }
}
