@extends('layout')

@section('styles')
<style>
    #accueil-background-image {
        width: 100%;

        position: absolute;
        top: 0;
        left: 0;

        opacity: 0.5;

        z-index: -1;
    }

    .actu-card {
        width: 5em;

        padding: 0;

        border: none;
    }
</style>
@endsection

@section('content')
{{-- <img src="{{ asset('img/background-2.png') }}" alt="logo" id="accueil-background-image"> --}}

@include('components.carousel', [
    'table_ids' => $table_ids,
])

<div class="row d-flex flex-wrap">
</div>

@endsection