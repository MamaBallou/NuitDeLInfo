@extends('layout')

@section('styles')
<style>
    #accueil-background-image {
        width: 30%;

        opacity: 0.3;

        position: absolute;
        top: 15%;
        left: 35%;

        z-index: -1;
    }
</style>
@endsection

@section('content')
<img src="{{ asset('img/logo_solair.png') }}" alt="logo" id="accueil-background-image">
@endsection