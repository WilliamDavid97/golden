<!-- footer -->
<div class="footer">
    <div class="footer_agile_inner_info_w3l">
        <div class="col-md-4 footer-left">
            <h2><a href="index.php"><span>G</span>olden Dragon</a></h2>
            <p style="color: #e1f5fex;">Shop now to find the best design of bags, luggage, backpacks, suitcases, shopping bag, leather bags and accessories. These bags not only make you happy, but also the world around you.</p>

        </div>
               <div class="col-md-8 footer-right">
                 <div class="sign-grds">
                    <div class="col-md-6 sign-gd">
                    <h4>Our <span>Information</span> </h4>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="mens.php">Men's Bag</a></li>
                        <li><a href="womens.php">Women's Bag</a></li>
                        <li><a href="kids.php">Kid's Bag</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-6 sign-gd-two">
                    <h4>Store <span>Information</span></h4>
                    <div class="w3-address">
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Phone Number</h6>
                                <p>+95 9967159875</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Email Address</h6>
                                <p>Email :<a href="mailto:example@email.com">goldendragon@gmail.com</a></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Location</h6>
                                <p>No 234, Mawlamyaing 
                                
                                </p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
        <p class="copy-right">&copy 2019 Golden Dragon. All rights reserved | Design by <a href="#">Golden_Dragon</a></p>
    </div>
</div>
<!-- //footer -->
<!-- <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/responsiveslides.min.js"></script>
                <script>
                        // You can also use "$(window).load(function() {"
                        $(function () {
                         // Slideshow 4
                        $("#slider3").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                        $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                            }
                            });
                        });
                </script>
<script src="js/modernizr.custom.js"></script>
    <!-- Custom-JavaScript-File-Links --> 
    <!-- cart-js -->
    <script src="js/minicart.min.js"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>

    <!-- //cart-js --> 
    <!---->
                            <script type='text/javascript'>//<![CDATA[ 
                            $(window).load(function(){
                             $( "#slider-range" ).slider({
                                        range: true,
                                        min: 0,
                                        max: 9000,
                                        values: [ 1000, 7000 ],
                                        slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                        }
                             });
                            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

                            });//]]>  

                            </script>
                        <script type="text/javascript" src="js/jquery-ui.js"></script>
                     <!---->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
<!-- //here ends scrolling icon -->

<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>