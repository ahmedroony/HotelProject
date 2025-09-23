@extends('layout.master')
@section('content')


    <section class="site-hero overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade-up">
                    <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To 5 <span
                            class="fa fa-star text-primary"></span> Hotel</span>
                    <h1 class="heading">Get The Stay That Suits You</h1>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->









    <section class="section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
                    <p data-aos="fade-up" data-aos-delay="100">
                        <strong>{{ $checkin }}</strong> - <strong>{{ $checkout }}</strong><br>
                       {{ $adults }} Adults, {{ $children }} Children
                    </p>
                </div>
            </div>
            <div class="row">

                @if ($availableTypes->isEmpty())
                    <p>No rooms available for the selected dates.</p>
                @else
                    @foreach ($availableTypes as $roomType)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <a href="#" class="room">
                                <figure class="img-wrap">
                                    <img src="images/img_5.jpg" alt="hotel room" class="img-fluid mb-3">
                                    {{-- <img src="{{ $room->roomType->imagepath }}" alt="hotel room" class="img-fluid mb-3"> --}}
                                </figure>
                                <div class="p-3 text-center room-info">
                                    <h2>{{ $roomType->name }}</h2>
                                    <span class="text-uppercase letter-spacing-1">{{ $roomType->price }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
@endsection
