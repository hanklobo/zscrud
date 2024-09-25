<section id="features" class="features">
    <div class="container">
        <div class="row">
            @foreach($items ?? [] as $feature)
                <div class="col-md-4 text-center">
                    <i class="{{$feature['icon'] ?? 'fas fa-cogs'}} fa-3x mb-3 text-primary"></i>
                    <h3>{{$feature['title'] ?? 'Feature'}}</h3>
                    <p>{{$feature['subtitle'] ?? 'This feature is awesome!'}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
