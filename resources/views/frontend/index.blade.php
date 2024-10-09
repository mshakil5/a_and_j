@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

<style>
    
    @media only screen and (max-device-width: 480px) {
  .slider-img {
    display: none;
  }
  .slider-img.mobile {
    display: block;
  }
  .mobile-text {
    padding-right: 15px !important;
  }
  .mobile-banner{
    display: inline-block !important;
  }
  .project-img {
    height: 206px !important;
  }
  .abouthomex {
    width: 395px !important;
  }
  .project {
    padding-bottom: 20px !important;
  }
}
</style>

<section class="hero-wrap js-fullheight mobile-banner" style="background-image: url('{{asset('frontend/slider/'.\App\Models\Slider::first()->photo)}}'); display:none" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            
        </div>
    </div>
</section>

<section class="ftco-section" id="about-section" style="padding-top: 0px">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-6 pl-md-5" style="background: black">
                <div class="row justify-content-center pt-md-4" style="background: black">
                    <div class="col-md-12 heading-section ftco-animate text-justify mobile-text" style="margin-bottom: 8rem; margin-top: 7rem">
                        <h2 class="mb-4" style="color: #ffffff">{{\App\Models\Master::where('softcode','=','slider')->first()->hardcode}}</h2>
                        
                        <p>
                            {!! \App\Models\Master::where('softcode','=','slider')->first()->details !!}
                        </p>

                        <p> <a href="{{ route('frontend.about')}}" class="btn btn-primary" >See more</a></p>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6  d-flex align-items-stretch">
                <div class="img w-100 slider-img" style="background-image: url({{asset('frontend/slider/'.\App\Models\Slider::first()->photo)}});">
                    
                </div>
            </div>

        </div>
    </div>
</section>








<section class="hero-wrap js-fullheight" style="background-image: url('{{asset('frontend/slider/'.\App\Models\Slider::first()->photo)}}'); display:none" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
            <div class="col-lg-6 ftco-animate">
                <div class="mt-5">
                    <h1 class="mb-4">{{\App\Models\Master::where('softcode','=','slider')->first()->hardcode}}</h1>
                    <p class="mb-4">{!! \App\Models\Master::where('softcode','=','slider')->first()->details !!}</p>
                    
						<p> <a href="{{ route('frontend.contact')}}" class="btn btn-primary" >Request A Quote</a></p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
    <div class="container">
        <div class="row no-gutters d-flex">
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex abouthomex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">{{\App\Models\Master::where('softcode','=','caption1')->first()->hardcode}}</h3>
                        <p>{!! \App\Models\Master::where('softcode','=','caption1')->first()->details !!}</p>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2 d-flex abouthomex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-worker-1"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">{{\App\Models\Master::where('softcode','=','caption2')->first()->hardcode}}</h3>
                        <p>{!! \App\Models\Master::where('softcode','=','caption2')->first()->details !!}</p>
                    </div>
                </div>      
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex abouthomex">
                    <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer"></span></div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">{{\App\Models\Master::where('softcode','=','caption3')->first()->hardcode}}</h3>
                        <p>{!! \App\Models\Master::where('softcode','=','caption3')->first()->details !!}</p>
                    </div>
                </div>      
            </div>
        </div>
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
                        
                        <p>
                            {!!  Str::limit(\App\Models\Client::first()->address , 450) !!}
                        </p>

                        <p> <a href="{{ route('frontend.about')}}" class="btn btn-primary" >See more</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section bg-half-light">
    <div class="container">
        <div class="row justify-content-center pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Our Services</span>
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


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-4">Latest Projects</h2>
            </div>
        </div>

        <div class="row">
            @foreach (\App\Models\Project::orderby('id','DESC')->get() as $key => $lstproject)

            
            <div class="col-md-4 pb-5"> 
                <div class="project">
                    <a href="{{ route('frontend.projectDetails', $lstproject->id)}}">
                        <img src="{{asset('images/'.$lstproject->image)}}" class="project-img"  alt="Alt text" style="height: 245px;min-width:100%" />
                        
                    </a>
                    <div class="text">
                    <a href="{{ route('frontend.projectDetails', $lstproject->id)}}">
                        <h3>{{ $lstproject->title}}</h3>
                    </a>
                    </div>
                </div> 
            </div>

            @endforeach
            
        </div>

    </div>
</section>





<section class="ftco-section bg-light d-none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Business Affiliation</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-lg-3 ftco-animate">
                <div class="blog-entry">
                    
                    <img src="{{asset('images/client/AFFN1.png')}}"  class="block-20" alt="">
                    
                </div>
            </div>

            <div class="col-lg-3 ftco-animate">
                <div class="blog-entry">
                    <img src="{{asset('images/client/AFFN2.png')}}"  class="block-20" alt="">
                </div>
            </div>
            <div class="col-lg-3 ftco-animate">
                <div class="blog-entry">
                    
                    <img src="{{asset('images/client/AFFN3.png')}}"  class="block-20" alt="">
                </div>
            </div>

            <div class="col-lg-3 ftco-animate">
                <div class="blog-entry">
                    
                    <img src="{{asset('images/client/AFFN4.png')}}"  class="block-20" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section pb-5" style="overflow-x: hidden;">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="sectionTitle text-uppercase">
                <h2 class="mb-4">WHATS OUR CLIENT’S SAID</h2> 
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">


            @foreach (\App\Models\Review::orderby('id','DESC')->limit(8)->get() as $review)
            <div class="col-md-3">
                <div class="card text-center border-0 shadow-lg mb-3">
                    <div class="card-header py-4">
                        <img width="90px" height="90px" class="img-fluid" src="{{asset('images/'.$review->image)}}">
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 font-weight-bold">{{ $review->title }}</h6>
                        <div class="rating">
                            <iconify-icon icon="emojione:star"></iconify-icon>
                            <iconify-icon icon="emojione:star"></iconify-icon>
                            <iconify-icon icon="emojione:star"></iconify-icon>
                            <iconify-icon icon="emojione:star"></iconify-icon>
                            <iconify-icon icon="emojione:star"></iconify-icon>
                        </div>
                        <p class="text-muted mb-3">{!!  Str::limit($review->description , 100) !!}</p>
                        <small class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--flat-color-icons" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48" data-icon="flat-color-icons:google"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"></path><path fill="#FF3D00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z"></path><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44z"></path><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"></path></svg></small>
                    </div>
                </div>
            </div>
            @endforeach

          
        </div>
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <a href="{{ route('frontend.reviews')}}">
                <button class="btn btn-primary  px-5 py-2">view all Reviews</button></a>
                <a href="https://g.page/r/CR0MuNHbLYsiEAg/review" target="blank">
                    <button class="btn btn-primary  px-5 py-2">Write a review</button></a>
            </div>
        </div>
    </div>
</section>
    
@endsection

@section('scripts')
@endsection