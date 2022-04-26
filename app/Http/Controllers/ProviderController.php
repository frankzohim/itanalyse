<?php

namespace App\Http\Controllers;
use App\Models\Provider;
use App\Http\Requests\ProviderRequest;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
		return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        $validatedData = $request->validated();
		$provider = new provider;
		
		$provider->name = $request->name;
        $provider->phone = $request->phone;
		$provider->address = $request->address;
		
		if($provider->save())
			return redirect()->route('provider.index')->with('update_success', "Fournisseur ajoutée avec succès.");
		else
			return redirect()->back()->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::FindOrFail($id);
		return view('provider.edit',compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, $id)
    {
        $validatedData = $request->validated();
		$validatedData = $request->validated();
		
		$provider = Provider::FindOrFail($id);
		$provider->name = $request->name;
        $provider->phone = $request->phone;
		$provider->address = $request->address;
		$provider->save();
		return redirect()->route('provider.index')->with('update_success','Fournisseur mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Provider::destroy($id);
		return redirect()->route('provider.index')->with('update_success','Fournisseur supprimée avec succès');
    }
}
