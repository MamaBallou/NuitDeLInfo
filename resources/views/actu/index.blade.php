@extends('layout')

@section('styles')
    <style>
        .actu-card {
            width: 30%;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            transition: transform 0.2s ease-in-out;
        }
        .actu-card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row d-flex flew-wrap flex-row justify-content-around">
        @foreach ($actualites as $actualite)
            @include('components.actu-card', [
                'titre' => $actualite->title,
                'description' => $actualite->description,
            ])
        @endforeach
    </div>
@endsection
