@extends('layouts.app')
@section('title', __('Liste Fournisseurs'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Liste des Fournisseurs
                                    <small>Kensoh Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html.htm"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Liste Fournisseurs</li>
                                <li class="breadcrumb-item active">Listing</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Container-fluid Ends-->
			<!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>Liste Fournisseurs</h5><br>
						 @if (session('update_success'))
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<span class="alert-icon"><i class="ni ni-like-2"></i></span>
											<span class="alert-text"><strong>Succès! </strong> <strong>{{ session('update_success') }} </strong></span>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
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
                    </div>
                    <div class="card-body vendor-table">
                    @if(in_array(auth()->user()->role_id, ['1','4','5','6']))
                        <div class="btn-popup pull-right">
                            <a href="{{route('provider.create')}}"><button type="button" class="btn btn-primary">Ajouter un fournisseur</button></a>
                        </div>
                    @endif
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                               @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 4 || auth()->user()->role_id == 6)
                                <th>Actions</th>
                               @endif
                            </tr>
                            </thead>
                            <tbody>
							@foreach($providers as $provider)
								<tr>
									<td>
										<div class="d-flex vendor-list">
										{{$provider->name}}
										</div>
									</td>
									<td>{{$provider->phone}}</td>
									<td>{{$provider->address}}</td>
                                                                        @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 4 || auth()->user()->role_id == 6)
									<td>
								
										<a href="{{route('provider.edit',$provider->id)}}"><i class="fa fa-edit me-2 font-success"></i></a>
										
										  <a href="{{ route('provider.destroy',['provider' => $provider->id]) }}" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal{{$provider->id}}"><i class="fa fa-trash font-danger"></i></a>
                                            
                                        <div class="modal fade" id="exampleModal{{$provider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title f-w-600" id="exampleModalLabel">Suppression</h5>
														<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
														<form method="POST" action="{{ route('provider.destroy',['provider' => $provider->id]) }}" id="delete-form{{$provider->id}}">
														@csrf
														<p>{{ __('Voulez vous supprimer cet élément?') }}</p>
														@method('DELETE')
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-primary">Oui</button>
														<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
													</div>
													</form>
												</div>
											</div>
										</div>
									</td>
                                                                       @endif
								</tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->



@endsection