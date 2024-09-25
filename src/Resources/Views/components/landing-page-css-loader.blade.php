<!-- landing-page-css-loader.blade.php -->
@props(['cssUrls'])

<div id="landing-page-css-container"></div>

<script>
    (function() {
        var cssUrls = @json($cssUrls);
        cssUrls.forEach(function(url) {
            var cssLink = document.createElement('link');
            cssLink.rel = 'stylesheet';
            cssLink.href = url;
            document.getElementById('landing-page-css-container').appendChild(cssLink);
        });
    })();
</script>
