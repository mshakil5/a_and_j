@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




<section class="breadcrumb imageContent mb-0" style="padding:0;">
    <img src="{{ asset('images/site/about.PNG')}}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
    </div>
</section>

<section class="ftco-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="about-wrap img w-100" style="background-image: url({{ asset('images/'.\App\Models\Client::first()->image)}});">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-crane"></span></div>
                </div>
            </div>
            <div class="col-md-6 py-5 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">{{\App\Models\Client::first()->name}}</h2>
                        
                        <p>{!! \App\Models\Client::first()->address !!}.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection