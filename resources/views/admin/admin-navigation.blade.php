<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1e3144;">
    <a class="navbar-brand"
       href="/admin">
        {{ App\Option::where('value', 'site_name')->value('description') }} | Admin
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">

            @foreach(App\AdminNavigation::where('display', 1)->orderBy('display_order', 'asc')->get() as $link)

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ $link->url }}">
                        {{ $link->name }}
                    </a>
                </li>

            @endforeach

        </ul>

        <a class="nav-item btn btn-info"
           target="_blank"
           href="/">
            Go To Website
        </a>

        <a class="nav-item btn btn-danger ml-3"
           href="/logout">
            Logout
        </a>

    </div>
</nav>