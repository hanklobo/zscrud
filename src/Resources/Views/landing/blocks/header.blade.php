<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">{{__($title)}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @foreach($links ?? [] as $label => $link)
                    <li class="nav-item">
                        <a class="nav-link" href="{{$link}}">{{__($label)}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
