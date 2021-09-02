<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Number;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\Product;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request -> validate([
            'courier' => 'required',
            'bank' => 'required',
            'alamat' => 'required'
        ]);

        $number = Number::where('id', 1)->get();
        $angka = ($number[0]->angka)+1;
        $date = date('dmY');
        $invoice = "INV-PK-$date-$angka";
        Number::where('id', 1)->update(['angka'=>$angka]);
        
        Transaction::create([
            'no_invoice'=>$invoice,
            'courier_id'=>$request->courier,
            'bank_id'=>$request->bank,
            'alamat'=>$request->alamat,
            'total'=>$request->subtotal 
        ]);

        $ongkir = DB::table('couriers')
        ->select('couriers.*', 'transactions.*')
        ->join('transactions', 'couriers.id', '=', 'transactions.courier_id')
        ->where('couriers.id', $request->courier)
        ->get();

        $transaction = Transaction::where('no_invoice', $invoice)->first();
        Cart::where('user_id', Auth::user()->id)
        ->where('aksi', 0)
        ->update([
            'transaction_id'=>$transaction->id,
            // 'aksi'=>1
        ]);

        $keranjang = Cart::where('user_id', Auth::user()->id)
        ->where('aksi', 0)
        ->get();
        foreach($keranjang as $item)
        {
            $product=Product::where('id', $item->product_id)->first();
            Product::where('id', $item->product_id)->update([
                'stock_barang'=> $product->stock_barang - $item->kuantitas,
                'terjual'=> $product->terjual + $item->kuantitas,

            ]);
        }
        Cart::where('user_id', Auth::user()->id)
        ->where('aksi', 0)
        ->update([
            'aksi' => 1
        ]);

        $nama=Auth::user()->name;

        Notification::create([
            'user_id'=>Auth::user()->id, 
            'isi'=>'Hello '. $nama.', Selesaikan pembayaran segera,'.$transaction->total.' dengan kode '.$transaction->no_invoice
        ]); 

        $isi = [
            'judul' => 'Selesaikan pembayaran anda',
            'badan' => 'Hello '. $nama.', Selesaikan pembayaran segera,'.$transaction->total.' dengan kode '.$transaction->no_invoice
        ];

        Mail::to(Auth::user()->email)->send(new \App\Mail\KirimEmail($isi));

        return redirect('/transaction/' .$transaction->id)->with('status', 'berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::where('id', $id)->get();
        //return $transaction;
        return view('payment/index', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function sukses(){
        return view('payment/sukses');
    }
}
