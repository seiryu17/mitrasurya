<!doctype html>
<html lang="en">

<head>
<?php include './partials/header.php'; ?>   
</head>

<body>
    <!--::header part start::-->
 
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>contact Us</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Contact Us</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="google-maps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.020550927335!2d104.00544411475376!3d1.145795199164242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98963731e30bb%3A0x26b4eb340dd1b865!2sCv%20Mitra%20Surya%20Mandiri%20Sukses%20(%20Vinyl%20Batam)!5e0!3m2!1sen!2sid!4v1588148430217!5m2!1sen!2sid" width="200" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
<hr>
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="email/" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_1">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Nagoya, Batam.</h3>
              <p>Jl. Komp. Business Centre No.13-14, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>(0778) 433 187</h3>
              <p>Mon to Sat 08:00 - 17:00</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><a href="https://wa.me/6281355538777?text=Halo saya ingin berbicara lanjut product mitra sukses" target=_><i class="fa fa-whatsapp fa-5x" style="color:#8f9195; font-size:30px;" aria-hidden="true"></i></a></span>
            <div class="media-body">
              <h3>Press the icon</h3>
              <p>0813 5553 8777</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><a href="http://line.me/ti/p/~riorifero" target=_><img src="../img/line-logo.png" width="27px"></a></span>
            <div class="media-body">
              <h3>Press the icon</h3>
              <p>yenayou23</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>sales@mitrasurya.co.id</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<!-- footer part start-->
<?php include './partials/footer.php'; ?>    
</body>

</html>