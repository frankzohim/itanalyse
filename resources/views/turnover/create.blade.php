@extends('layouts.app')
@section('title', __('Ajouter un CA'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Ajouter un CA
                                    <small>ITC Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html.htm"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Chiffre d'affaires</li>
                                <li class="breadcrumb-item active">Ajouter</li>
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
                                <h5>Ajouter un chiffre d'affaire</h5>
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
									<form class="needs-validation add-product-form" method="POST" action="{{route('turnover.store')}}" >
                                            @csrf
											
                                    <div class="col-xl-6">
                                        
											<div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Année:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <select name="year" id="year" class="form-control">
															<option value="2022"> 2022</option>
															<option value="2021"> 2021</option>
															<option value="2020"> 2020</option>
															<option value="2019"> 2019</option>
															<option value="2018"> 2018</option>
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
															<option value="1"> Janvier</option>
															<option value="2"> Février</option>
															<option value="3"> Mars</option>
															<option value="4"> Avril</option>
															<option value="5"> Mai</option>
															<option value="6"> Juin</option>
															<option value="7"> Juillet</option>
															<option value="8"> Août</option>
															<option value="9"> Septembre</option>
															<option value="10"> Octobre</option>
															<option value="11"> Novembre</option>
															<option value="12"> Décembre</option>
														</select>
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
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Montant des ventes:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0" name="sales" id="sales" class="form-control" required autofocus>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>
											<div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0"> Montant des quotations:</label>
                                                    <div class="col-xl-8 col-sm-7">
                                                        <input type="number" step="0.01" min="0"  name="quotes" id="quotes" class="form-control" required autofocus>
                                                    </div>
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                   
                                                </div>
                                                
                                            </div>
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                                <button type="button" class="btn btn-light">Annuler</button>
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