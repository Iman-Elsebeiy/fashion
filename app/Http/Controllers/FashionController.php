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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $fashion = Fashion::findOrFail($id);

        return view('product_details', compact('fashion'));
    }

}
