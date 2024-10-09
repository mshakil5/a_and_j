@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


<section class="breadcrumb imageContent mb-0" style="padding:0;">
    <img src="{{ asset('images/site/contact.png')}}" style="width: 100%" class="cover">
    <div class="inner text-center px-4">
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center  pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Message us for more details</h2>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-8">
                @if(session()->has('message'))
                            <div class="alert alert-success" id="successMessage">{{ session()->get('message') }}</div>
                    @endif

                    @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    @error('subject')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    
                    @error('message')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    
                    @error('captcha')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <form class="form-contact contact_form" action="{{ route('contactMessage.store') }}" method="post" novalidate="novalidate">
                        @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" name="name" value="{{ old('name') }}"  class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="email" name="email"  value="{{ old('email') }}"  class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id="subject" name="subject"  value="{{ old('subject') }}"  class="form-control" placeholder="Subject" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>

            <div class="col-md-4 d-flex pl-md-5">
                <div class="row">
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Address:</span> {{\App\Models\CompanyDetail::first()->address}}</p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Phone:</span> <a href="tel:{{\App\Models\CompanyDetail::first()->phone1}}">{{\App\Models\CompanyDetail::first()->phone1}}</a></p>
                            <p> <a href="tel:{{\App\Models\CompanyDetail::first()->phone2}}">{{\App\Models\CompanyDetail::first()->phone2}}</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="mailto:{{\App\Models\CompanyDetail::first()->email1}}">{{\App\Models\CompanyDetail::first()->email1}}</a></p>
                        </div>
                    </div>
                    {{-- <div class="dbox w-100 d-flex ftco-animate">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-12">
                <div>
                    <iframe src="{{\App\Models\CompanyDetail::first()->google_map}}"  height="450px" style="border:0; width:100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')
@endsection