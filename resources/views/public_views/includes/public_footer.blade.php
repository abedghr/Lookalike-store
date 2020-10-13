<!--================ start footer Area  =================-->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            
            
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title mb-5">Follow Us</h6>
                    <div class="row">
                    <div class="col-sm-4">
                        <h5 style="font-size:30px;">
                        <i class="fa fa-mobile" style="color:black; font-size:50px"></i> <br><small style="font-size:15px; position: relative; bottom: 10px; font-weight:bold" class="text-dark"> </i>0790714916 / 0795713928</small>
                        </h4>
                    </div>
                    <div class="col-sm-4">
                        
                        <a href="#">
                            <h4 style="font-size:30px">
                                <a href="https://www.facebook.com/jo.watch.store" target="_blank"><i class="fa fa-facebook-square"></i><br>Facebook</a>
                            </h4>
                        </a>
                        
                    </div>
                    <div class="col-sm-4">
                        
                        <a href="#">
                            <h4 style="font-size:30px">
                                <a href="https://www.instagram.com/look_alike.store/" target="_blank" style="color:#660033"><i class="fa fa-instagram" style="color:#660033"></i><br>Instagram</a>
                            </h4>
                        </a>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="#">Look-Alike</a>.</strong>
                All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('public_libraries/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public_libraries/js/popper.js')}}"></script>
<script src="{{asset('public_libraries/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public_libraries/js/stellar.js')}}"></script>
<script src="{{asset('public_libraries/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public_libraries/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('public_libraries/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
{{-- <script src="{{asset('public_libraries/vendors/flipclock/timer.js')}}"></script> --}}
<script src="{{asset('public_libraries/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('public_libraries/js/mail-script.js')}}"></script>
<script src="{{asset('public_libraries/js/theme.js')}}"></script>
<script src="{{asset('public_libraries/sweetalert/sweetalert.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script>
        
        $("document").ready(function(){
            
            $('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
                
				swal(nameProduct, "is added to cart !", "success");
			});
        });
        
        });
        
    </script>

</body>

</html>

