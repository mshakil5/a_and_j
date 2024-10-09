@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="breadcrumb imageContent mb-0" style="padding:0;">
    <img src="{{ asset('images/site/service.PNG')}}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
    </div>
</section>

<section class="ftco-section bg-half-light">
    <div class="container">
        <div class="row justify-content-center pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4">We Offer Services</h2>
            </div>
        </div>
        <div class="row">
            @foreach (\App\Models\Service::orderBy('id', 'DESC')->get() as $service)
                <div class="col-md-4 mb-4">
                    <div class="services-wrap ftco-animate" style="height: 400px;">
                        <div class="img" style="background-image: url({{ asset('images/'.$service->image) }}); background-size: cover; background-position: center; height: 200px;"></div>
                        <div class="text" style="height: calc(100% - 200px); padding-bottom: 20px;"> <!-- Add padding to the bottom -->
                            <h2>{{ $service->title }}</h2>
                            <p>{!! Str::limit($service->description, 80) !!}</p>
                            <a href="{{ route('frontend.serviceDetails', $service->id) }}" class="btn-custom">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<style>
    .services-wrap .text {
        height: calc(100% - 200px);
        padding-bottom: 20px;
    }
</style>


@endsection

@section('scripts')
@endsection