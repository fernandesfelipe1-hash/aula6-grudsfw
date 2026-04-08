@extends('layouts.app')

@section('title', 'Visualizar Produto')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="m-0 text-dark font-weight-bold">Detalhes do Produto</h1>
                    <small class="text-muted">Visualização completa das informações do produto.</small>
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary shadow-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Voltar
                    </a>
                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning shadow-sm">
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
                                <i class="fas fa-box text-info mr-1"></i>
                                Informações do Produto
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">ID</label>
                                    <div class="form-control bg-light">{{ $produto->id }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Status</label>
                                    <div class="form-control bg-light">
                                        @if($produto->ativo)
                                            <span class="badge badge-success px-3 py-2">Ativo</span>
                                        @else
                                            <span class="badge badge-secondary px-3 py-2">Inativo</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Nome</label>
                                    <div class="form-control bg-light">{{ $produto->nome }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Categoria</label>
                                    <div class="form-control bg-light">{{ $produto->categoria->nome ?? '-' }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">SKU</label>
                                    <div class="form-control bg-light">{{ $produto->sku ?? '-' }}</div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Preço</label>
                                    <div class="form-control bg-light">
                                        R$ {{ number_format($produto->preco ?? 0, 2, ',', '.') }}
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Estoque</label>
                                    <div class="form-control bg-light">{{ $produto->estoque ?? 0 }}</div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Descrição</label>
                                    <div class="form-control bg-light" style="height: auto; min-height: 120px;">
                                        {{ $produto->descricao ?? 'Sem descrição cadastrada.' }}
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Criado em</label>
                                    <div class="form-control bg-light">
                                        {{ $produto->created_at ? $produto->created_at->format('d/m/Y H:i') : '-' }}
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="text-muted small text-uppercase font-weight-bold">Atualizado em</label>
                                    <div class="form-control bg-light">
                                        {{ $produto->updated_at ? $produto->updated_at->format('d/m/Y H:i') : '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-between">
                            <a href="{{ route('produtos.index') }}" class="btn btn-light border">
                                Voltar para a listagem
                            </a>

                            <form action="{{ route('produtos.destroy', $produto->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
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
                                <i class="fas fa-box"></i>
                            </div>
                            <h4 class="font-weight-bold mb-1">{{ $produto->nome }}</h4>
                            <p class="text-muted mb-2">{{ $produto->categoria->nome ?? 'Sem categoria' }}</p>

                            @if($produto->ativo)
                                <span class="badge badge-success px-3 py-2">Produto Ativo</span>
                            @else
                                <span class="badge badge-secondary px-3 py-2">Produto Inativo</span>
                            @endif

                            <hr>

                            <div class="text-left">
                                <p class="mb-2">
                                    <strong>Preço:</strong>
                                    <span class="text-success font-weight-bold">
                                        R$ {{ number_format($produto->preco ?? 0, 2, ',', '.') }}
                                    </span>
                                </p>
                                <p class="mb-3">
                                    <strong>Estoque:</strong>
                                    {{ $produto->estoque ?? 0 }} unidade(s)
                                </p>
                            </div>

                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-block mb-2">
                                <i class="fas fa-edit mr-1"></i> Editar Produto
                            </a>
                            <a href="{{ route('produtos.index') }}" class="btn btn-outline-secondary btn-block">
                                <i class="fas fa-list mr-1"></i> Ver Todos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection