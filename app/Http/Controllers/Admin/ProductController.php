<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fashion;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;


class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fashions = Fashion::get();
        return view('admin.products', compact('fashions'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' =>  'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]); 

          $data['published'] = isset($request->published); 
          $data['image'] = $this->uploadFile($request->image, 'assets/images/product/'); 

         Fashion::create($data);
         return redirect()->route('admin.products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $fashion = Fashion::findOrFail($id);

        return view('product_details', compact('fashion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fashion = Fashion::findOrFail($id);

        return view('admin.edit_product', compact('fashion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'title' =>  'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]); 

          $data['published'] = isset($request->published); 
          
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/product/');
        }
        //  dd($data);
        Fashion::where('id', $id)->update($data);
        // return"updated";
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        //
        $id = $request->id;
        Fashion::where('id', $id)->delete();
        return redirect('admin.products');
    } 
     /**
     * force delete resource from storage.
     */
    public function forceDeleted(string $id){

        Fashion::where('id', $id)->forceDelete();
        return redirect()->route('products.showDeleted');       
    }    
}
