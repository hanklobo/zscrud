@php
$landing = $landing ?? [];
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__($landing['title'] ?? '')}}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('landing-page.css')}}"/>
</head>
<body>

@foreach($landing['blocks'] ?? [] as $block => $config)
    @include('zscrud::landing.blocks.' . $block, $config)
@endforeach

<footer class="bg-light py-4">
    <div class="container text-center">
        <p>&copy; 2024 {{__($landing['title'] ?? '')}}</p>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
