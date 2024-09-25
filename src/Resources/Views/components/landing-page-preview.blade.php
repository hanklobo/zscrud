<!-- landing-page-preview.blade.php -->
@props(['blocks', 'cssUrls'])

<x-zscrud::landing-page-css-loader :cssUrls="$cssUrls" />

<h2 class="text-center mb-3">Visualização</h2>

<div id="landing-page-preview" class="border p-0 mb-4">
    @foreach($blocks as $block => $config)
        @include('zscrud::landing.blocks.' . $block, $config)
    @endforeach
{{--    --}}
{{--    <header class="bg-light p-3 mb-4">--}}
{{--        <h1>{{ $blocks['header']['title'] }}</h1>--}}
{{--        <nav>--}}
{{--            @foreach ($blocks['header']['links'] as $text => $url)--}}
{{--                <a href="{{ $url }}" class="mr-3">{{ $text }}</a>--}}
{{--            @endforeach--}}
{{--        </nav>--}}
{{--    </header>--}}

{{--    <!-- Hero -->--}}
{{--    <section class="hero bg-primary text-white p-5 mb-4">--}}
{{--        <h2>{{ $blocks['hero']['title'] }}</h2>--}}
{{--        <p>{{ $blocks['hero']['subtitle'] }}</p>--}}
{{--        <a href="{{ $blocks['hero']['link'] }}" class="btn btn-light">{{ $blocks['hero']['cta'] }}</a>--}}
{{--    </section>--}}

{{--    <!-- Features -->--}}
{{--    <section class="features mb-4">--}}
{{--        <div class="row">--}}
{{--            @foreach ($blocks['features']['items'] as $feature)--}}
{{--                <div class="col-md-4 text-center">--}}
{{--                    <i class="{{ $feature['icon'] }} fa-3x mb-3"></i>--}}
{{--                    <h3>{{ $feature['title'] }}</h3>--}}
{{--                    <p>{{ $feature['subtitle'] }}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- About -->--}}
{{--    <section class="about mb-4">--}}
{{--        <h2>{{ $blocks['about']['title'] }}</h2>--}}
{{--        @foreach ($blocks['about']['lines'] as $line)--}}
{{--            <p>{{ $line }}</p>--}}
{{--        @endforeach--}}
{{--        <img src="{{ $blocks['about']['image'] }}" alt="About Us" class="img-fluid">--}}
{{--    </section>--}}

{{--    <!-- Testimonials -->--}}
{{--    <section class="testimonials mb-4">--}}
{{--        <h2>{{ $blocks['testimonials']['title'] }}</h2>--}}
{{--        <div class="row">--}}
{{--            @foreach ($blocks['testimonials']['items'] as $testimonial)--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <p>"{{ $testimonial['text'] }}"</p>--}}
{{--                            <footer>--}}
{{--                                <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="rounded-circle" width="50">--}}
{{--                                <strong>{{ $testimonial['name'] }}</strong>, {{ $testimonial['position'] }}--}}
{{--                            </footer>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- CTA -->--}}
{{--    <section class="cta bg-secondary text-white p-5">--}}
{{--        <h2>{{ $blocks['cta']['title'] }}</h2>--}}
{{--        <a href="{{ $blocks['cta']['link'] }}" class="btn btn-light">{{ $blocks['cta']['cta'] }}</a>--}}
{{--    </section>--}}
</div>
