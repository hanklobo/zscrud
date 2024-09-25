<!-- components/form-sections/features.blade.php -->
<div id="features-container">
    @foreach ($data['items'] as $index => $feature)
        <div class="dynamic-item mb-3 p-3 border rounded">
            <div class="form-group">
                <label>Ícone</label>
                <input type="text" class="form-control" name="blocks[features][items][{{ $index }}][icon]" value="{{ $feature['icon'] }}">
            </div>
            <div class="form-group">
                <label>Título</label>
                <input type="text" class="form-control" name="blocks[features][items][{{ $index }}][title]" value="{{ $feature['title'] }}">
            </div>
            <div class="form-group">
                <label>Subtítulo</label>
                <input type="text" class="form-control" name="blocks[features][items][{{ $index }}][subtitle]" value="{{ $feature['subtitle'] }}">
            </div>
            <button type="button" class="btn btn-danger mt-2" onclick="removeItem(this)">Remover Feature</button>
        </div>
    @endforeach
</div>
<button type="button" class="btn btn-secondary" onclick="addItem('#features-container', '#feature-template')">Adicionar Feature</button>

<template id="feature-template">
    <div class="dynamic-item mb-3 p-3 border rounded">
        <div class="form-group">
            <label>Ícone</label>
            <input type="text" class="form-control" name="blocks[features][items][][icon]">
        </div>
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="blocks[features][items][][title]">
        </div>
        <div class="form-group">
            <label>Subtítulo</label>
            <input type="text" class="form-control" name="blocks[features][items][][subtitle]">
        </div>
        <button type="button" class="btn btn-danger mt-2" onclick="removeItem(this)">Remover Feature</button>
    </div>
</template>
