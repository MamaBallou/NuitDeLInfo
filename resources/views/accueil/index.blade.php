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

    .container {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
    }

    .blur-background {
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
        display : block;
        margin: 3%;
        padding: 2%;
        border-radius: 10px;
    }

    .escapegame_btn{
        background-color: #49704f;
        backdrop-filter: blur(5px);
        justify-content: center;
        align-items: center;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="blur-background">
        <h1 class="text-center">Bienvenue sur le site de Sol'Air</h1>
        <p class="text-center">Faisons de notre planète un endroit plus propre et plus sain.</p>
    </div>
        <a href="{{ route('escape_game.index') }}" class="btn escapegame_btn">Jouer à l'escape game</a>
</div>
@endsection