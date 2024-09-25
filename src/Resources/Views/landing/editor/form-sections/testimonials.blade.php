<!-- components/form-sections/testimonials.blade.php -->
<div class="form-group">
    <label for="testimonials_title">Título</label>
    <input type="text" class="form-control" id="testimonials_title" name="blocks[testimonials][title]" value="{{ $data['title'] }}">
</div>

<div id="testimonials-container">
    @foreach ($data['items'] as $index => $testimonial)
        <div class="dynamic-item mb-3 p-3 border rounded">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="blocks[testimonials][items][{{ $index }}][name]" value="{{ $testimonial['name'] }}">
            </div>
            <div class="form-group">
                <label>Depoimento</label>
                <textarea class="form-control" name="blocks[testimonials][items][{{ $index }}][text]" rows="3">{{ $testimonial['text'] }}</textarea>
            </div>
            <div class="form-group">
                <label>Cargo</label>
                <input type="text" class="form-control" name="blocks[testimonials][items][{{ $index }}][position]" value="{{ $testimonial['position'] }}">
            </div>
            <div class="form-group">
                <label>URL do Avatar</label>
                <input type="text" class="form-control" name="blocks[testimonials][items][{{ $index }}][avatar]" value="{{ $testimonial['avatar'] }}">
            </div>
            <button type="button" class="btn btn-danger mt-2" onclick="removeItem(this)">Remover Depoimento</button>
        </div>
    @endforeach
</div>
<button type="button" class="btn btn-secondary" onclick="addItem('#testimonials-container', '#testimonial-template')">Adicionar Depoimento</button>

<template id="testimonial-template">
    <div class="dynamic-item mb-3 p-3 border rounded">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="blocks[testimonials][items][][name]">
        </div>
        <div class="form-group">
            <label>Depoimento</label>
            <textarea class="form-control" name="blocks[testimonials][items][][text]" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Cargo</label>
            <input type="text" class="form-control" name="blocks[testimonials][items][][position]">
        </div>
        <div class="form-group">
            <label>URL do Avatar</label>
            <input type="text" class="form-control" name="blocks[testimonials][items][][avatar]">
        </div>
        <button type="button" class="btn btn-danger mt-2" onclick="removeItem(this)">Remover Depoimento</button>
    </div>
</template>
