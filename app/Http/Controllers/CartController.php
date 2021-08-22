<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Courier;
use App\Models\Bank;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $number = Number::where('id', 1)->get();
        $angka = ($number[0]->angka)+1;
        $date = date('dmY');
        $invoice = "INV-PK-$date-$angka";
        $cart = Cart::where('aksi', 0)->where('user_id', Auth::user()->id)->get();
        $subtotal = Cart::where('aksi', 0)->sum('subtotal');
        $courier = Courier::all();
        $bank = Bank::all();
        return view('landingpage.cart', compact('cart', 'subtotal', 'courier', 'bank'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.add');
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
            'kuantitas'=>'required|numeric',
        ],
        [
            'kuantitas.required' => 'Kolom kuantitas harus diisi :)',
            
        ]
        );

        $product = Product::Where('id', $request->product_id)->get();
        $total = $product[0]->harga_barang * $request->kuantitas;
        //untuk memasukkan data ke tabel

        $keranjang=Cart::where('user_id', Auth::user()->id)
        ->where('aksi', 0)->get();
        foreach($keranjang as $item)
        {
            if($request->product_id==$item->product_id)
            {
                $product=Product::where('id', $item->product_id)->first();
                Cart::where('product_id', $item->product_id)->update([
                    'kuantitas'=>$item->kuantitas + $request->kuantitas,
                    'subtotal'=>$product->harga_barang * ($item->kuantitas + $request->kuantitas)
                ]);
                return redirect()->back();
            }
        }
        Cart::create([
            'user_id' =>Auth::user()->id,
            'product_id' =>$request->product_id,
            'kuantitas'=>$request->kuantitas,
            'subtotal'=>$total,
            'aksi'=>0
        ]);

        return redirect()->back();
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('cart.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //return $request;
        $request->validate([
            'kuantitas'=>'required',
           
        ],
        [
            'kuantitas.required' => 'Kolom kuantitas harus diisi :)',
            
        ]
        );
        

        Cart::where('id', $cart->id)->update([
            'user_id' =>$request->user_id,
            'product_id' =>$request->product_id,
            'kuantitas'=>$request->kuantitas, 
            'aksi'=>0
        ]);

        return redirect('/cart')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy('id', $cart->id);
        return redirect('/cart')->with('status', 'Berhasil Dihapus');
    }
}
