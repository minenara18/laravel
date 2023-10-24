<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('pages.products.index', [
            'products' => $products,
            'title' => 'All Data Products'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create', [
            'title' => 'Add New Data'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request       $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Pastikan kolom 'description' diisi sebelum menyimpan data.
        $data['description'] = 'Deskripsi Produk'; // Gantilah dengan deskripsi yang sesuai.

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);
        return redirect()->route('product.index');
    }


    /**
     * Display the specified resource.
     * @param \App\Http\Request               $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Http\Request               $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            'pages title' => 'Edit Data',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi jenis dan ukuran file.
        ]);

        $data = $request->all();

        if (!empty($data['image'])) {
            $data['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($data['image']);
        }

        Product::findOrFail($id)->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Http\Request               $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);


        $product->delete();

        return redirect()->back();
    }
}
