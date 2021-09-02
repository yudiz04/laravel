<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumer = Costumer::all();
        return view('costumer.index', compact('costumer'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.add');
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
            'nama'=>'required|min:3|max:25',
            'jenis'=>'required',
            'tgl'=>'required',
            'alamat'=>'required|min:3|max:500'
        ],
        [
            'nama.required' => 'Kolom name harus diisi :)',
            'nama.min' => 'Min. 3 karakter',
            'nama.max' => 'Max. 25 karakter',
            'jenis.required' => 'Kolom jenis kelamin harus diisi :)',
            'tgl.required' => 'Kolom tanggal lahir harus diisi :)',
            'alamat.required' => 'Kolom alamat harus diisi :)',
            'alamat.min' => 'Min. 3 karakter',
            'alamat.max' => 'Max. 500 karakter',
        ]
        );

        //untuk memasukkan data ke tabel
        Costumer::create([
            'nama_costumer'=>$request->nama,
            'jenis_kelamin'=>$request->jenis,
            'tgl_lahir'=>$request->tgl,
            'alamat'=>$request->alamat
        ]);
        return redirect('/costumer')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumer $costumer)
    {
        return view('costumer.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer)
    {
        $request->validate([
            'nama'=>'required|min:3|max:25',
            'jenis'=>'required',
            'tgl'=>'required',
            'alamat'=>'required|min:3|max:500'
        ],
        [
            'nama.required' => 'Kolom name harus diisi :)',
            'nama.min' => 'Min. 3 karakter',
            'nama.max' => 'Max. 25 karakter',
            'jenis.required' => 'Kolom jenis kelamin harus diisi :)',
            'tgl.required' => 'Kolom tanggal lahir harus diisi :)',
            'alamat.required' => 'Kolom alamat harus diisi :)',
            'alamat.min' => 'Min. 3 karakter',
            'alamat.max' => 'Max. 500 karakter',
        ]
        );

        Costumer::where('id', $costumer->id)->update([
            'nama_costumer'=>$request->nama,
            'jenis_kelamin'=>$request->jenis,
            'tgl_lahir'=>$request->tgl,
            'alamat'=>$request->alamat
        ]);

        return redirect('/costumer')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer  $costumer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer $costumer)
    {
        Costumer::destroy('id', $costumer->id);
        return redirect('/costumer')->with('status', 'Berhasil Dihapus');
    }
}
