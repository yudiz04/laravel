<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $city = City::all();
        return view('city.index', compact('city'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::all();
        return view('city.add',compact('state'));
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
            'state'=>'required',
            'city'=>'required|min:3|max:25'
        ],
        [   
            'state.required' => 'Kolom state harus diisi :)',
            'city.required' => 'Kolom city harus diisi :)',
            'city.min' => 'Min. 3 karakter',
            'city.max' => 'Max. 25 karakter'
        ]
        );

        //untuk memasukkan data ke tabel
        City::create([
            'state_id'=>$request->state,
            'kota'=>$request->city
        ]);
        return redirect('/city')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(city $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $state = State::all();
        return view('city.edit', compact('city','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'city'=>'required|min:3|max:25'

        ],
        [
            'city.required' => 'Kolom city harus diisi :)',
            'city.min' => 'Min. 3 karakter',
            'city.max' => 'Max. 25 karakter'
        ]
        );

        City::where('id', $city->id)->update([
            'state_id'=>$request->state,
            'kota'=>$request->city
        ]);

        return redirect('/city')->with('status', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        City::destroy('id', $city->id);
        return redirect('/city')->with('status', 'Berhasil Dihapus');
    }
}
