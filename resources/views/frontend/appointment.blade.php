@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad" style="background-color: black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-white">
                    <div class="bo-links">
                        <h1>Appointment</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact-form">
                    <form action="#">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Website">
                        <textarea placeholder="Message"></textarea>
                        <button type="submit" class="site-btn">Submit</button>
                    </form>
                </div>
                
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact-form">
                    <form action="#">
                        <input type="text" placeholder="Name">
                        <input type="text" placeholder="Email">
                        <input type="text" placeholder="Website">
                        <textarea placeholder="Message"></textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


@endsection

@section('scripts')
@endsection