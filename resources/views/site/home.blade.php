@extends('layouts.site-body')

@section('content')

    @if( $promo->display == 1 )

        @include('includes.site.promo-popup')

    @endif

    <div class="row bg-dark text-white">

        <div class="container p-5">

            <div class="row">
                <div class="mx-auto text-center">

                    <h1>{{ $mainSection->name }}</h1>

                    <p class="my-3 text-light">
                        {{ $mainSection->description }}
                    </p>

                    <a href="/join?type={{ $mainSection->value }}&classType=&className="
                       class="btn btn-primary text-white shadow px-5 my-3">
                        {{ $mainSection->button }}
                    </a>

                </div>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="row py-3">

            <div class="col-md-6 col-sm-12">
                <img src="{{ url('storage/images/home/'.$section2->image) }}"
                     width="100%"
                     alt="">
            </div>

            <div class="col-md-6 col-sm-12 my-auto text-center">

                <h4>{{ $section2->title }}</h4>

                <p>
                    {!! $section2->body !!}
                </p>

            </div>

        </div>

    </div>

    <hr>

    <div class="container">

        <div class="row py-3">

            <div class="col-md-6 col-sm-12 my-auto text-left">

                <p>
                    {!! $section3->body !!}
                </p>

            </div>

            <div class="col-md-6 col-sm-12 text-center">
                <img src="{{ url('storage/images/home/'.$section3->image) }}"
                     width="75%"
                     alt="">
            </div>

        </div>

    </div>

    @if( $freeLesson->display == 1 )

        <hr>

        <div class="container">

            <div class="row py-5">

                <div class="my-auto mx-auto text-center">

                    <h3>{{ $freeLesson->description }}</h3>

                    <a href="/join?type={{ $freeLesson->value }}&classType=no_type&className="
                       class="btn btn-primary text-white shadow py-3 px-5 my-3">
                        {{ $freeLesson->button }}
                    </a>

                </div>

            </div>

        </div>

    @endif

    <section class="p-5" style="background: #edfff8">

        <div class="container px-5">

            <div class="my-auto mx-auto text-center">

                <p>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning fa-lg"></i>
                    <i class="fas fa-star text-warning fa-2x"></i>
                    <i class="fas fa-star text-warning fa-lg"></i>
                    <i class="fas fa-star text-warning"></i>
                </p>

                @foreach($reviews as $review)

                    <h5>
                        "{{ $review->review }}"
                    </h5>

                    <br>

                    <p>
                        {{ $review->name }}
                    </p>

                @endforeach

            </div>

        </div>

    </section>

    <section class="p-5" style="background: #9baab9">

        <div class="container">
            <div class="row">
                <h3 class="mx-auto">Get in contact today!</h3>
            </div>
            @include('includes.site.contact-form')
        </div>

    </section>

    <script>

        window.onload = setTimeout(function () {
            $('#myModal').modal('show');
        }, 500);

    </script>

@endsection