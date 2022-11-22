@extends('layouts.app')
@section('title', __('Tableau de bord'))
@php
    $months = [
        1 =>'Janvier',
        2 =>'Février',
        3 =>'Mars',
        4 =>'Avril',
        5 =>'Mai',
        6 =>'Juin',
        7 =>'Août',
        8 =>'Septembre',
        9 =>'Juillet',
        10 =>'Octobre',
        11 =>'Novembre',
        12 =>'Décembre'
    ];
@endphp
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
		
            <div class="col-xl-12 xl-100">
                        <div class="card">
                            <div class="card-header">
                                <h5>Top 20 - 2022</h5>
                             
                            </div>
                            <div class="card-body">
                                <div class="user-status table-responsive latest-order-table">
                                    <table class="table table-bordernone">
                                        <thead>
                                        <tr>
                                            <th scope="col">Numéro</th>
                                            <th scope="col">Entreprise</th>
                                            <th scope="col">Chiffre d'affaires</th>
                                            <th scope="col">Devis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @forelse ($top20 as $item)
                                                 @if ($i>20)
                                                     @break;
                                                 @endif

                                                    <tr>
                                                        <td style="font-size: 13px; font-weight : bold; ">{{ $i }}</td>
                                                        <td class="digits" style="font-size: 13px; font-weight : bold; ">{{ $item->company_name }}</td>
                                                        <td class="digits" style="font-size: 13px; font-weight : bold; ">{{ (number_format( $item->sales_amount , 0 , '.' , ',' )) }} </td>
                                                        <td class="digits" style="font-size: 13px; font-weight : bold; ">{{ (number_format( $item->quotes_amount , 0 , '.' , ',' )) }} </td>
                                                    </tr>

                                               @php
                                                   $i++
                                               @endphp
                                            @empty
                                                Pas de données
                                            @endforelse
                                           
                                       
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" onclick="showTop20();">Tout voir</button>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Status Ventes</h5>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        
						<div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Annuel</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire &nbsp;&nbsp;<span>94.44%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span >84%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;<span >57.57%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span >34%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Novembre</h6>
                                
                                <div class="order-graph-bottom sales-location">

                                     <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">166.36%</span></h6>
                                        </div>
                                    </div>

                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph&nbsp;&nbsp;<span class="">17.76%</span></h6>
                                        </div>
                                    </div>

                                     <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie &nbsp;&nbsp;<span class="">11.71%</span></h6>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                    
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">9.75%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Octobre</h6>
                                
                                <div class="order-graph-bottom sales-location">

                                     <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">131.20%</span></h6>
                                        </div>
                                    </div>

                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph&nbsp;&nbsp;<span class="">78.11%</span></h6>
                                        </div>
                                    </div>

                                     <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie &nbsp;&nbsp;<span class="">29.37%</span></h6>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                    
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leneol&nbsp;&nbsp;<span class="">0.25%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Septembre</h6>
                                
                                <div class="order-graph-bottom sales-location">

                                     <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph&nbsp;&nbsp;<span class="">135%</span></h6>
                                        </div>
                                    </div>

                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">128.35%</span></h6>
                                        </div>
                                    </div>

                                     <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie &nbsp;&nbsp;<span class="">89.58%</span></h6>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                    
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leneol&nbsp;&nbsp;<span class="">86.84%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Août</h6>
                                
                                <div class="order-graph-bottom sales-location">

                                     <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">113,9%</span></h6>
                                        </div>
                                    </div>
                                    
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">103.72%</span></h6>
                                        </div>
                                    </div>
                                   
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;&nbsp;<span class="">63.55%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">4.87%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Juillet</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;&nbsp;<span class="">150%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">137%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">51%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">49.17%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Juin</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">139%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">91.6%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;&nbsp;<span class="">51.7%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">4%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Mai</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire <span class="">283.6%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">83,00%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie&nbsp;&nbsp;<span class="">55,77%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">18,73%</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

			            <div class="col-xl-3 col-sm-6 xl-50">
                            <div class="order-graph sm-order-space">
                                <h6>Classement Objectif Avril</h6>
                                
                                <div class="order-graph-bottom sales-location">
                                    <div class="media">
                                        <div class="order-shape-primary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Jean Marie <span class="">104%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-secondary"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Joseph &nbsp;&nbsp;<span class="">70%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-danger"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Magloire&nbsp;&nbsp;<span class="">33.75%</span></h6>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="order-shape-warning"></div>
                                        <div class="media-body">
                                            <h6 class="mb-0 me-0">Leonel&nbsp;&nbsp;<span class="">17.2%</span></h6>
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
                        <div style="display: flex; background-color:aqua; height:15px">

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
                        
                        <br>
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
                        
		
        </div>
                   
                </div>
            </div>
        </div>

        <!-- cumul année -->
		
        <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Année 2022</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 xl-50">
                                        <div class="order-graph">
                                            <h6>Valeur des Ventes : </h6>
                                          
                                             
                                            <div class="order-graph-bottom">
                                                @php
                                                    $totalSales = 0;
                                                @endphp
                                                <script>
                                                   
                                                    var months = [];
                                                    var sales = [];
                                                    //alert("hello");
                                                    console.log('before loop');
                                                    console.log(sales);
                                                </script>
                                                @forelse ($year2022 as $year)
                                                     <div class="media">
                                                        <div class="order-shape-success"></div>
                                                        <div class="media-body">
                                                            @php
                                                                $totalSales += $year->sales_amount;
                                                            @endphp
                                                            <script>
                                                                months.push("{{ $months[$year->month] }}");
                                                                sales.push({{ $year->sales_amount }});
                                                                console.log(sales);
                                                            </script>
                                                            <h6 class="mb-0">{{  $months[$year->month] }}  
                                                                <span class="pull-right">
                                                                    {{ (number_format( $year->sales_amount , 0 , '.' , ',' )) }} XAF 
                                                                </span>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                @empty
                                                    
                                                @endforelse
                                               
                                                
                                            </div>
                                           
                                        </div>
                                    </div>

                                     <div class="col-xl-3 col-sm-6 xl-50">
                                        <div class="order-graph">
                                            <h6>Valeur des Devis : </h6>
                                          
                                             
                                            <div class="order-graph-bottom">
                                                @php
                                                    $totalSales = 0;
                                                @endphp
                                                @forelse ($year2022 as $year)
                                                     <div class="media">
                                                        <div class="order-shape-success"></div>
                                                        <div class="media-body">
                                                            @php
                                                                $totalSales += $year->sales_amount;
                                                            @endphp
                                                            <h6 class="mb-0">{{  $months[$year->month] }}  <span class="pull-right">{{ (number_format( $year->sales_amount , 0 , '.' , ',' )) }} XAF </span></h6>
                                                        </div>
                                                    </div>
                                                @empty
                                                    
                                                @endforelse
                                               
                                                
                                            </div>
                                           
                                        </div>
                                    </div>
                         
                                    
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="" 
                                    data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                
                                </div>
                            </div>
                              <div class="card-body">
                                <div class="row">
                            
                         
                                    <div class="col-xl-6 xl-100">
                                        <div class="order-graph xl-space">
                                            <h6>Revenu Par Mois</h6>
                                             <canvas id="barChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 xl-100">
                                        <div class="order-graph xl-space">
                                            <h6>Revenu Par Mois</h6>
                                             <canvas id="lineChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="" 
                                    data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                
                                </div>
                            </div>
                        </div>
            </div>

            <!-- end cumul par an -->

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
<!--script chart-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
const ctx = document.getElementById('barChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'CA',
            data: sales,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script>
const ctx1 = document.getElementById('lineChart').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'CA',
            data: sales,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<!-- Container-fluid Ends-->


@endsection