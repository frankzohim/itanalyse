@extends('layouts.app')
@section('title', __('Ajouter une entrée/sortie'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Ajouter une entrée/sortie
                                    <small>ITC Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item"></li>
                                <li class="breadcrumb-item active">Ajouter</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

                        <!-- Container-fluid starts-->
            <div class="container-fluid">
				<!-- Validation Errors -->
				<x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="row product-adding">
						<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
								<li class="nav-item"><a class="nav-link active show" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">Entrée</a></li>
								<li class="nav-item"><a class="nav-link" id="restriction-tabs" data-bs-toggle="tab" href="#restriction" role="tab" aria-controls="restriction" aria-selected="false" data-original-title="" title="">Sortie</a></li>
								<li class="nav-item"><a class="nav-link" id="usage-tab" data-bs-toggle="tab" href="#usage" role="tab" aria-controls="usage" aria-selected="false" data-original-title="" title="">Machine</a></li>
						</ul>
						<div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
								<div class="col-xl-12">
									<div class="card">
										 
										<form class="needs-validation add-product-form" action="{{route('store.store')}}" method="POST" >
										@csrf
										<div class="card-body">
											<div class="digital-add needs-validation">
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Date d'arrivée</label>
													<input class="form-control" id="date_in" name="date_in" type="date" required="">
												</div>
												
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Reférence</label>
													<input class="form-control" id="reference" name="reference" type="text" required="">
												</div>
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0">Reférence OEM</label>
													<input class="form-control" id="reference_oem" name="reference_oem" type="text">
												</div>
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0">Reférence Equivalente</label>
													<input class="form-control" id="reference_equivalent" name="reference_equivalent" type="text" >
												</div>
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Désignation</label>
													<input class="form-control" id="designation" name="designation" type="text" required="">
												</div>
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Marque</label>
													<input class="form-control" id="brand" name="brand" type="text" required="">
												</div>
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Quantité</label>
													<input class="form-control" id="quantity_in" name="quantity_in" type="number" required="">
												</div>
												
												
												<div class="form-group">
													<label class="col-form-label"><span>*</span> Fournisseur</label>
													<select class="custom-select form-control" required="" name="provider_id">
													   @forelse($providers as $provider)
															  <option value="{{$provider->id}}">{{$provider->name}}</option>
														@empty
													  
														@endforelse
													</select>
												</div>
											
												<div class="form-group">
													<label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Prix fournisseur</label>
													<input class="form-control" id="price_in" name="price_in" type="number" required="">
												</div>
											   
											   
											</div>
										</div>
									</div>
								</div>
							
							<div class="form-group mb-0">
												<div class="product-buttons text-center">
													<button type="submit" class="btn btn-primary">Créer </button>
												</div>
							 </div>
							 </form>
						</div>
					
					<div class="tab-pane fade" id="restriction" role="tabpanel" aria-labelledby="restriction-tabs">
                                <form class="needs-validation" novalidate="">
                                    <h4>Sortie</h4>
                                    <div class="form-group row">
                                        <label for="validationCustom3" class="col-xl-3 col-md-4">Date sortie</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="date_out" name="date_out" type="date" required="" disabled>
                                        </div>
                                        <div class="valid-feedback">Please Provide a Product Name.</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-md-4">Client</label>
                                        <div class="col-md-7">
											<select class="custom-select form-control" required="" name="entreprise" disabled>
												@forelse($companies as $company)
														<option value="{{$company->id}}">{{$company->name}}</option>
												@empty
												@endforelse
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom4" class="col-xl-3 col-md-4">Quantité</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="quantity_out" name="quantity_out" type="number" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validationCustom5" class="col-xl-3 col-md-4">Numéro BL</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="bl" name="bl" type="text" disabled>
                                        </div>
                                    </div>
                                </form>
                       </div>
					   
					     <div class="tab-pane fade" id="usage" role="tabpanel" aria-labelledby="usage-tab">
                                <form class="needs-validation" novalidate="">
                                    <h4>Machine</h4>
                                    <div class="form-group row">
                                        <label for="validationCustom6" class="col-xl-3 col-md-4">Numéro de série</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="serie_number" name="serie_number" type="text" disabled>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="validationCustom6" class="col-xl-3 col-md-4">Modèle</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="model" name="model" type="text" disabled>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="validationCustom6" class="col-xl-3 col-md-4">Compartiment</label>
                                        <div class="col-md-7">
                                            <input class="form-control" id="compartment" name="compartment" type="text" disabled>
                                        </div>
                                    </div>
                                </form>
                          </div>
				</div>
					  
                </div>
            </div>
            <!-- Container-fluid Ends-->
@endsection