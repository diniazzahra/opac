<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 22/12/2019
 * Time: 22:19
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $searchQuery = $request->query('query');
        if(is_null($searchQuery)){
            return redirect()->route('home');
        }
        $data = [
            'searchQuery' => $searchQuery,
        ];
        return  $this->renderPage($request, 'search.index', $data);
    }

    public function advanced(Request $request){

    }

}
