<section class="hero">
    <div class="container text-center">
        <h1 class="display-4">{{__($title)}}</h1>
        <p class="lead">{{__($subtitle ?? '')}}</p>
        <a href="{{$link ?? '#'}}" class="btn btn-primary btn-lg">{{__($cta ?? 'OK')}}</a>
    </div>
</section>
