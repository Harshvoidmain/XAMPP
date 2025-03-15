<style>
    .row > .column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 25%;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;

        background: rgba(25,25,25,0.95);
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 70%;
        max-width: 1200px;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    img.demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }
</style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="<?php echo $this->Html->url('/home'); ?>">Home</a></li>
                        <li>Archives</li>
                        <li class="active">ICNTE 2015</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <h2 style="text-align:center;">ICNTE 2015</h2>
    <hr class="style17">
</div>
<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae leo vel magna elementum ultricies. Proin vestibulum justo quis mi elementum euismod. Nulla suscipit, lorem nec sodales lacinia, arcu augue eleifend augue, ut egestas lorem massa eu purus. Donec ut sem at ex faucibus scelerisque vel a ex. Suspendisse suscipit sollicitudin dignissim. Morbi auctor vestibulum risus in hendrerit. Aenean vitae placerat justo. Maecenas eu turpis pretium, commodo leo id, aliquam sem.
</div>
<div class="row">
    <div class="column">
        <img src="../../images/15a.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >
    </div>
    <div class="column">
        <img src="../../images/15b.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >
    </div>
    <div class="column">
        <img src="../../images/15c.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >
    </div>
    <div class="column">
        <img src="../../images/15d.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >
    </div>
    <div class="column">
        <img src="../../images/15e.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >
    </div>
</div>

<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">

        <div class="mySlides">
            <div class="numbertext">1 / 5</div>
            <img src="../../images/15a.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 5</div>
            <img src="../../images/15b.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 5</div>
            <img src="../../images/15c.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 5</div>
            <img src="../../images/15d.jpg" style="width:100%">
        </div>

        <div class="mySlides">
            <div class="numbertext">5 / 5</div>
            <img src="../../images/15e.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>


    </div>
</div>
<script>
    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>