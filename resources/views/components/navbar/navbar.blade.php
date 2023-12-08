<nav class="navbar navbar-dark navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logo_solair.png') }}" alt="Logo" width="90" height="90"
                class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach (App\Enums\Pages::names() as $name => $value)
                    @include('components.navbar.navbar-item', [
                        'chemin' => $name,
                        'titre' => $value,
                    ])
                @endforeach
                {{-- @include('components.navbar.navbar-dropdown-item', [
                    'titre' => 'Evénements',
                    'model' => 'evenement',
                    'sub_item' => [
                        [
                            'chemin' => 'index',
                            'titre' => 'Mes événements',
                        ],
                        [
                            'chemin' => 'creer',
                            'titre' => 'Créer un événement',
                        ],
                    ],
                ]) --}}
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        box-shadow: 0 0 1em 0.75em rgba(0, 0, 0, 0.5);

        background-color: #49704f;

        user-select: none;
    }

    .drodown-menu {
        background-color: #343a40;
    }

    .dropdown-item {
        transition: 0.2s ease-in-out;
    }

    .dropdown-item:active {
        background-color: #343a40;
    }
</style>

<script>
    function ajouterListenersNavbar() {
        $('.dropdown').hover(function() {
            $(this).addClass('show');
            $(this).find('.dropdown-menu').addClass('show');
        }, function() {
            $(this).removeClass('show');
            $(this).find('.dropdown-menu').removeClass('show');
        });

        $('.dropdown-toggle').click(function() {
            $(this).parent().addClass('show');
        });
    }

    function retirerListenersNavbar() {
        $('.dropdown').off('mouseenter mouseleave');
        $('.dropdown-toggle').off('click');
    }

    function initNavbar() {
        var est_telephone_portable = $('.navbar-toggler').is(':visible');

        if (est_telephone_portable) {
            $('.dropdown-toggle').attr('data-bs-toggle', 'dropdown');
            retirerListenersNavbar();
        } else {
            $('.dropdown-toggle').removeAttr('data-bs-toggle', 'dropdown');
            ajouterListenersNavbar();
        }
    }

    $(document).ready(function() {
        initNavbar();

        $(window).resize(function() {
            initNavbar();
        });
    });
</script>
