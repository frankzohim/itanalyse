<?php

namespace App\Http\Controllers;
use App\Models\TurnOver;
use App\Models\ReturnModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
		//Loading turnover for the current year
		$turnovers = TurnOver::orderByDesc('id')->where('year',2022)->get();
		$returns = ReturnModel::all();
		return view('dashboard',compact('turnovers','returns'));
	}
}
