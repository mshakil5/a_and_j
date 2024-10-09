@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')



<section class="breadcrumb imageContent mb-0" style="padding:0;">
    <img src="{{ asset('images/site/service.PNG')}}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
    </div>
</section>
  
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-2">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">{{ $service->title }}</h2>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-8 ftco-animate">

            <p>
                <img src="{{ asset('images/'.$service->image)}}" alt="" class="img-fluid">
              </p>
            
          {!! $service->description !!}
          
          
          
  
  
          
  
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate">
            
            
  
        <div class="sidebar-box ftco-animate">


          <h3 class="heading-sidebar">Other Services</h3>

          @foreach (\App\Models\Service::where('id','!=', $service->id)->orderby('id','DESC')->limit(4)->get() as $item)
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url({{ asset('images/'.$item->image)}});"></a>
            <div class="text">
              <h3 class="heading"><a href="{{ route('frontend.serviceDetails', $item->id)}}">{{ $item->title}}</a></h3>
            </div>
          </div>
          @endforeach
          

        </div>
  
      </div>
  
    </div>
  </div>
  </section> <!-- .section -->
  


@endsection

@section('scripts')
@endsection