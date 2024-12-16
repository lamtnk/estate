<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\admin\LoginService;

class LoginController extends Controller
{
    private $loginService;
    public function __construct(LoginService $loginService) {
        $this->loginService = $loginService;
    }
    public function index(){
        return $this->loginService->loginView();
    }
    public function login(Request $request){
       return $this->loginService->login($request);
    }
}
