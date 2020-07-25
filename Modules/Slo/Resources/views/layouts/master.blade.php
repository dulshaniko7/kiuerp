<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Slo</title>

    {{-- Laravel Mix - CSS File --}}
    {{--
    <link rel="stylesheet" href="{{ mix('css/slo.css') }}">
    --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/slo.js') }}"></script>
@yield('content')

{{-- Laravel Mix - JS File --}}
{{--
<script src="{{ mix('js/slo.js') }}"></script>
--}}

<script>
    console.log('hi');
</script>
</body>
</html>
