<section class="footer">
        <div class="container">
            <div class="row footer-design ">
                <div class="part1 col-md-3 col-sm-5 col-5 ">
                    <div class="first d-flex flex-column">
                        <div class="title">Trendyol</div>
                        <div class="list d-flex flex-column">
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                        </div>
                    </div>
                    <div class="second d-flex flex-column">
                        <div class="title">Guvenli</div>
                        <div class="guvenli d-flex flex-row">
                            <div class="visa"><img src="assets/images/troy-logo-transparent.webp" alt=""></div>
                            <div class="visa1"><img src="assets/images/footer-master-card.webp" alt=""></div>
                            <div class="visa2"><img src="assets/images/footer-visa-black.webp" alt=""></div>
                            <div class="visa3"><img src="assets/images/footer-amex.webp" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="part3 col-md-3 col-sm-5 col-5">
                    <div class="first d-flex flex-column">
                        <div class="title">Kampanya</div>
                        <div class="list d-flex flex-column">
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                        </div>
                    </div>
                    <div class="second d-flex flex-column">
                        <div class="title">Spcial Media</div>
                        <div class="social-media d-flex flex-row">
                            <a class="facebook" href="">

                            </a>
                            <a class="instagram" href=""></a>
                            <a class="twitter" href=""></a>
                            <a class="youtube" href="">
                        
                            </a>
                        </div>
                    </div>  
                </div>
                <div class="part2 col-md-3 col-sm-5 col-5">
                        <div class="first d-flex flex-column">
                        <div class="title">About Us</div>
                        <div class="list d-flex flex-column">
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                        </div>
                    </div>
                    <div class="second d-flex flex-column">
                        <div class="title">Mobile App</div>
                        <div class="mobile-app d-flex flex-column">
                            <a class="app-store" href=""></a>
                            <a class="google-play" href=""></a>
                            <a class="app-gallery" href=""></a>
                        </div>
                    </div>
                </div>
                
                <div class="part4 col-md-3 col-sm-5 col-5">
                    <div class="first d-flex flex-column">
                        <div class="title">Yardim</div>
                        <div class="list d-flex flex-column">
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                            <a class="text-secondary" href="">Biz Kimiz</a>
                        </div>
                    </div>
                    <div class="second d-flex flex-column">
                        <div class="title">ulke</div>
                        <div class="barcode d-flex flex-row">
                            <a href="">
                                <img src="assets/images/etbis-qr.webp" alt="">
                            </a>
                        </div>
                    </div>     
                </div>

            </div>
        </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Top 
                <span class="material-symbols-outlined">  arrow_upward  </span>
            </button>
            

    </section>
    



    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="components/owl/js/owl.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  -->
    <script>
        var timeout    = 500;
        var closetimer = 0;
        var ddmenuitem = 0;

        function jsddm_open()
        {  jsddm_canceltimer();
        jsddm_close();
        ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

        function jsddm_close()
        {  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

        function jsddm_timer()
        {  closetimer = window.setTimeout(jsddm_close, timeout);}

        function jsddm_canceltimer()
        {  if(closetimer)
        {  window.clearTimeout(closetimer);
            closetimer = null;}}

        $(document).ready(function()
        {  $('#myTab > li').bind('mouseover', jsddm_open)
        $('#myTab > li').bind('mouseout',  jsddm_timer)});

        document.onclick = jsddm_close;
    </script>

<script>
    // $('.collapse').collapse('#q');
</script>
     <script src="assets/js/master.js" type="text/javascript"></script> 
     <link href="assets/css/animate.css" rel="stylesheet" type="text/css"> 
     <script src="assets/plugin/ellipsis/jquery.dotdotdot.min.js" type="text/javascript"></script> 
     <link href="assets/plugin/nice-select/css/custom.css" rel="stylesheet" type="text/css">
     <script src="assets/plugin/nice-select/js/jquery.nice-select.min.js" type="text/javascript"></script> 
     <link rel="stylesheet" href="assets/plugin/drift-master/drift-basic.css">
     <script src="assets/plugin/drift-master/Drift.js"></script>   
     <script src="assets/js/functions.js" type="text/javascript"></script>
     <script src="assets/plugin/sweetalert/sweetalert.min.js" type="text/javascript"></script>
     <script src="assets/js/Atlasweb.js"></script>
     <script src="assets/js/atlasweb.ctrl.js"></script>
         
    <script>
        $(document).ready(function(){

        // nice select
        $('select').niceSelect();
        // end nice select

        // //thumbnail pics
        $('.pic_style1 .thumb_part .pic').click(function(){
            var $this=$(this);
            $('.pic_style1 .bigpic').animate({opacity:0.6},200,function () {
                $('.pic_style1 .thumb_part .pic').removeClass('active');
                $(this).addClass('active');
                var bigpic = $this.find('img').attr('data-bigpic-url');
                var zoompic = $this.find('img').attr('data-zoompic-url');
                $('.pic_style1 .bigpic').find('img').attr('src',bigpic).attr('data-zoom',zoompic);
                $('.pic_style1 .bigpic').animate({opacity:1});
            });

        });// //thumbnail pics

        
        // //detail tabs
        $('.product_detail_style1 .title3').click(function(){
            $(this).toggleClass('open');
            $(this).closest('.item1').find('.paragraph1').slideToggle(200);
            $(this).closest('.item1').find('.share_style2').slideToggle(200);
        });// //detail tabs

        $('.product_detail_style1 .like1 .icon').click(function () {
            $(this).toggleClass('liked');
        })

        // zoom plugin
        new Drift(document.querySelector('.drift-demo-trigger'), {
            paneContainer: document.querySelector('.product_detail_style1'),
            inlinePane: 900,
            containInline: true,
            hoverBoundingBox: true,
            zoomFactor: 3,
            inlineOffsetY: -85,
        });


            $('.box_style1 .quick_view .text').click(function(){
                show_modal('.bg15');
                modal_box('#popup_box15',$(this));
            });
            $(document.body).on('click','.modal_style15 .close_icon',function(){
                hide_modal('.bg1');
                $('.modal_style15').fadeOut();
            });
        // zoom plugin

        });//end document ready
    </script>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");
        
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }
        
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>
    
    <script>
        // hamburger menu
        function hamMenu() {
            var menu = document.getElementById("mobile-menu");
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }

    </script>
 <script>
        $(document).ready(function() {
            $("#showPass").click(function() {
                if ($("#myPass").attr("type") == "password") {
                $("#myPass").attr("type", "text");
                } else {
                $("#myPass").attr("type", "password");
                }
            });
            $("#showPass").click(function() {
                $("#showPass span").toggle();
            });
            $("#showrePass").click(function() {
                if ($("#myrePass").attr("type") == "password") {
                $("#myrePass").attr("type", "text");
                } else {
                $("#myrePass").attr("type", "password");
                }
            });
            $("#showrePass").click(function() {
                $("#showrePass span").toggle();
            });
        });
    </script>
    <script>
        // alert($message);
    </script>
</body>
</html>




  