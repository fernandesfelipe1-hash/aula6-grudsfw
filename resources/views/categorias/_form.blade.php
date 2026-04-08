<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="nome" class="font-weight-semibold">Nome da Categoria <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-tag text-primary"></i>
                    </span>
                </div>
                <input type="text"
                       name="nome"
                       id="nome"
                       class="form-control @error('nome') is-invalid @enderror"
                       value="{{ old('nome', $categoria->nome ?? '') }}"
                       placeholder="Ex.: Informática">
            </div>
            @error('nome')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="slug" class="font-weight-semibold">Slug</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light">
                        <i class="fas fa-link text-secondary"></i>
                    </span>
                </div>
                <input type="text"
                       name="slug"
                       id="slug"
                       class="form-control @error('slug') is-invalid @enderror"
                       value="{{ old('slug', $categoria->slug ?? '') }}"
                       placeholder="informatica">
            </div>
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            <small class="text-muted">Opcional. Pode ser gerado automaticamente no backend.</small>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="descricao" class="font-weight-semibold">Descrição</label>
            <textarea name="descricao"
                      id="descricao"
                      rows="5"
                      class="form-control @error('descricao') is-invalid @enderror"
                      placeholder="Descreva brevemente a finalidade desta categoria...">{{ old('descricao', $categoria->descricao ?? '') }}</textarea>
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
                       {{ old('ativo', $categoria->ativo ?? 1) ? 'checked' : '' }}>
                <label class="custom-control-label" for="ativo">Categoria ativa</label>
            </div>
            <small class="text-muted">Categorias inativas podem ser ocultadas em outras áreas do sistema.</small>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nomeInput = document.getElementById('nome');
        const slugInput = document.getElementById('slug');

        function gerarSlug(texto) {
            return texto
                .toString()
                .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        }

        if (nomeInput && slugInput) {
            nomeInput.addEventListener('keyup', function () {
                if (!slugInput.dataset.edited) {
                    slugInput.value = gerarSlug(nomeInput.value);
                }
            });

            slugInput.addEventListener('input', function () {
                slugInput.dataset.edited = 'true';
            });
        }
    });
</script>
@endpush