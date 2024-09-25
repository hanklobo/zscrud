<!-- components/form-sections/hero.blade.php -->
<div class="form-group">
    <label for="hero_title">Título</label>
    <input type="text" class="form-control" id="hero_title" name="blocks[hero][title]" value="{{ $data['title'] }}">
</div>

<div class="form-group">
    <label for="hero_subtitle">Subtítulo</label>
    <input type="text" class="form-control" id="hero_subtitle" name="blocks[hero][subtitle]" value="{{ $data['subtitle'] }}">
</div>

<div class="form-group">
    <label for="hero_cta">Texto do CTA</label>
    <input type="text" class="form-control" id="hero_cta" name="blocks[hero][cta]" value="{{ $data['cta'] }}">
</div>

<div class="form-group">
    <label for="hero_link">Link do CTA</label>
    <input type="text" class="form-control" id="hero_link" name="blocks[hero][link]" value="{{ $data['link'] }}">
</div>
