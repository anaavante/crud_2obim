<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index(){
            // nao passa dados, apenas retorna a home com os cars e atalhos
             return view('home');
                                }
    }
    
