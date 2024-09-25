<!-- landing-page-form-editor.blade.php -->
@props(['blocks', 'cssUrls'])

<div class="row">
    <div class="col-md-6">
        <form id="landing-page-form" method="POST" action="{{ route('landing-page.update') }}" class="landing-page-form">
            @csrf
            @method('PUT')

            @foreach ($blocks as $blockName => $blockData)
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{{ ucfirst($blockName) }}</h3>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="{{ $blockName }}-enabled" name="blocks[{{ $blockName }}][enabled]" value="1" @if($config['blocks'][$blockName]['enabled'] ?? false) checked @endif>
                            <label class="form-check-label" for="{{ $blockName }}-enabled">Habilitar</label>
                        </div>
                    </div>
                    <div class="card-body" id="{{ $blockName }}-content">
                        @include('zscrud::landing.editor.form-sections.' . $blockName, ['data' => $blockData])
                    </div>
                </div>
            @endforeach

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>

    <div class="col-md-6">
        <x-zscrud::landing-page-preview :blocks="$blocks" :cssUrls="$cssUrls" />
    </div>
</div>

@push('scripts')
    <script>
        // Script para adicionar/remover itens dinâmicos (features, testimonials, etc.)
        function addItem(containerSelector, template) {
            const container = document.querySelector(containerSelector);
            const newItem = template.content.cloneNode(true);
            container.appendChild(newItem);
            updatePreview();
        }

        function removeItem(button) {
            button.closest('.dynamic-item').remove();
            updatePreview();
        }

        // Função para atualizar a visualização em tempo real
        function updatePreview() {
            const form = document.getElementById('landing-page-form');
            const formData = new FormData(form);

            fetch('{{ route("landing-page.preview") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.text())
            .then(html => {
                document.getElementById('landing-page-preview').innerHTML = html;
                // Recarregar os CSSs após atualizar o conteúdo
                var cssUrls = @json($cssUrls);
                document.getElementById('landing-page-css-container').innerHTML = '';
                cssUrls.forEach(function(url) {
                    var cssLink = document.createElement('link');
                    cssLink.rel = 'stylesheet';
                    cssLink.href = url;
                    document.getElementById('landing-page-css-container').appendChild(cssLink);
                });
            });
        }

        // Adicionar evento de input para todos os campos do formulário
        document.querySelectorAll('#landing-page-form input, #landing-page-form textarea').forEach(input => {
            input.addEventListener('input', updatePreview);
        });

        // Atualizar preview inicialmente
        updatePreview();
    </script>
@endpush
