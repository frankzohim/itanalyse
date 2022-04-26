<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
		return view('company.index',['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $validedData = $request->validated();
		$company = new Company;
		
		$company->name = $request->name;
        $company->phone = $request->phone;
		$company->address = $request->address;
		
		if($company->save())
			return redirect()->route('company.index')->with('update_success', "Marque ajoutée avec succès.");
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
        $company = Company::FindOrFail($id);
		return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $validatedData = $request->validated();
		$company = Company::FindOrFail($id);
		$company->name = $request->name;
        $company->phone = $request->phone;
		$company->address = $request->address;
		$company->save();
		return redirect()->route('company.index')->with('update_success','Entreprise mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
		return redirect()->route('company.index')->with('update_success','Entreprise supprimée avec succès');
    }
}
