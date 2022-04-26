<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ReturnRequest;
use App\Models\ReturnModel;
use App\Models\Company;
use App\Models\Provider;


class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = ReturnModel::all();
		$companies = Company::all();
		$providers = Provider::all();
		return view('return.index',compact('returns','companies','providers'));
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
        return view('return.create',compact('companies','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReturnRequest $request)
    {
        $validatedData = $request->validated();
		$returnModel = new ReturnModel;
		$returnModel->date = $request->date;
        $returnModel->bc = $request->bc;
		$returnModel->bl = $request->bl;
		$returnModel->reference = $request->reference;
		$returnModel->designation = $request->designation;
		$returnModel->quantite = $request->quantite;
		$returnModel->motif = $request->motif;
		$returnModel->observation = $request->observation;
		$returnModel->entreprise = $request->entreprise;
		$returnModel->fournisseur = $request->fournisseur;
		$returnModel->user_id = auth()->user()->id;
		
		if($returnModel->save())
			return redirect()->route('return.index')->with('update_success', "Retour ajoutée avec succès.");
		else
			return redirect()->route('return.create')->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
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
		$returnModel = ReturnModel::findorfail($id);
		$companies = Company::all();
		$providers = Provider::all();
        return view('return.edit', compact('returnModel','companies','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReturnRequest $request, $id)
    {
        $validatedData = $request->validated();
		$returnModel = ReturnModel::FindOrFail($id);
		$returnModel->date = $request->date;
        $returnModel->bc = $request->bc;
		$returnModel->bl = $request->bl;
		$returnModel->reference = $request->reference;
		$returnModel->designation = $request->designation;
		$returnModel->quantite = $request->quantite;
		$returnModel->motif = $request->motif;
		$returnModel->observation = $request->observation;
		$returnModel->entreprise = $request->entreprise;
		$returnModel->fournisseur = $request->fournisseur;
		$returnModel->save();
		return redirect()->route('return.index')->with('update_success', "Retour mise à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReturnModel::destroy($id);
		return redirect()->route('return.index')->with('update_success', "Retour supprimé avec succès.");
    }
}
