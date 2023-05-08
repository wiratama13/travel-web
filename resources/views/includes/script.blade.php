<script src="{{ url('frontend/libraries/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('frontend/libraries/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('frontend/libraries/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontend/libraries/retina/retina.min.js')}}"></script>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    /**
   * Animation on scroll
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

</script>


  <!-- Initialize Tiny-Swiper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $('.owl-carousel').owlCarousel({
    center: true,
    loop:true,
    margin:10,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        425: {
          items : 2
        },
        500: {
          items : 2
        },
        575:{
          items : 2
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
  </script>