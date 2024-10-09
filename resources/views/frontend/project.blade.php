@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')




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





@endsection

@section('scripts')
@endsection