<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="nome" class="font-weight-semibold">Nome do Produto <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-box text-primary"></i>
                    </span>
                </div>
                <input type="text"
                       name="nome"
                       id="nome"
                       class="form-control @error('nome') is-invalid @enderror"
                       value="{{ old('nome', $produto->nome ?? '') }}"
                       placeholder="Ex.: Notebook Dell Inspiron">
            </div>
            @error('nome')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="categoria_id" class="font-weight-semibold">Categoria <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-tags text-info"></i>
                    </span>
                </div>
                <select name="categoria_id"
                        id="categoria_id"
                        class="form-control @error('categoria_id') is-invalid @enderror">
                    <option value="">Selecione uma categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ (string) old('categoria_id', $produto->categoria_id ?? '') === (string) $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('categoria_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="sku" class="font-weight-semibold">SKU</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-barcode text-secondary"></i>
                    </span>
                </div>
                <input type="text"
                       name="sku"
                       id="sku"
                       class="form-control @error('sku') is-invalid @enderror"
                       value="{{ old('sku', $produto->sku ?? '') }}"
                       placeholder="Ex.: PROD-001">
            </div>
            @error('sku')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="preco" class="font-weight-semibold">Preço <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">R$</span>
                </div>
                <input type="number"
                       step="0.01"
                       min="0"
                       name="preco"
                       id="preco"
                       class="form-control @error('preco') is-invalid @enderror"
                       value="{{ old('preco', $produto->preco ?? '') }}"
                       placeholder="0,00">
            </div>
            @error('preco')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="estoque" class="font-weight-semibold">Estoque <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-cubes text-warning"></i>
                    </span>
                </div>
                <input type="number"
                       min="0"
                       name="estoque"
                       id="estoque"
                       class="form-control @error('estoque') is-invalid @enderror"
                       value="{{ old('estoque', $produto->estoque ?? 0) }}"
                       placeholder="0">
            </div>
            @error('estoque')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="descricao" class="font-weight-semibold">Descrição</label>
            <textarea name="descricao"
                      id="descricao"
                      rows="5"
                      class="form-control @error('descricao') is-invalid @enderror"
                      placeholder="Descreva brevemente o produto...">{{ old('descricao', $produto->descricao ?? '') }}</textarea>
            @error('descricao')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="ativo" class="font-weight-semibold d-block">Status</label>
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                <input type="hidden" name="ativo" value="0">
                <input type="checkbox"
                       class="custom-control-input"
                       id="ativo"
                       name="ativo"
                       value="1"
                       {{ old('ativo', $produto->ativo ?? 1) ? 'checked' : '' }}>
                <label class="custom-control-label" for="ativo">Produto ativo</label>
            </div>
            <small class="text-muted">Produtos inativos podem ser ocultados da listagem pública.</small>
        </div>
    </div>
</div>