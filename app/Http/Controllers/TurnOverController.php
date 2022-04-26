<?php

namespace App\Http\Controllers;
use App\Models\TurnOver;
use Illuminate\Http\Request;

class TurnOverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$turnovers = TurnOver::all();
        return view('turnover.index', compact('turnovers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turnover.create', compact('companies','providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'year' => ['required','digits:4','integer','min:2018','max:'.(date('Y')+1)], 
            'month' => ['required', 'integer', 'min:1','max:12'],
			'sales' => ['required', 'integer', 'min:0'],
			'quotes' => ['required', 'integer', 'min:0'],
         ]);
		 
		 //dd(number_format( request('sales') , 0 , '.' , ',' ));
		 
		 $turnover = \App\Models\TurnOver::firstOrNew(['year' =>  request('year'), 'month' =>  request('month')]);
 
		 $turnover->sales = request('sales');
		 $turnover->quotes = request('quotes');
		 $turnover->user_id = auth()->user()->id;
		 $turnover->save();
		 
         if($turnover->save())
			return redirect()->route('turnover.edit', ['turnover' => $turnover->id])->with('update_success', "CA ajoutée avec succès.");
		 else
			 return redirect()->route('turnover.create')->with('update_failure', "Une erreur s'est produite, veuillez réessayez plutard.");
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
        //Loading brand to edit
        $turnover = TurnOver::findOrFail($id);
		
		//Loading edition form
        return view('turnover.edit', compact('turnover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TurnOver $turnover)
    {
        $validatedData = $request->validate([
            'year' => ['required','digits:4','integer','min:2018','max:'.(date('Y')+1)], 
            'month' => ['required', 'integer', 'min:1','max:12'],
			'sales' => ['required', 'integer', 'min:0'],
			'quotes' => ['required', 'integer', 'min:0'],
         ]);

		$turnover->update($request->all());
		return redirect()->route('turnover.edit', ['turnover' => $turnover->id])->with('update_success', "CA ajoutée avec succès.");
		 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TurnOver::destroy($id);
		return redirect()->route('turnover.index');
    }
}
