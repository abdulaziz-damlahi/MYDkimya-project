<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 Page</title>

    <!-- Theme Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

</head>
<body>

<div id="preloader">
    <div class="preloader-wrapper">
        <div class="preloader-default">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!-- Error Section Start -->
<div class="error-area vh d-flex" data-background="{{ asset('uploads/common_dummy/404.jpg') }}" data-overlay-light="94">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="error-inner text-center">
                    <h1 class="error-title">4<span class="text-primary-color">0</span>4</h1>
                    <h2 class="error-text">Sorry, something went wrong!</h2>
                    <p>This page is temporarily unavailable due to maintenance. We will back very soon thanks for your patient</p>
                    <a class="cs-btn-one btn-md btn-primary-color" href="{{ url('/') }}">Return Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Error Section End -->


<!-- Scripts -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-core-plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>
