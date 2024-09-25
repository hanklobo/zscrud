
<section id="about-us" class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-xs-12">
                <h2>{{__($title)}}</h2>
                @foreach($lines as $line)
                    <p>{{__($line)}}</p>
                @endforeach
            </div>
            <div class="col-md-6 col-xs-12">
                <img src="{{$image}}" alt="{{__($title)}}" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>
