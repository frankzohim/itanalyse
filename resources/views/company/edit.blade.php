@extends('layouts.app')
@section('title', __('Editer une entreprise'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Editer une entreprise
                                    <small>ITC Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Entreprise</li>
                                <li class="breadcrumb-item active">Editer</li>
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
                            <form class="needs-validation add-product-form" action="{{route('company.update',$company->id)}}" method="POST" >
							@method('PUT')
							@csrf
							  <div class="card-body">
                                <div class="digital-add needs-validation">
									<div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Nom</label>
                                        <input class="form-control" id="name" name="name" type="text" required="" value="{{$company->name}}">
                                    </div>
                                    
                                   <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Téléphone</label>
                                        <input class="form-control" id="phone" name="phone" type="text" value="{{$company->phone}}">
                                    </div>
									 <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Adresse</label>
                                        <input class="form-control" id="address" name="address" type="text" value="{{$company->address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
							<div class="form-group mb-0">
                                        <div class="product-buttons text-center">
                                            <button type="submit" class="btn btn-primary">Enregistrer </button>
                                        </div>
                     </div>
                    </div>
                    
				
					 </form>
                </div>
            </div>
            <!-- Container-fluid Ends-->
@endsection