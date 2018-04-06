<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Control extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Começo(){
   
   return view('TelaLogin');
    
    }
}