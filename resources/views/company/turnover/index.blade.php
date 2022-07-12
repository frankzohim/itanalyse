@extends('layouts.app')
@section('title', __('Liste CA/Entreprise'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Chiffre d'affaires / Entreprise
                                    <small>IT Analyse</small>
                                </h3>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Chiffre d'affaires / Entreprise</li>
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
                        <h5>Chiffre d'affaires / Entreprise</h5>
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
                    @if(auth()->user()->role_id == 1)
                    <div class="btn-popup pull-right">
                                    <a href="{{ route('turnovercompany.create') }}"><button type="button" class="btn btn-primary">
																			Ajouter CA
																	</button></a> 
                                
                                </div>
                             @endif
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
																<th>Entreprise</th>
																<th>Mois , Année</th>
                                <th>Ventes</th>
                                <th>Devis</th>
                                <th>TC/N</th>
																 <th>TC/M</th>
                             @if(auth()->user()->role_id == 1)
                                <th>Actions</th>
                             @endif
                            </tr>
                            </thead>
                            <tbody>
							@foreach($turnOverCompanys as $turnovercompany)
								<tr>
									<td>
										<div class="d-flex vendor-list">
											{{ $turnovercompany->company->name }}
										</div>
									</td>
									<td>
											@switch($turnovercompany->month)
											@case(1) 
												<span>Janvier</span>
											@break
												
											@case(2) 
												<span>Février</span>
											@break
											@case(3) 
												<span>Mars</span>
											@break
											@case(4) 
												<span>Avril</span>
											@break
											@case(5) 
												<span>Mai</span>
											@break
											@case(6) 
												<span>Juin</span>
											@break
											@case(7) 
												<span>Juillet</span>
											@break
											@case(8) 
												<span>Août</span>
											@break
											@case(9) 
												<span>Septembre</span>
											@break
											@case(10) 
												<span>Octobre</span>
											@break
											@case(11) 
												<span>Novembre</span>
											@break
											@case(12) 
												<span>Décembre</span>
											@break
											@endswitch
										{{ $turnovercompany->year}}
									</td>
									<td >Montant : <span class="numbers">{{(number_format( $turnovercompany->sales_amount , 0 , '.' , ',' )) }} </span><br>
										Nombre : <span > {{ $turnovercompany->sales }} </span> </td>
									<td>Montant : {{(number_format( $turnovercompany->quotes_amount , 0 , '.' , ',' )) }} <br>
										Nombre : {{ $turnovercompany->quotes }}</td>
									@php 

										if ($turnovercompany->quotes !=0)
												$taux_convertion = ceil(($turnovercompany->sales / $turnovercompany->quotes)*100);
										else
										    $taux_convertion = 0;


										if ($turnovercompany->quotes_amount !=0)
												$RCA = ceil(($turnovercompany->sales_amount / $turnovercompany->quotes_amount)*100);
										else
										    $RCA = 0;


									@endphp

									<td>{{$taux_convertion}}%</td>
									<td>{{$RCA}}%</td>
                     @if(auth()->user()->role_id == 1)
									<td>
								
										<a href="{{route('turnovercompany.edit',$turnovercompany->id)}}"><i class="fa fa-edit me-2 font-success"></i></a>
										
										  <a href="{{ route('turnovercompany.destroy',['turnovercompany' => $turnovercompany->id]) }}" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal{{$turnovercompany->id}}"><i class="fa fa-trash font-danger"></i></a>
                                            
                                        <div class="modal fade" id="exampleModal{{$turnovercompany->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title f-w-600" id="exampleModalLabel">Suppression</h5>
														<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
														<form method="POST" action="{{ route('turnovercompany.destroy',['turnovercompany' => $turnovercompany->id]) }}" id="delete-form{{$turnovercompany->id}}">
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