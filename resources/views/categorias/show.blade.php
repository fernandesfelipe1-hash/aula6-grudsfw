@extends('layouts.app')

@section('title', 'Visualizar Categoria')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="m-0 text-dark font-weight-bold">Detalhes da Categoria</h1>
                    <small class="text-muted">Visualização completa das informações cadastradas.</small>
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary shadow-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Voltar
                    </a>
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning shadow-sm">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-outline card-info shadow-sm border-0">
                        <div class="card-header bg-white border-bottom">
                            <h3 class="card-title font-weight-bold mb-0">
                                <i class="fas fa-tag text-info mr-1"></i>
                                Informações da Categoria
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">ID</label>
                                    <div class="form-control bg-light">{{ $categoria->id }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Status</label>
                                    <div class="form-control bg-light">
                                        @if($categoria->ativo)
                                            <span class="badge badge-success px-3 py-2">Ativa</span>
                                        @else
                                            <span class="badge badge-secondary px-3 py-2">Inativa</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Nome</label>
                                    <div class="form-control bg-light">{{ $categoria->nome }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Slug</label>
                                    <div class="form-control bg-light">{{ $categoria->slug ?? '-' }}</div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Descrição</label>
                                    <div class="form-control bg-light" style="height: auto; min-height: 120px;">
                                        {{ $categoria->descricao ?? 'Sem descrição cadastrada.' }}
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Criada em</label>
                                    <div class="form-control bg-light">
                                        {{ $categoria->created_at ? $categoria->created_at->format('d/m/Y H:i') : '-' }}
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Atualizada em</label>
                                    <div class="form-control bg-light">
                                        {{ $categoria->updated_at ? $categoria->updated_at->format('d/m/Y H:i') : '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-between">
                            <a href="{{ route('categorias.index') }}" class="btn btn-light border">
                                Voltar para a listagem
                            </a>

                            <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt mr-1"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <div class="mx-auto mb-3 bg-info d-flex align-items-center justify-content-center rounded-circle text-white"
                                 style="width: 90px; height: 90px; font-size: 2rem;">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h4 class="font-weight-bold mb-1">{{ $categoria->nome }}</h4>
                            <p class="text-muted mb-3">Categoria de produtos</p>

                            @if($categoria->ativo)
                                <span class="badge badge-success px-3 py-2">Categoria Ativa</span>
                            @else
                                <span class="badge badge-secondary px-3 py-2">Categoria Inativa</span>
                            @endif

                            <hr>

                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-block mb-2">
                                <i class="fas fa-edit mr-1"></i> Editar Categoria
                            </a>
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-list mr-1"></i> Ver Todas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection