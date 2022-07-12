<?php

namespace App\Http\Controllers;
use App\Models\TurnOver;
use App\Models\ReturnModel;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){

		//Loading turnover for the current year
		$turnovers = TurnOver::orderByDesc('id')->where('year',2022)->get();
		$returns = ReturnModel::all();

		//Loading Top20 for the current year
		$top20 = DB::table('turn_over_companies')
            ->join('companies', 'companies.id', '=','turn_over_companies.company_id')
            ->select('companies.id as company_id','companies.name as company_name', DB::raw("SUM(sales_amount) as sales_amount"), DB::raw("SUM(quotes_amount) as quotes_amount"))
						->where('turn_over_companies.year',2022)
            ->groupby('company_id')
						->orderBy('sales_amount', 'DESC')
            ->get();
			//dd($top20);

		//Loading CA by month for the current year
		$year2022 = DB::table('turn_over_companies')
								->select('month', DB::raw("SUM(sales_amount) as sales_amount"), DB::raw("SUM(quotes_amount) as quotes_amount"))
								->where('turn_over_companies.year',2022)
						 		->groupby('month')
								->orderBy('month', 'ASC')
            		->get();
			//dd($year2022);
		return view('dashboard',compact('turnovers','returns', 'top20','year2022'));
	}
}
