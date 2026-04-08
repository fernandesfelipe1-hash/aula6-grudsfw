@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="m-0 text-dark font-weight-bold">Editar Produto</h1>
                    <small class="text-muted">Atualize os dados do produto selecionado.</small>
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary shadow-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-warning shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title font-weight-bold mb-0">
                        <i class="fas fa-edit text-warning mr-1"></i>
                        Edição de Produto
                    </h3>
                </div>

                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        @include('produtos._form', ['produto' => $produto, 'categorias' => $categorias])
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between">
                        <a href="{{ route('produtos.index') }}" class="btn btn-light border">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning shadow-sm">
                            <i class="fas fa-save mr-1"></i> Atualizar Produto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection