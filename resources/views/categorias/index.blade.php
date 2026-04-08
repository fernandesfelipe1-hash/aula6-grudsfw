@extends('layouts.app')

@section('title', 'Categorias de Produtos')

@section('content')
<div class="content-wrapper">
    <!-- Cabeçalho -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="m-0 text-dark font-weight-bold">Categorias de Produtos</h1>
                    <small class="text-muted">Gerencie as categorias utilizadas no cadastro dos produtos.</small>
                </div>
                <div class="mt-2 mt-md-0">
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus-circle mr-1"></i> Nova Categoria
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo -->
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
                                <i class="fas fa-tags mr-1 text-primary"></i>
                                Lista de Categorias
                            </h3>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <form method="GET" action="{{ route('categorias.index') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Buscar por nome..."
                                           value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <a href="{{ route('categorias.index') }}" class="btn btn-outline-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if($categorias->count())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 80px;">#</th>
                                        <th>Nome</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Criada em</th>
                                        <th class="text-center" style="width: 220px;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categorias as $categoria)
                                        <tr>
                                            <td class="font-weight-bold text-muted">{{ $categoria->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center text-white mr-3"
                                                         style="width: 40px; height: 40px;">
                                                        <i class="fas fa-tag"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-weight-bold text-dark">{{ $categoria->nome }}</div>
                                                        @if(!empty($categoria->descricao))
                                                            <small class="text-muted">
                                                                {{ \Illuminate\Support\Str::limit($categoria->descricao, 60) }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-light border px-3 py-2">
                                                    {{ $categoria->slug ?? '-' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($categoria->ativo)
                                                    <span class="badge badge-success px-3 py-2">Ativa</span>
                                                @else
                                                    <span class="badge badge-secondary px-3 py-2">Inativa</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-muted">
                                                    {{ $categoria->created_at ? $categoria->created_at->format('d/m/Y H:i') : '-' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('categorias.show', $categoria->id) }}"
                                                   class="btn btn-sm btn-outline-info mr-1"
                                                   title="Visualizar">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('categorias.edit', $categoria->id) }}"
                                                   class="btn btn-sm btn-outline-warning mr-1"
                                                   title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
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
                                <i class="fas fa-folder-open text-muted" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="font-weight-bold text-dark">Nenhuma categoria encontrada</h5>
                            <p class="text-muted mb-4">
                                Ainda não há categorias cadastradas ou nenhuma corresponde à busca realizada.
                            </p>
                            <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle mr-1"></i> Cadastrar primeira categoria
                            </a>
                        </div>
                    @endif
                </div>

                <!-- @if(method_exists($categorias, 'links'))
                    <div class="card-footer bg-white border-top">
                        {{ $categorias->links() }}
                    </div>
                @endif -->
            </div>
        </div>
    </section>
</div>
@endsection