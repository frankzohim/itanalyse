@extends('layouts.app')
@section('title', __('Liste CA'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Chiffre d'affaires
                                    <small>Kensoh Dashboard</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html.htm"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Chiffre d'affaires</li>
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
                        <h5>Chiffre d'affaires</h5>
                    </div>
                    <div class="card-body vendor-table">
                    @if(auth()->user()->role_id == 1)
                    <div class="btn-popup pull-right">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Ajouter CA</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Chiffre d'affaires</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                <form class="needs-validation add-product-form" method="POST" action="{{route('turnover.store')}}" >
													    @csrf
											
													<div class="col-xl-12">
														
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
													<div class="col-xl-12">
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
																
													</div>
												</div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endif
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Mois</th>
                                <th>Année</th>
                                <th>Montant Ventes</th>
                                <th>Montant Devis</th>
                                <th>Taux Conversion</th>
                                <th>% RCA</th>
                             @if(auth()->user()->role_id == 1)
                                <th>Actions</th>
                             @endif
                            </tr>
                            </thead>
                            <tbody>
							@foreach($turnovers as $turnover)
								<tr>
									<td>
										<div class="d-flex vendor-list">
											@switch($turnover->month)
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
										</div>
									</td>
									<td>{{ $turnover->year}}</td>
									<td>{{(number_format( $turnover->sales , 0 , '.' , ',' )) }}</td>
									<td>{{(number_format( $turnover->quotes , 0 , '.' , ',' )) }}</td>
									@php 
										$taux_convertion = ceil(($turnover->sales / $turnover->quotes)*100);
										$RCA = ceil(($turnover->sales / 125000000)*100);
									@endphp
									<td>{{$taux_convertion}}%</td>
									<td>{{$RCA}}%</td>
                                                                       @if(auth()->user()->role_id == 1)
									<td>
								
										<a href="{{route('turnover.edit',$turnover->id)}}"><i class="fa fa-edit me-2 font-success"></i></a>
										
										  <a href="{{ route('turnover.destroy',['turnover' => $turnover->id]) }}" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal{{$turnover->id}}"><i class="fa fa-trash font-danger"></i></a>
                                            
                                        <div class="modal fade" id="exampleModal{{$turnover->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title f-w-600" id="exampleModalLabel">Suppression</h5>
														<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
														<form method="POST" action="{{ route('turnover.destroy',['turnover' => $turnover->id]) }}" id="delete-form{{$turnover->id}}">
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