@extends('layouts.app')
@section('title', __('Suivi Commande'))

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Suivi des commandes
                                    <small>Tableau de bord IT</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html.htm"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Suivi Commande</li>
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
                        <h5>Suivi des commandes au 11 Juillet 2022</h5>
                    </div>
                        <iframe src="/assets/controle.pdf" type="application/pdf" style="height:1000px;width:1500px;">
                </div>
            </div>
            <!-- Container-fluid Ends-->



@endsection