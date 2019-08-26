
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio | Laravel</title>
    <link rel="stylesheet" href="/css/foundation.css">
    <link rel="stylesheet" href="/css/main.css">

</head>
<body>

<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas>
    <div class="grid-y grid-padding-x" style="height: 100%;">
        <br>
        <div class="cell shrink">
            <img class="thumbnail" src="/images/portfolio.jpg">
        </div>
        <div class="cell auto">
            <h5>Md.Kamal Hossen</h5>
            <ul class="side-nav mynav">
                <li><a href="/">Home</a></li>
                <?php if (!Auth::check()) : ?>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <?php endif; ?>
                <?php if(Auth::check()) : ?>
                <li><a href="/gallery/create">Gallery</a></li>
                <li><a href="/logout">LogOut</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
    <div class="title-bar hide-for-large">
        <div class="title-bar-left">
            <button class="menu-icon" type="button" data-toggle="my-info"></button>
            <span class="title-bar-title">Md.Kamal Hossen</span>
        </div>
    </div>

    @if(Session::has('message'))
        <div data-alert class="alert-box">
        {{Session::get('message')}}
        </div>
        @endif
    @yield('content')

        </div>

        <!----contact section--->
        <hr>
<div class="footnote">
    <h3>my all task: <spna>https://github.com/ukamal</spna></h3>
</div>


<script src="/js/vendor/jquery.js"></script>
<script src="/js/vendor/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
