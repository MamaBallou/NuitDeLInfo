<li class="nav-item dropdown">
    <div class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" aria-expanded="false">
        {{ $titre }}
    </div>
    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
        @foreach ($sub_item as $sub_item)
            <li><a class="dropdown-item"
                    href="{{ route($model . '.' . $sub_item['chemin']) }}">{{ $sub_item['titre'] }}</a></li>
        @endforeach
    </ul>
</li>
