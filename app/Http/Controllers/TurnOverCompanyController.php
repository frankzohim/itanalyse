<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\TurnOverCompany;
use App\Http\Requests\TurnOverCompanyRequest;
use Illuminate\Http\Request;

class TurnOverCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnOverCompanys = TurnOverCompany::all();
        return view('company/turnover/index',compact('turnOverCompanys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('company/turnover/create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TurnOverCompanyRequest $request)
    {
        //Validating user's inputs
        $validatedData = $request->validated();

        $turnOverCompany = new TurnOverCompany;

        $turnOverCompany->company_id = $request->company_id;
        $turnOverCompany->year = $request->year;
        $turnOverCompany->month = $request->month;
        $turnOverCompany->sales_amount = $request->sales_amount;
        $turnOverCompany->quotes_amount = $request->quotes_amount;
        $turnOverCompany->quotes = $request->quotes;
        $turnOverCompany->sales = $request->sales;
        $turnOverCompany->user_id = auth()->user()->id;

        if($turnOverCompany->save()){
            return redirect()->route('turnovercompany.index')->with('update_success', "Marque ajoutée avec succès.");
        }
        else {
            return redirect()->route('turnovercompany.index')->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TurnOverCompany  $turnOverCompany
     * @return \Illuminate\Http\Response
     */
    public function show(TurnOverCompany $turnOverCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TurnOverCompany  $turnOverCompany
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turnOverCompany = TurnOverCompany::findOrFail($id);
        $companies = Company::all();
        return view("company.turnover.edit", compact('turnOverCompany','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TurnOverCompany  $turnOverCompany
     * @return \Illuminate\Http\Response
     */
    public function update(TurnOverCompanyRequest $request, $id)
    {
        //Validating user's inputs
        $turnOverCompany = TurnOverCompany::findOrFail($id);
        $validatedData = $request->validated();

        //$turnOverCompany = new TurnOverCompany;

        $turnOverCompany->company_id = $request->company_id;
        $turnOverCompany->year = $request->year;
        $turnOverCompany->month = $request->month;
        $turnOverCompany->sales_amount = $request->sales_amount;
        $turnOverCompany->quotes_amount = $request->quotes_amount;
        $turnOverCompany->quotes = $request->quotes;
        $turnOverCompany->sales = $request->sales;
        $turnOverCompany->user_id = auth()->user()->id;

        //dd($turnOverCompany);

        if($turnOverCompany->save()){
            return redirect()->route('turnovercompany.index')->with('update_success', "CA mise à jour avec succès.");
        }
        else {
            return redirect()->route('turnovercompany.index')->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TurnOverCompany  $turnOverCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurnOverCompany $turnOverCompany)
    {
        //
    }
}
