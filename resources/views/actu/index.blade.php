@extends('layout')

@section('styles')
    @include('commun.css.actualites.style-index')
@endsection

@section('content')
    <div class="title-wrapper w-100 d-flex flex-column align-items-center">
        <h1 class="text-center text-light">Actualités</h1>
        <a href="https://bonpote.com/" target="_blank" class="btn btn-success w-25">Source : https://bonpote.com/</a>
    </div>
    <div class="row d-flex flew-wrap flex-row justify-content-around">
        @foreach ($actualites as $actualite)
            @include('components.actu-card', [
                'titre' => $actualite->title,
                'description' => $actualite->description,
                'lien' => $actualite->link,
                'index' => $loop->index,
            ])
        @endforeach
    </div>
@endsection

@section('scripts')
    @include('commun.js.animations')
    <script>
        function initActuPage() {
            let margins = [2, 10, 5, 15, 0, 20, 7, 12, 17, 3, 8, 13, 18, 4, 9, 14, 19, 1, 6, 11, 16];
            let card_par_ligne = Math.floor(($(window).width() - 15) / $('.actu-card').outerWidth());
            let reste = $('.actu-card').length % card_par_ligne;

            $('.actu-card').each(function() {
                if ($(this).data('index') + 1 <= $('.actu-card').length - reste) {
                    $(this).css('margin-top', margins[$(this).data('index') % card_par_ligne] + 'em');
                } else {
                    $(this).css('margin-top', '2em');
                }
            });
        }

        function ajouterListenersActuPage() {
            $(window).resize(function() {
                initActuPage();
            });
        }

        $(document).ready(function() {
            let card_animation = new CardAnimation($('.actu-card'));
            card_animation.init();

            initActuPage();
            ajouterListenersActuPage();
        });
    </script>
@endsection
