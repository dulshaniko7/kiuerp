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
@yield('content')

{{-- Laravel Mix - JS File --}}
{{--
<script src="{{ mix('js/slo.js') }}"></script>
--}}
<script src="{{ mix('js/slo.js') }} " defer></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script>
    console.log('hi');
</script>
</body>
</html>
