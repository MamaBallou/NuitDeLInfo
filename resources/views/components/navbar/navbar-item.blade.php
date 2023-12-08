<li class="nav-item">
    <a class="nav-link {{ Request::is($chemin) ? 'active' : '' }}" aria-current="page" href="{{ route($chemin . '.index') }}">{{ $titre }}</a>
</li>