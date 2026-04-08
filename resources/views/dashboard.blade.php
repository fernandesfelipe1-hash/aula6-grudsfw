@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 font-weight-bold">Dashboard</h1>
            <p class="page-subtitle">Visão geral do sistema administrativo.</p>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="small-box bg-primary shadow-sm">
                        <div class="inner">
                            <h3>24</h3>
                            <p>Categorias cadastradas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="small-box bg-success shadow-sm">
                        <div class="inner">
                            <h3>185</h3>
                            <p>Produtos cadastrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="small-box bg-warning shadow-sm">
                        <div class="inner">
                            <h3>12</h3>
                            <p>Produtos com estoque baixo</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h3 class="card-title font-weight-bold">Bem-vindo</h3>
                </div>
                <div class="card-body">
                    Este layout está pronto para receber as telas de categorias, produtos e outros módulos.
                </div>
            </div>
        </div>
    </section>
</div>
@endsection