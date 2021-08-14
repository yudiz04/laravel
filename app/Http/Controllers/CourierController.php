<?php

namespace App\Http\Controllers;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = Courier::all();
        return view('courier.index', compact('courier'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courier.add');
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
            'courier'=>'required|min:3|max:25',
            'ongkir'=>'required'
        ],
        [
            'courier.required' => 'Kolom courier harus diisi :)',
            'courier.min' => 'Min. 3 karakter',
            'courier.max' => 'Max. 25 karakter',
            'ongkir' => 'Kolom rekening harus diisi :)'
        ]
        );

        //untuk memasukkan data ke tabel
        Courier::create([
            'kurir'=>$request->courier,
            'ongkir'=>$request->ongkir
        ]);
        return redirect('/courier')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        return view('courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        //return $request;
        $request->validate([
            'courier'=>'required|min:3|max:25',
            'ongkir'=>'required'
        ],
        [
            'courier.required' => 'Kolom courier harus diisi :)',
            'courier.min' => 'Min. 3 karakter',
            'courier.max' => 'Max. 25 karakter',
            'ongkir' => 'Kolom rekening harus diisi :)'
        ]
        );

        Courier::where('id', $courier->id)->update([
            'kurir'=>$request->courier,
            'ongkir'=>$request->ongkir
        ]);

        return redirect('/courier')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(courier $courier)
    {
        Courier::destroy('id', $courier->id);
        return redirect('/courier')->with('status', 'Berhasil Dihapus');
    }
}
