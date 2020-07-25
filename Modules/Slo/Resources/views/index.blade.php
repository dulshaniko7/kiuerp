@extends('slo::layouts.master')

@section('content')

<div id="app">
    <main-app></main-app>
</div>
<script>
    import MainApp from "~MainApp";

    export default {
        components: {MainApp}
    }
</script>
@endsection

