@extends('layouts.app')
@section('title', __('Editer un CA'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Editer  un CA
                                    <small>ITC Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html.htm"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Chiffre d'affaires</li>
                                <li class="breadcrumb-item active">Editer</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Editer un chiffre d'affaire</h5>
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                   
									<!-- Validation Errors -->
									<x-auth-validation-errors class="mb-4" :errors="$errors" />
									
									@if (session('update_success'))
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<span class="alert-icon"><i class="ni ni-like-2"></i></span>
											<span class="alert-text"><strong>Succès! </strong> <strong>{{ session('update_success') }} </strong></span>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                        <div class="notification is-success">
                                        {{ session('update_success') }}
                                        </div>
									@endif
									@if (session('update_failure'))
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
											<span class="alert-text"><strong>Danger!</strong> <strong> {{ session('update_failure') }} </strong> </span>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
									@endif
							

                                <form class="needs-validation add-product-form" method="POST" action="{{route('turnovercompany.update', $turnOverCompany->id)}}" >
                                            @csrf
                                            @method('PUT')
									<div class="row">
                                        <div class="col-xl-6">
                                            
                                            <div class="form">
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Entreprise:</label>
                                                    <div class="col-xl-8 col-sm-7">

                                                        <select name="company_id" id="company_id" class="form-control">

                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}" @if($turnOverCompany->company_id==$company->id) echo selected @endif> {{ $company->name }}</option>
                                                            @endforeach

														</select>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

											<div class="form">

                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Année:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <select name="year" id="year" class="form-control">
															<option value="2022"  @if($turnOverCompany->year==2022) echo selected @endif> 2022</option>
															<option value="2021" @if($turnOverCompany->year==2021) echo selected @endif> 2021</option>
															<option value="2020" @if($turnOverCompany->year==2020) echo selected @endif> 2020</option>
															<option value="2019" @if($turnOverCompany->year==2019) echo selected @endif> 2019</option>
															<option value="2018" @if($turnOverCompany->year==2018) echo selected @endif> 2018</option>
														</select>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>
											
											<div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Mois:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <select name="month" id="month" class="form-control">
															<option value="1"  @if($turnOverCompany->month==1) echo selected @endif> Janvier</option>
															<option value="2"  @if($turnOverCompany->month==2) echo selected @endif> Février</option>
															<option value="3"  @if($turnOverCompany->month==3) echo selected @endif> Mars</option>
															<option value="4"  @if($turnOverCompany->month==4) echo selected @endif> Avril</option>
															<option value="5"  @if($turnOverCompany->month==5) echo selected @endif> Mai</option>
															<option value="6"  @if($turnOverCompany->month==6) echo selected @endif> Juin</option>
															<option value="7"  @if($turnOverCompany->month==7) echo selected @endif> Juillet</option>
															<option value="8"  @if($turnOverCompany->month==8) echo selected @endif> Août</option>
															<option value="9"  @if($turnOverCompany->month==9) echo selected @endif> Septembre</option>
															<option value="10" @if($turnOverCompany->month==10) echo selected @endif> Octobre</option>
															<option value="11" @if($turnOverCompany->month==11) echo selected @endif> Novembre</option>
															<option value="12" @if($turnOverCompany->month==12) echo selected @endif> Décembre</option>
														</select>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

                                            <div class="form">
                                                
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Montant ventes:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0" name="sales_amount" value="{{$turnOverCompany->sales_amount}}" id="sales_amount" class="form-control" required>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

                                    </div>
									<div class="col-xl-6">
											
											<div class="form">

                                                <div class="form-group mb-3 row">

                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Montant devis:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0"  name="quotes_amount"  value="{{$turnOverCompany->quotes_amount}}" id="quotes_amount" class="form-control" required>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>

                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

                                            <div class="form">

                                                <div class="form-group mb-3 row">

                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Nombres devis:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0" value="{{$turnOverCompany->quotes}}" name="quotes" id="quotes" class="form-control" required>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

                                            <div class="form">

                                                <div class="form-group mb-3 row">

                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Nombres ventes:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0"  name="sales" value="{{$turnOverCompany->sales}}" id="sales" class="form-control" required>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>

                                            <div class="offset-xl-3 offset-sm-4">

                                                <button type="submit" class="btn btn-primary">
                                                   Mettre à jour
                                                </button>
                                                <button type="button" class="btn btn-light">
                                                    Annuler
                                                </button>

                                            </div>
                                        
                                    </div>
                                    </div>	
                                   
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
@endsection