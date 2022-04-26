@extends('layouts.app')
@section('title', __('Tableau de bord'))

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Tableau de Bord
                        <small>Analyse IT</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@include('Utils')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
		@foreach($turnovers as $turnover)
	
		  @if($loop->index <= 3)
			<div class="col-xl-6 col-md-6 xl-50">
				<div class="card o-hidden widget-cards">
					<div class="bg-warning card-body">
						<div class="media static-top-widget row">
							<div class="icons-widgets col-4">
								<div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
							</div>
							<div class="media-body col-8"><span class="m-0">CHIFFRE D'AFFAIRES 
								
                                                                <span>@php Utils::month($turnover->month)@endphp</span>
											
								<h3 class="mb-0"> <span >{{(number_format( $turnover->sales , 0 , '.' , ',' ))}}</span>&nbsp;FCFA</h3>
							</div>
						</div>
					</div>
				</div>
			 </div>
			@endif
		@endforeach
		
		
        @foreach($turnovers as $turnover)
			<div class="col-xl-4 col-md-6 xl-50">
				<div class="card order-graph sales-carousel">
					<div class="card-header">
						<h6>
                                                     <span>@php Utils::month($turnover->month)@endphp</span>
						
											{{$turnover->year}}</h6>
						<div class="row">
							<div class="col-6">
								<div class="small-chartjs">
									<div class="flot-chart-placeholder" id="simple-line-chart-sparkline-3"></div>
								</div>
							</div>
							<div class="col-6">
								<div class="value-graph">
									<h3>@php echo ceil(($turnover->sales / 125000000)*100) @endphp %<span><i class="fa fa-angle-up font-primary"></i></span></h3>
								</div>
							</div>
							<span>Montant Ventes</span>
								<h2 class="mb-0">{{(number_format( $turnover->sales , 0 , '.' , ',' ))}}</h2>
								<p>% Réalisation du CA : @php echo ceil(($turnover->sales / 125000000)*100) @endphp%<span><i class="fa fa-angle-up"></i></span></p>
						</div>
					</div>
					<div class="card-body">
						<div class="media">
							<div class="media-body">
								
								<span>Montant Devis</span>
								<h2 class="mb-0">{{(number_format( $turnover->quotes , 0 , '.' , ',' ))}}</h2>
								<p>Taux de conversion devis->vente : @php echo ceil(($turnover->sales / $turnover->quotes)*100)@endphp% <span><i class="fa fa-angle-up"></i></span></p>
							</div>
							<div class="bg-primary b-r-8">
								<div class="small-box">
									@php echo ceil(($turnover->sales / $turnover->quotes)*100)@endphp%
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Status Ventes</h5>
                    
                </div>
                <div class="card-body">
                    <div class="row">
			<div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Avril</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie <span class="">99.5%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">43.2%%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">26.86%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">4.7%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Mars</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire &nbsp;&nbsp; <span >168,41%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span >65%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie &nbsp;<span >49,7%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span >22,5%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph">
                                <h6>Classement Objectif Février</h6>
                                
                                <div class="order-graph-bottom">
                                    <div class="media">
                                        <div class="order-color-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Joseph &nbsp;&nbsp;<span >96%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-color-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Magloire &nbsp;&nbsp;<span >46,45%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-color-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Jean Marie &nbsp;<span >42%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-color-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0">Leonel &nbsp;&nbsp;<span >3%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
			<div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Janvier</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp; <span >109%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie &nbsp;<span >38%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span >32%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span >31%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
			
			<div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Annuel</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span >27%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire &nbsp;&nbsp;<span >23,3%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;<span >19,6%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span >5,4%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
		
		<!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>LISTE DES RETOURS</h5>
                    </div>
                    <div class="card-body vendor-table">
                    <div class="btn-popup pull-right">
                                    <a href="{{route('return.create')}}"><button type="button" class="btn btn-primary">Ajouter un Retour</button></a>
                                </div>
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Entreprise</th>
                                <th>BC</th>
								<th>BL</th>
                                <th>Reférence</th>
                                <th>Désignation</th>
                                <th>Motif</th>
								<th>Observation</th>
								<th>Fournisseur</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
							@foreach($returns as $return)
								<tr>
									<td>
										<div class="d-flex vendor-list">
										{{$return->date}}
										</div>
									</td>
									<td>{{$return->entreprise}}</td>
									<td>{{$return->bc}}</td>
									<td>{{$return->bl}}</td>
									<td>{{$return->reference}}</td>
									<td>{{$return->designation}}</td>
									<td>{{$return->motif}}</td>
									<td>{{$return->observation}}</td>
									<td>{{$return->fournisseur}}</td>
									<td>
								
										<a href="{{route('return.edit',$return->id)}}"><i class="fa fa-edit me-2 font-success"></i></a>
										
										  <a href="{{ route('return.destroy',['return' => $return->id]) }}" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal{{$return->id}}"><i class="fa fa-trash font-danger"></i></a>
                                            
                                        <div class="modal fade" id="exampleModal{{$return->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title f-w-600" id="exampleModalLabel">Suppression</h5>
														<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
													</div>
													<div class="modal-body">
														<form method="POST" action="{{ route('return.destroy',['return' => $return->id]) }}" id="delete-form{{$return->id}}">
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
								</tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
    

    </div>
</div>
<!-- Container-fluid Ends-->


@endsection