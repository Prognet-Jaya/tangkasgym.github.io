<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-JJXboZbYR8Xo1ZEy"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="stylesheet" href="/user/assets/css/orderstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  </head>
 
  <body>
    
    
<div class="modal clearfix">

    <div class="modal-product">
   
      <div class="product">

        <!-- Slideshow container -->
        <div class="product-slideshow">

          <!-- Full-width images with number and caption text -->
          <div class="productSlides fade">
            <img src="/latihan/{{$latihan->gambar}}" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="https://github.com/EricGFigueroa/002-DailyUI-Gucci-Checkout/blob/master/img/gucci-bag-2.png?raw=true" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="https://github.com/EricGFigueroa/002-DailyUI-Gucci-Checkout/blob/master/img/gucci-bag-3.png?raw=true" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="https://github.com/EricGFigueroa/002-DailyUI-Gucci-Checkout/blob/master/img/gucci-bag-4.png?raw=true" style="width:100%">
          </div>

          <div class="productSlides fade">
            <img src="https://github.com/EricGFigueroa/002-DailyUI-Gucci-Checkout/blob/master/img/gucci-bag-5.png?raw=true" style="width:100%">
          </div>

          <br>

          <!-- The dots/circles -->
          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
          </div>

        </div>

        <h1 class="product-name">
        {{$latihan->nama_training}}
        </h1>
        <p class="product-code-name">
        code: {{$latihan->id}}
        </p>
        <p class="product-price">
        Rp.{{$latihan->harga_training}}
        </p>

      </div>

      <div class="round-shape"></div>
    </div>
    <div class="modal-info">
      <div class="info">
        <h2>Detail Order</h2>
        <form action="#">
          <ul class="form-list">
            <li class="form-list-row">
              <div class="user">
                <label for="#">Nama Lengkap</label><br>
                <i class="fas fa-user">{{$user->nama_lengkap}}</i>
              </div>
            </li>
            <li class="form-list-row">
              <div class="number">
                <label for="#">Umur</label><br>
                <i class="far fa-credit-card">{{$user->umur}}</i>
              </div>
            </li>

            <li class="form-list-row">
              <div class="number">
                <label for="#">Pekerjaan</label><br>
                <i class="far fa-credit-card">{{$user->pekerjaan}}</i>
              </div>
            </li>

            <li class="form-list-row">
              <div class="number">
                <label for="#">Alamat</label><br>
                <i class="far fa-credit-card">{{$user->alamat}}</i>
              </div>
            </li>

            <li class="form-list-row">
              <div class="number">
                <label for="#">Telepon</label><br>
                <i class="far fa-credit-card">{{$user->telepon}}</i>
              </div>
            </li>

            <li class="form-list-row">
              <div class="number">
                <label for="#">Total Bayar</label><br>
                <i class="far fa-credit-card">{{$order->jumlah_bayar}}</i>
              </div>
            </li>

          </ul>
        </form>
        <button id="pay-button">Pay Now</button>
        <form action="" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
       
    </form>
    <br>
    
      </div>
      <a href="/list_training"><button type="button" class="btn btn-light">Kembali</button></a>
    </div>
  </div>
    
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            send_response_to_form(result);
          },
          
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            send_response_to_form(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            send_response_to_form(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });

      function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
    </script>

    <script>
      var slideIndex = 1;
    showSlides(slideIndex);
    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("productSlides");
      var dots = document.getElementsByClassName("dot");
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
    }
      </script>
  </body>
</html>