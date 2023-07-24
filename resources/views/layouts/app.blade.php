<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{ $styles }}
    <style>
        .alert {
            position: absolute;
            top: 70px;
            right: 30px;
            z-index: 999;
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>

    @include('layouts.alert')

    {{ $slot }}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        function autoCloseAlert() {
            var autoCloseTime = 3000;

            setTimeout(function() {
                var myAlert = document.getElementById("alert");
                if (myAlert) {
                    myAlert.classList.remove("show");
                    myAlert.addEventListener("transitionend", function() {
                        myAlert.remove();
                    });
                }
            }, autoCloseTime);
        }

        autoCloseAlert();
    </script>
</body>

</html>
