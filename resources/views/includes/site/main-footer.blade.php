<div class="navbar navbar-expand-lg bg-dark">

    <div class="container">

        <div class="navbar-collapse" id="navbarSupportedContent">

            <div class="d-none d-lg-block">

                <p class="mb-0">
                    &copy; {{ App\Option::where('value', 'site_name')->value('description') }} |
                    PixlQuick Websites {{ date('Y') }}
                </p>

            </div>

            <ul class="navbar-nav ml-auto">

                @foreach(App\Page::where('display', 1)->orderBy('display_order', 'asc')->get() as $link)

                    <p class="nav-item mb-0">
                        <a class="nav-link text-light"
                           href="{{ $link->url }}">
                            {{ $link->name }}
                        </a>
                    </p>

                @endforeach

            </ul>

            <div class="d-none d-lg-block">
                <span class="mx-3">|</span>
            </div>

            @foreach(\DB::table('social_links')->where('display', 1)->orderBy('display_order', 'asc')->get() as $social)

                <a style="color: {{ $social->color }};"
                   href="{{ $social->url }}"
                   target="_blank">
                    {!! $social->icon !!}
                </a>

            @endforeach

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="/public/js/dashboard.js"></script>

</body>
</html>