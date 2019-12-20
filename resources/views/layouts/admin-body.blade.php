@include('includes.main-head')

@include('admin.admin-navigation')

<div class="container-fluid mt-3">

    @yield('content')

</div>

<footer>

    @include('includes.admin.main-footer')

</footer>