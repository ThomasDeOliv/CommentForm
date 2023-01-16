<header>
    <nav>
        <ul>
            <li>
                <a href="{{ route('home.index') }}"><img src="{{ asset('/assets/img/logo.png') }}"
                        alt="logo" /><span>CommentForm</span></a>
            </li>
            <li>
                <ul>
                    <li><a href="{{ route('home.index') }}">Accueil</a></li>
                    <li><a href="{{ route('comments.getComments') }}">Nos avis</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
