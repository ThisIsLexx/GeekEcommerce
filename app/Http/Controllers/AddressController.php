<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $addresses = Address::where('user_id', Auth::id())->get();

        return view('address.address-index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('address.address-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:1',
            'last_name' => 'required|max:255|min:3',
            'tel' => 'required|numeric|digits:10',
            'street_address' => 'required|min:5|max:255',
            'references' => 'required|max:255|min:3',
            'zip' => 'required|digits:5|numeric',
            'state' => 'required|max:255|min:3',
            'city' => 'required|max:255|min:3',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        Address::create($request->all());
        
        return redirect("/address")->with('success','Dirección agregada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        // ESTE METODO NO SERÁ IMPLEMENTADO
        
        return view('', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
        return view('address.address-edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:1',
            'last_name' => 'required|max:255|min:3',
            'tel' => 'required|numeric|digits:10',
            'street_address' => 'required|min:5|max:255',
            'references' => 'required|max:255|min:3',
            'zip' => 'required|digits:5|numeric',
            'state' => 'required|max:255|min:3',
            'city' => 'required|max:255|min:3',
        ]);

        $address->name = $request->name;
        $address->last_name = $request->last_name;
        $address->tel = $request->tel;
        $address->street_address = $request->street_address;
        $address->references = $request->references;
        $address->zip = $request->zip;
        $address->state = $request->state;
        $address->city = $request->city;

        $address->save();

        return redirect('/address')->with('success','Datos de la dirección editados correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
        $address->destroy($address->id);
        return redirect('/address')->with('success','Dirección eliminada correctamente!');
    }
}
