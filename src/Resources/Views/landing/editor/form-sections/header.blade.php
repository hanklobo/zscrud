<div class="form-group">
    <label for="header_title">Título</label>
    <input type="text" class="form-control" id="header_title" name="blocks[header][title]" value="{{ $data['title'] }}">
</div>

<div class="form-group">
    <label>Links</label>
    @foreach ($data['links'] as $text => $url)
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="blocks[header][links][text][]" value="{{ $text }}" placeholder="Texto do link">
            <input type="text" class="form-control" name="blocks[header][links][url][]" value="{{ $url }}" placeholder="URL do link">
            <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remover</button>
        </div>
    @endforeach
    <button type="button" class="btn btn-secondary" onclick="addItem('#header-links', '#header-link-template')">Adicionar Link</button>
</div>

<template id="header-link-template">
    <div class="input-group mb-2 dynamic-item">
        <input type="text" class="form-control" name="blocks[header][links][text][]" placeholder="Texto do link">
        <input type="text" class="form-control" name="blocks[header][links][url][]" placeholder="URL do link">
        <button type="button" class="btn btn-danger" onclick="removeItem(this)">Remover</button>
    </div>
</template>
