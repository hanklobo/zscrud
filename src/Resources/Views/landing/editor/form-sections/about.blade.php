<!-- components/form-sections/about.blade.php -->
<div class="form-group">
    <label for="about_title">Título</label>
    <input type="text" class="form-control" id="about_title" name="blocks[about][title]" value="{{ $data['title'] }}">
</div>

<div class="form-group">
    <label>Linhas de Texto</label>
    @foreach ($data['lines'] as $index => $line)
        <div class="input-group mb-2">
            <textarea class="form-control" name="blocks[about][lines][]" rows="2">{{ $line }}</textarea>
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remover</button>
        </div>
    @endforeach
    <button type="button" class="btn btn-secondary" onclick="addItem('#about-lines', '#about-line-template')">Adicionar Linha</button>
</div>

<div class="form-group">
    <label for="about_image">URL da Imagem</label>
    <input type="text" class="form-control" id="about_image" name="blocks[about][image]" value="{{ $data['image'] }}">
</div>

<template id="about-line-template">
    <div class="input-group mb-2 dynamic-item">
        <textarea class="form-control" name="blocks[about][lines][]" rows="2"></textarea>
        <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remover</button>
    </div>
</template>
