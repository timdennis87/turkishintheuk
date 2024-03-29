<style>
.box {
    border: 3px solid #4e555b;
    padding: 10px 50px;
}
</style>

<div class="d-none d-lg-block">

    <div class="row mb-3">

        <div class="mx-auto box">
            <a class="navbar-brand text-dark"
               href="/">
                <h1>{{ App\Option::where('value', 'site_name')->value('description') }}</h1>
            </a>
        </div>

    </div>

</div>

<nav class="navbar navbar-expand-lg navbar-light">

    <div class="d-lg-none">

        <a class="navbar-brand mr-0"
           href="/">
            {{ App\Option::where('value', 'site_name')->value('description') }}
        </a>

    </div>

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">

            @foreach(App\Page::where('display', 1)->orderBy('display_order', 'asc')->get() as $link)

                <li class="nav-item">
                    <a class="nav-link"
                       href="{{ $link->url }}">
                        {{ $link->name }}
                    </a>
                </li>

            @endforeach

        </ul>

    </div>
</nav>