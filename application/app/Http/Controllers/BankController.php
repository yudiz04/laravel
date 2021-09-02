<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        return view('bank.index', compact('bank'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.add');
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
            'bank'=>'required|min:3|max:25',
            'no_rek'=>'required'
        ],
        [
            'bank.required' => 'Kolom bank harus diisi :)',
            'bank.min' => 'Min. 3 karakter',
            'bank.max' => 'Max. 25 karakter',
            'no_rek' => 'Kolom rekening harus diisi :)'
        ]
        );

        //untuk memasukkan data ke tabel
        Bank::create([
            'bank'=>$request->bank,
            'no_rekening'=>$request->no_rek
        ]);
        return redirect('/bank')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //return $request;
        $request->validate([
            'bank'=>'required|min:3|max:25',
            'no_rek'=>'required'
        ],
        [
            'bank.required' => 'Kolom bank harus diisi :)',
            'bank.min' => 'Min. 3 karakter',
            'bank.max' => 'Max. 25 karakter',
            'no_rek' => 'Kolom rekening harus diisi :)'
        ]
        );

        Bank::where('id', $bank->id)->update([
            'bank'=>$request->bank,
            'no_rekening'=>$request->no_rek
        ]);

        return redirect('/bank')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy('id', $bank->id);
        return redirect('/bank')->with('status', 'Berhasil Dihapus');
    }
}
