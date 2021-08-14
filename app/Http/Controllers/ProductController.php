<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'category'=>'required',
            'name'=>'required|min:3|max:25|unique:products,nama_barang',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'description'=>'required|min:3|max:500'
        ],
        [
            'category.required' => 'Kolom kategori harus diisi :)',
            'category.min' => 'Min. 3 karakter',
            'category.max' => 'Max. 25 karakter',
            'name.required' => 'Kolom name harus diisi :)',
            'name.unique' => "Nama sudah ada!!!",
            'name.min' => 'Min. 3 karakter',
            'name.max' => 'Max. 25 karakter',
            'price.required' => 'Kolom price harus diisi :)',
            'stock.required' => 'Kolom stock harus diisi :)',
            'description.required' => 'Kolom name harus diisi :)',
            'description.min' => 'Min. 3 karakter',
            'description.max' => 'Max. 500 karakter',
        ]
        );

        // $img = $request->file('icon');
        // $nama_file = time()."_".$img->getClientOriginalName();
        // $img->move('dist/img',$nama_file); //proses upload foto ke laravel

        //untuk memasukkan data ke tabel
        Product::create([
            'nama_barang'=>$request->name,
            'harga_barang'=>$request->price,
            'stock_barang'=>$request->stock,
            'deskripsi_barang'=>$request->description,
            'category_id'=>$request->category
        ]);

        $data= Product::where('nama_barang', $request->name)->get();
        return view('product.addPhoto', compact('data'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   $category = category::all();
        return view('product.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return $request;
        
        $request->validate([
            'photo' => 'required',
            'category'=>'required',
            'name'=>'required|min:3|max:25',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'description'=>'required|min:3|max:500'
        ], 
        [ 
            'category.required' => 'Kolom kategori harus diisi :)',
            'category.min' => 'Min. 3 karakter',
            'category.max' => 'Max. 25 karakter',
            'name.required' => 'Kolom name harus diisi :)',
            'name.min' => 'Min. 3 karakter',
            'name.max' => 'Max. 25 karakter',
            'price.required' => 'Kolom price harus diisi :)',
            'stock.required' => 'Kolom stock harus diisi :)',
            'description.required' => 'Kolom name harus diisi :)',
            'description.min' => 'Min. 3 karakter',
            'description.max' => 'Max. 500 karakter',
        ]
        ); 

        $img = $request->file('photo');
        $nama_file = time()."_".$img->getClientOriginalName();
        $img->move('dist/img',$nama_file); //proses upload foto ke laravel

        Product::where('id', $product->id)->update([
            'nama_barang'=>$request->name,
            'harga_barang'=>$request->price,
            'stock_barang'=>$request->stock,
            'deskripsi_barang'=>$request->description,
            'category_id'=>$request->category
        ]);

    Photo::where('product_id',$product->id)->update([
        'nama_photo'=>$nama_file,
    ]);

   
    return redirect('/product')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/product')->with('status', 'Berhasil Dihapus');
    }

    public function createPhoto()
    {
        return view('product.addPhoto');
    }

    public function storePhoto(Request $request)
    {
        $img = $request->file('photo');
        $nama_file = time()."_".$img->getClientOriginalName();
        $img->move('dist/img',$nama_file); //proses upload foto ke laravel
    

        Photo::create([
            'nama_photo'=>$nama_file,
            //'status'=>$request->status,
            'product_id'=>$request->id
        ]);

        return redirect('/product')->with('status', 'Berhasil Ditambahkan');
    }
}
