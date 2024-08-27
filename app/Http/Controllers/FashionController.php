<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fashion;

class FashionController extends Controller
{
    //
    public function index()
    {
       return view('fashion_index');
    }

}
