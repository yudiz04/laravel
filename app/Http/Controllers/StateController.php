<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = State::all();
        return view('state.index', compact('state'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.add');
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
            'state'=>'required|min:3|max:25'
        ],
        [
            'state.required' => 'Kolom state harus diisi :)',
            'state.min' => 'Min. 3 karakter',
            'state.max' => 'Max. 25 karakter'
        ]
        );

        //untuk memasukkan data ke tabel
        State::create([
            'provinsi'=>$request->state
        ]);
        return redirect('/state')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(state $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('state.edit', compact('state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'state'=>'required|min:3|max:25'

        ],
        [
            'state.required' => 'Kolom state harus diisi :)',
            'state.min' => 'Min. 3 karakter',
            'state.max' => 'Max. 25 karakter'
        ]
        );

        State::where('id', $state->id)->update([
            'provinsi'=>$request->state
        ]);

        return redirect('/state')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        State::destroy('id', $state->id);
        return redirect('/state')->with('status', 'Berhasil Dihapus');
    }
}
