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
</style>
@endsection

@section('content')
{{-- <img src="{{ asset('img/background-2.png') }}" alt="logo" id="accueil-background-image"> --}}
@endsection