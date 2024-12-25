<section>
    <div id="containerSlider">
        <div id="slidingImage">
            <img src="{{ asset('images/img1.png') }}" alt="image1">
        </div>
        <div id="slidingImage">
            <img src="{{ asset('images/img2.png') }}" alt="image2">
        </div>
        <div id="slidingImage">
            <img src="{{ asset('images/img3.png') }}" alt="image3">
        </div>
        <div id="slidingImage">
            <img src="{{ asset('images/img4.png') }}" alt="image4">
        </div>
    </div>
</section>

<style>
    body {
        margin: 0;
    }

    #containerSlider {
        margin: auto;
        width: 90%;
        text-align: center;
        padding-top: 100px;
        box-sizing: border-box;
    }

    #containerSlider img {
        width: 100%;
        height: 140%;
        text-align: center;
        align-content: center;
    }

    @media(max-width: 732px) {
        #containerSlider img {
            height: 12em;
        }
    }

    @media(max-width: 500px) {
        #containerSlider img {
            height: 10em;
        }
    }
</style>

<!-- <script src=“https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js”></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function()
    {
    $('#containerSlider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        });
    });
</script>
