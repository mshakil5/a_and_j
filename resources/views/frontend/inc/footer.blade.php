<footer class="ftco-footer">
    <div class="container mb-5 pb-4">
        <div class="row">
            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2 d-flex align-items-center">About</h2>
                    <p>{{\App\Models\CompanyDetail::first()->footer_content}}</p>
                    <ul class="ftco-footer-social list-unstyled mt-4">
                        <li><a href="https://{{\App\Models\CompanyDetail::first()->twiter}}"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="https://{{\App\Models\CompanyDetail::first()->facebook}}"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="https://{{\App\Models\CompanyDetail::first()->instagram}}"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('homepage')}}"><span class="fa fa-chevron-right mr-2"></span>Home</a></li>
                            <li><a href="{{ route('frontend.about')}}"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
                            <li><a href="{{ route('frontend.service')}}"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
                            <li><a href="{{ route('frontend.project')}}"><span class="fa fa-chevron-right mr-2"></span>Project</a></li>
                            <li><a href="{{ route('frontend.contact')}}"><span class="fa fa-chevron-right mr-2"></span>Contact Us</a></li>
                        </ul>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        @foreach (\App\Models\Service::orderby('id','DESC')->limit(4)->get() as $service)
                        <li><a href="{{ route('frontend.serviceDetails', $service->id)}}"><span class="fa fa-chevron-right mr-2"></span>{{$service->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="fa fa-map-marker mr-3"></span><span class="text">{{\App\Models\CompanyDetail::first()->address}}</span></li>
                            <li><a href="tel:{{\App\Models\CompanyDetail::first()->phone1}}"><span class="fa fa-phone mr-3"></span><span class="text">{{\App\Models\CompanyDetail::first()->phone1}}</span></a></li>
                            <li><a href="#"><span class="fa fa-paper-plane mr-3"></span><span class="text">{{\App\Models\CompanyDetail::first()->email1}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container"><center>
            <div class="copyright text-white">Copyright  © 2022<strong>
                    <span>A  And J Construction </span></strong>All Rights Reserved
                    <span style="color: #ffffff; font-family: poppins-light; font-size: 16px; text-align: center; background-color: #000000;"></span><br style="color: #212529; font-family: poppins-light; font-size: 16px; text-align: center;" /><span style="color: #ff6600;"><span style="font-family: poppins-light; font-size: 16px; text-align: center;">&nbsp;Design and Developed by </span><a href="http://www.mentosoftware.co.uk/" target="_blank" rel="lightbox noopener noreferrer" style="color: #ff6600; font-family: poppins-light; font-size: 16px; text-align: center;">Mento Software</a> </span>
<p><br/></p></center>
                    </div>
                    
        </div>
    </footer>
   
