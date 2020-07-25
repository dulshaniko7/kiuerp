@extends('layouts.master')

@section('content')

<div id="app">
    <main-app></main-app>
</div>
@endsection
<script>
    import MainApp from "../assets/js/MainApp";
    export default {
        components: {MainApp}
    }
</script>
