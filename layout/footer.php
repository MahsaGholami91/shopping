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
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
<script src="assets/js/zoom.js"></script>

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
    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {
        url: "includes/product.inc.php",
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: null, // Allow unlimited number of files to be uploaded
        acceptedFiles: "image/*", // Accept only image files
        addRemoveLinks: true // Add remove file links
    });

    // On successful upload, show success message
    myDropzone.on("success", function(file, response) {
        $('#success').text(response.message);
    });

    // If an error occurs during upload, show error message
    myDropzone.on("error", function(file, errorMessage, xhr) {
        $('#error').text(errorMessage);
    });
</script>
</body>
</html>




  