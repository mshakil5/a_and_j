<div class="py-1 top" style="display: none">
    <div class="container">
        <div class="row">
            <div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
                <p class="mb-0 w-100">
                    <span class="fa fa-paper-plane"></span>
                    <span class="text">{{\App\Models\CompanyDetail::first()->email1}}</span>
                </p>
            </div>
            <div class="col-sm justify-content-center d-flex mb-md-0 mb-2">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="https://{{\App\Models\CompanyDetail::first()->facebook}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                        <a href="https://{{\App\Models\CompanyDetail::first()->twiter}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                        <a href="https://{{\App\Models\CompanyDetail::first()->instagram}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>






<div class="pt-4 pb-5">
    <div class="container">
        <div class="row d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-md-3 d-flex mb-2 mb-md-0">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage')}}">
                    <img src="{{url('images/company/'.\App\Models\CompanyDetail::first()->company_logo)}}" class="p-1 img-fluid mx-auto">
                </a>
            </div>


            <div class="col-md-7 d-flex topper mb-md-0 mb-2 align-items-center">
                
                <nav class="navbar navbar-expand-lg  ftco-navbar-light" id="ftco-navbar">
                    <div class="container d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fa fa-bars"></span> Menu
                        </button>
    
                        <div class="collapse navbar-collapse" id="ftco-nav">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item {{  request()->routeIs('homepage') ? 'active' : '' }}"><a href="{{ route('homepage')}}" class="nav-link">Home</a></li>
                                <li class="nav-item {{  request()->routeIs('frontend.about') ? 'active' : '' }}"><a href="{{ route('frontend.about')}}" class="nav-link">About</a></li>
                                <li class="nav-item {{  request()->routeIs('frontend.service') ? 'active' : '' }}"><a href="{{ route('frontend.service')}}" class="nav-link">Services</a></li>
                                <li class="nav-item {{  request()->routeIs('frontend.project') ? 'active' : '' }}"><a href="{{ route('frontend.project')}}" class="nav-link">Projects</a></li>
                                <li class="nav-item {{  request()->routeIs('frontend.contact') ? 'active' : '' }}"><a href="{{ route('frontend.contact')}}" class="nav-link">Contact</a></li>
                            </ul>
                            
                        </div>
                    </div>
                </nav>


            </div>

            <div class="col-md-2 d-flex topper mb-md-0 mb-2 align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <span class="fa fa-phone"></span>
                </div>
                <div class="text">
                    <p class="con"> <a href="tel:{{\App\Models\CompanyDetail::first()->phone1}}"> <span>{{\App\Models\CompanyDetail::first()->phone1}}</span></a></p>
                </div>
            </div>
            


            
            



        </div>
    </div>
</div>





<!-- END nav -->