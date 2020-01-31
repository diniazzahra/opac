<?php
/**
 * Created by Pizaini <pizaini@uin-suska.ac.id>
 * Date: 25/01/2020
 * Time: 7:24
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profil(Request $request){
        $data = [];
        return $this->renderPage($request, 'account.profil', $data);
    }

    public function updateProfil(Request $request){
        $data = [];
        return $this->renderPage($request, 'account.profil-update', $data);
    }

    public function oauthClient(Request $request){
        $data = [];
        return $this->renderPage($request, 'account.oauth-client', $data);
    }

    public function oauthPersonalToken(Request $request){
        $data = [];
        return $this->renderPage($request, 'account.oauth-personal-token', $data);
    }

    public function changePassport(Request $request){
        $data = [];
        return $this->renderPage($request, 'account.change-password', $data);
    }

}
