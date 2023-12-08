@extends('layout')

@section('styles')
    <style>
        body {
            user-select: none;
        }
        .escape-bg-image {
            width: 100%;
            /* height: 100%; */

            position: fixed;
            top: -60%;

            opacity: 0;

            z-index: -1;
        }

        #escape-bg-1 {
            right: 50%;
        }

        #escape-bg-2 {
            left: 30%;
            z-index: -2;
        }

        .show-after {
            opacity: 0;
        }

        #escape-dialogue {
            width: 40%;
            position: absolute;
            bottom: 1.5em;
            left: 30%;
        }

        #dialog-span {
            font-size: 1.5em;
            font-weight: bold;
            color: black;
            text-shadow: 0 0 1em black;

            position: absolute;
        }

        #cliquer-span {
            font-size: 1em;
            font-weight: bold;
            color: black;
            text-shadow: 0 0 1em black;

            position: absolute;
        }

        .home-button {
            width: 3em;
            height: 3em;

            position: fixed;
            top: 1em;
            left: 1em;

            z-index: 1;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
@endsection

@section('content')
<a class="btn btn-outline-light home-button" href="/" data-bs-toggle="tooltip" data-bs-title="Retour à l'accueil" data-bs-placement="bottom">
    <i class="fa-solid fa-house"></i>
</a>

    <img src="{{ asset('img/escape_game/chambre.png') }}" alt="escape_game" class="escape-bg-image" id="escape-bg-1">
    <img src="{{ asset('img/escape_game/telescope.png') }}" alt="escape_game" class="escape-bg-image" id="escape-bg-2">
    <img src="{{ asset('img/escape_game/bulle-dialogue.png') }}" alt="escape_game" class="show-after dialog-element" id="escape-dialogue">
    
    <span id="dialog-span" class="show-after dialog-element"></span>
    <span id="cliquer-span" class="show-after dialog-element">Cliquer pour continuer</span>
@endsection

@section('scripts')
    @include('commun.js.animations')

    <script>
        let escape_game = new EscapeGame();
        escape_game.init();
    </script>
@endsection
