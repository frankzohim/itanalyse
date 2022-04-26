@extends('layouts.app')
@section('title', __('Ajouter un retour'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Ajouter un retour
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
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                            <form class="needs-validation add-product-form" action="{{route('return.store')}}" method="POST" >
							@csrf
                            <div class="card-body">
                                <div class="digital-add needs-validation">
									<div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Date</label>
                                        <input class="form-control" id="date" name="date" type="date" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Reférence</label>
                                        <input class="form-control" id="reference" name="reference" type="text" required="">
                                    </div>
									<div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Désignation</label>
                                        <input class="form-control" id="designation" name="designation" type="text" required="">
                                    </div>
									<div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Quantité</label>
                                        <input class="form-control" id="quantite" name="quantite" type="number" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Bon Commande</label>
                                        <input class="form-control" id="bc" name="bc" type="text" required="">
                                    </div>
									<div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> Bon Livraison</label>
                                        <input class="form-control" id="bl" name="bl" type="text" required="">
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
							  <div class="card">
                           
                            <div class="card-body">
                                <div class="digital-add needs-validation">
									<div class="form-group">
                                        <label class="col-form-label"><span>*</span> Entreprise</label>
                                        <select class="custom-select form-control" required="" name="entreprise">
											@forelse($companies as $company)
												  <option value="{{$company->id}}">{{$company->name}}</option>
											@empty
                                          
											@endforelse
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label class="col-form-label"><span>*</span> Fournisseur</label>
                                        <select class="custom-select form-control" required="" name="fournisseur">
                                           @forelse($providers as $provider)
												  <option value="{{$provider->id}}">{{$provider->name}}</option>
											@empty
                                          
											@endforelse
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Motif</label>
                                        <textarea rows="5" cols="12" name="motif"></textarea>
                                    </div>
									 <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Observation</label>
                                        <textarea rows="5" cols="12" name="observation"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </div>
					<div class="form-group mb-0">
                                        <div class="product-buttons text-center">
                                            <button type="submit" class="btn btn-primary">Ajouter </button>
                                            <button type="button" class="btn btn-light">Annuler</button>
                                        </div>
                     </div>
					 </form>
                </div>
            </div>
            <!-- Container-fluid Ends-->
@endsection