@extends('layouts.app')
@section('content')
    <!--HTML CODE-->
<!--HTML CODE-->
<div class="w-full relative">
  <div class="swiper progress-slide-carousel swiper-container relative">
  <div class="swiper-wrapper">
  <div class="swiper-slide h-[300px]">
    <div class="bg-indigo-50 rounded-2xl h-120 flex justify-center items-center">
      <img src="{{ asset('images/hero1.png') }}" alt="AgriCentral Logo" class="h-full w-full object-cover">
      {{-- <span class="text-3xl font-semibold text-indigo-600">Slide 1 </span> --}}
    </div>
  </div>
  <div class="swiper-slide">
    <div class="bg-indigo-50 rounded-2xl h-120 flex justify-center items-center">
      <img src="{{ asset('images/hero2.png') }}" alt="AgriCentral Logo" class="h-full w-full object-cover">
      {{-- <span class="text-3xl font-semibold text-indigo-600">Slide 2 </span> --}}
    </div>
  </div>
  <div class="swiper-slide">
    <div class="bg-indigo-50 rounded-2xl h-120 flex justify-center items-center">
      <img src="{{ asset('images/hero3.png') }}" alt="AgriCentral Logo" class="h-full w-full object-cover">
      {{-- <span class="text-3xl font-semibold text-indigo-600">Slide 3 </span> --}}
    </div>
  </div>
  </div>
  <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto bg-gray-100"></div>
  </div>
</div>


<!-- NOTIFICATIONS SECTION -->
<x-user.notification />

<!-- AWARENESS SECTION -->
<x-user.awarness />

<!-- TECHNOLOGY NEWS SECTION -->
<x-user.technology />

<!-- WEATHER FORECAST LINKS -->
<x-user.weatherforecast />

@endsection
