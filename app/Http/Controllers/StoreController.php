<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Provider;
Use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //Loading all stores, companies and providers elements from database
		$stores = Store::all();
		$companies = Company::all();
		$providers = Provider::all();
		return view('store.index',compact('stores','companies','providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$companies = Company::all();
		$providers = Provider::all();
		return view('store.create',compact('companies','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
		//Validating Data
                $validatedData = $request->validated();
		
		$store = new Store;
		$store->date_in = $request->date_in;
		$store->reference = $request->reference;
                $store->designation = $request->designation;
		$store->brand = $request->brand;
		$store->quantity_in = $request->quantity_in;
		$store->provider_id = $request->provider_id;
		$store->price_in = $request->price_in;
		$store->reference_oem = $request->reference_oem;
		$store->reference_equivalent = $request->reference_equivalent;
		$store->user_id = auth()->user()->id;
		
		if($store->save())
			return redirect()->route('store.edit', $store->id)->with('update_success', "Ajoutée avec succès.");
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
        $store = Store::FindOrFail($id);
	$companies = Company::all();
	$providers = Provider::all();
	return view('store.edit',compact('companies','providers','store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $validatedData = $request->validated();
        
        $store = Store::FindOrFail($id);
        
	$store->date_in = $request->date_in;
        $store->designation = $request->designation;
	$store->reference = $request->reference;
	$store->brand = $request->brand;
	$store->quantity_in = $request->quantity_in;
	$store->provider_id = $request->provider_id;
	$store->price_in = $request->price_in;
	$store->reference_oem = $request->reference_oem;
	$store->reference_equivalent = $request->reference_equivalent;
	$store->user_id = auth()->user()->id;
		
	if($store->save())
            return redirect()->route('store.edit', $store->id)->with('update_success', "Mise à jour avec succès.");
	else
            return redirect()->back()->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
    }
    
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOut(Request $request)
    {
       
        $validatedData = $request->validate(
                [
                    'store_id' =>['required','exists:App\Models\Store,id'],
                    'company_id' =>['required','exists:\App\Models\Company,id'],
                    'quantity_out' =>['required','integer','min:1'],
                    'bl' =>['required','string','max:50'],
                    'date_out' =>['required','date'],
                ]
        );
        
        $store = Store::FindOrFail($request->store_id);
        
	$store->date_out = $request->date_out;
        $store->company_id = $request->company_id;
	$store->quantity_out = $request->quantity_out;
	$store->bl = $request->bl;
        
	if($store->save())
            return redirect()->route('store.edit', $store->id)->with('update_success', "Mise à jour avec succès.");
	else
            return redirect()->back()->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
    }
    
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMachine(Request $request)
    {
       $validatedData = $request->validate(
                [
                    'store_id' =>['required','exists:App\Models\Store,id'],
                    'serie_number' =>['required','string','max:75'],
                    'model' =>['required','string','max:75'],
                    'compartment' =>['required','string','max:75'],
                ]
        );
        
        $store = Store::FindOrFail($request->store_id);
        
	$store->serie_number = $request->serie_number;
        $store->model = $request->model;
	$store->compartment = $request->compartment;
        
	if($store->save())
            return redirect()->route('store.edit', $store->id)->with('update_success', "Mise à jour avec succès.");
	else
            return redirect()->back()->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);
        return redirect()->back()->with('update_success', "Elément supprimé avec succès.");
    }
}
