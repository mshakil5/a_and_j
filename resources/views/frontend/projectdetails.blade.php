@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<!--<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/site/bg_2.jpg')}}');  background-attachment:fixed !Important">-->
<!--    <div class="container text-center heading-section ftco-animate">-->
<!--    </div>-->
<!--</section>-->



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-4">{{ $projects->title}}</h2>
            </div>
        </div>


        <div class="row popup-gallery">


            @foreach ( \App\Models\ProjectImage::where('project_id','=', $projects->id)->get() as $key => $project)

            @php
                $allowed = array('gif', 'png', 'jpg','JPG', 'jpeg', 'gif', 'svg');
                $filename = $project->image;
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
            @endphp

            @if (!in_array($ext, $allowed))
                <div class="col-md-4 "> 
                    <div class="project">
                        <a href="{{asset('images/'.$project->image)}}" class="video">
                            <img src="http://sandbox.vciwork.com/codepenstuff/images/2.jpg" alt="Alt text" />
                            <div class="icon d-flex align-items-center justify-content-center mb-5">
                                <span class="fa fa-plus"></span>
                            </div>
                        </a>
                        {{-- <div class="text">
                            <span class="subheading">{{ \App\Models\GalleryCategory::where('id','=', $project->category_id)->first()->name}}</span>
                            <h3>{{ $project->caption}}</h3>
                        </div> --}}
                    </div> 
                </div>
            @else

            <div class="col-md-4 "> 
                <div class="project">
                    <a href="{{asset('images/'.$project->image)}}" class="image">
                        <img src="{{asset('images/'.$project->image)}}"  alt="Alt text" />
                        <div class="icon d-flex align-items-center justify-content-center mb-5">
                            <span class="fa fa-plus"></span>
                        </div>
                    </a>
                    {{-- <div class="text">
                        <span class="subheading">{{ \App\Models\GalleryCategory::where('id','=', $project->category_id)->first()->name}}</span>
                        <h3>{{ $project->caption}}</h3>
                    </div> --}}
                </div> 
            </div>

            @endif

            
            @endforeach
            
        </div>


        



    </div>
</section>



@endsection

@section('scripts')
@endsection