<section id="testimonials" class="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">{{__($title)}}</h2>
        <div class="row">
            @foreach($items ?? [] as $testimonial)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="testimonial-item">
                        <p>"{{__($testimonial['text'])}}"</p>
                        <strong>- {{__($testimonial['name'])}}, {{__($testimonial['position'])}}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
