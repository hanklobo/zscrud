<!-- components/form-sections/cta.blade.php -->
<div class="form-group">
    <label for="cta_title">Título</label>
    <input type="text" class="form-control" id="cta_title" name="blocks[cta][title]" value="{{ $data['title'] }}">
</div>

<div class="form-group">
    <label for="cta_text">Texto do CTA</label>
    <input type="text" class="form-control" id="cta_text" name="blocks[cta][cta]" value="{{ $data['cta'] }}">
</div>

<div class="form-group">
    <label for="cta_link">Link do CTA</label>
    <input type="text" class="form-control" id="cta_link" name="blocks[cta][link]" value="{{ $data['link'] }}">
</div>
