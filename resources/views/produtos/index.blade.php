@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="m-0 text-dark font-weight-bold">Produtos</h1>
                    <small class="text-muted">Gerencie os produtos cadastrados no sistema.</small>
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('produtos.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Novo Produto
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-outline card-primary shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="card-title font-weight-bold mb-0">
                                <i class="fas fa-boxes mr-1 text-primary"></i>
                                Lista de Produtos
                            </h3>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <form method="GET" action="{{ route('produtos.index') }}">
                                <div class="input-group">
                                    <input type="text"
                                           name="search"
                                           class="form-control"
                                           placeholder="Buscar por nome, SKU..."
                                           value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <a href="{{ route('produtos.index') }}" class="btn btn-outline-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if($produtos->count())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 70px;">#</th>
                                        <th>Produto</th>
                                        <th>Categoria</th>
                                        <th>Preço</th>
                                        <th>Estoque</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 220px;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto)
                                        <tr>
                                            <td class="font-weight-bold text-muted">{{ $produto->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center text-white mr-3"
                                                         style="width: 42px; height: 42px;">
                                                        <i class="fas fa-box"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-weight-bold text-dark">{{ $produto->nome }}</div>
                                                        <small class="text-muted">
                                                            SKU: {{ $produto->sku ?? '-' }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-light border px-3 py-2">
                                                    {{ $produto->categoria->nome ?? 'Sem categoria' }}
                                                </span>
                                            </td>
                                            <td class="font-weight-bold text-success">
                                                R$ {{ number_format($produto->preco ?? 0, 2, ',', '.') }}
                                            </td>
                                            <td>
                                                @if(($produto->estoque ?? 0) > 0)
                                                    <span class="badge badge-info px-3 py-2">
                                                        {{ $produto->estoque }} unidade(s)
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger px-3 py-2">
                                                        Sem estoque
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($produto->ativo)
                                                    <span class="badge badge-success px-3 py-2">Ativo</span>
                                                @else
                                                    <span class="badge badge-secondary px-3 py-2">Inativo</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('produtos.show', $produto->id) }}"
                                                   class="btn btn-sm btn-outline-info mr-1"
                                                   title="Visualizar">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('produtos.edit', $produto->id) }}"
                                                   class="btn btn-sm btn-outline-warning mr-1"
                                                   title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('produtos.destroy', $produto->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-outline-danger"
                                                            title="Excluir">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3">
                                <i class="fas fa-box-open text-muted" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark">Nenhum produto encontrado</h5>
                            <p class="text-muted mb-4">
                                Ainda não há produtos cadastrados ou nenhum corresponde à busca realizada.
                            </p>
                            <a href="{{ route('produtos.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle mr-1"></i> Cadastrar primeiro produto
                            </a>
                        </div>
                    @endif
                </div>

                @if(method_exists($produtos, 'links'))
                    <div class="card-footer bg-white border-top">
                        {{ $produtos->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection