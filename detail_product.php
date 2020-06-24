<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Mitra Surya</title>
    <link rel="icon" href="../../img/faviconmsms.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../../css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../../css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../../css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../../css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../../css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../../css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 250; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
</head>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/home/"> <img src="../../img/logo_ms.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href="/home/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/products/">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/portfolio/">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/services/">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/simulasi/">Simulasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contactus/">Contact Us</a>
                            </li>
                            <li class="d-none d-lg-block">
                                <!-- <a class="btn_1" href="#">Get a Quote</a>-->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<body>  

<section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>Detail Product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Products<span>/</span>Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <?php
    include "./manage/admin/config.php";

    $id = $_GET['id'];

    function countFile($directory) {
        $filecount = 0;
        $files = glob($directory . "*");
        if ($files){
         $filecount = count($files);
        }
        return $filecount;
    }
    

    $idproduct = $_GET['id'];
    $sql = "SELECT * FROM product where id_product = '$idproduct'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    ?>
    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">      
            <div class="row">
                <div class="col-lg-5">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <?php 
                                     $filecount = countFile("./manage/admin/product/product$id/");
                                     for($i=0 ; $i<$filecount ; $i++){?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="active"></li>   
                                    <?php }
                                    ?>
                                
                                    </ol>
                                    <div class="carousel-inner">
                                    <?php
                                   $filecount = countFile("./manage/admin/product/product$id/");
                                    for($i=0 ; $i<$filecount ; $i++){
                                        if($i==0){?>
                                            <div class="carousel-item active">
                                      <?php  }else{?>
                                        <div class="carousel-item ">
                                      <?php } ?> 
                                        <img class="d-block w-100" style="width:100%; height:45vh;border-radius:15px;" src="../../manage/admin/product/product<?php echo$id;?>/product<?php echo $i; ?>.png" alt="First slide" >
                                        </div> 
                                    <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>     
                        </article>
                    </div>
                </div>
                <div class="col-lg-7">    
                    <div class="blog_right_sidebar">  
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title"><?php echo ucwords($row['nama']); ?></h3>                         
                            <div class="media post_item">
                            <div class="col-lg-2"> 
                                <p>Harga  </p>
                            </div>
                                <div class="media-body align-right">
                                    <h2 style="color:#dd443c">Rp <?php echo number_format($row['harga']); ?></h2>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="media post_item">
                            <div class="col-lg-2"> 
                                <p>Stock  </p>
                            </div>
                                <div class="media-body align-right">
                                    <a href="single-blog.html">
                                    <h3><?php echo ucwords($row['stock']); ?></h3>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="media post_item">
                            <div class="col-lg-2"> 
                                <p>Varian  </p>
                            </div>
                            <div class="col-lg-5"> 
                               <div class="flex-container align-right">
                                    <?php $filecount = countFile("./manage/admin/varianmodel/varian$id/");
                                for($a=0 ; $a<$filecount ; $a++){?>
                                    <a > <img id="mImg<?php echo $a; ?>" src="../../manage/admin/varianmodel/varian<?php echo $id;?>/varian<?php echo $a; ?>.png" class="rounded-circle" alt="Varian <?php echo $a+1; ?>" width="50" height="50"> </a>
                                    <div id="mModal" class="modal">                       
                                    <img class="modal-content" id="img1">
                                    <span class="close1">&times;</span>
                                    <div id="caption"></div>
                                    </div>
                                    <script>
                                    // Get the modal
                                    var modal = document.getElementById("mModal");

                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("mImg<?php echo $a; ?>");
                                    var modalImg = document.getElementById("img01");
                                    var captionText = document.getElementById("caption");
                                    img.onclick = function(){
                                    modal.style.display = "block";
                                    modalImg.src = this.src;
                                    captionText.innerHTML = this.alt;
                                    }

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close1")[0];

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() { 
                                    modal.style.display = "none";
                                    }
                                    </script>
                                <?php }
                                ?>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div class="media post_item">
                            <div class="col-lg-2"> 
                                <p>Model  </p>
                                </div>
                                <div class="col-lg-5"> 
                               <div class="flex-container align-right">
                               
                                    <?php $filecount = countFile("./manage/admin/varianmodel/model$id/");
                                for($a=0 ; $a<$filecount ; $a++){?>
                                    <a > <img id="myImg<?php echo $a; ?>" src="../../manage/admin/varianmodel/model<?php echo $id;?>/model<?php echo $a; ?>.png" class="rounded-circle" alt="Model <?php echo $a+1; ?>" width="50" height="50"> </a>
                                                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">                       
                                    <img class="modal-content" id="img01">
                                    <span class="close">&times;</span>
                                    <div id="caption"></div>
                                    </div>
                                    <script>
                                    // Get the modal
                                    var modal = document.getElementById("myModal");

                                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                                    var img = document.getElementById("myImg<?php echo $a; ?>");
                                    var modalImg = document.getElementById("img01");
                                    var captionText = document.getElementById("caption");
                                    img.onclick = function(){
                                    modal.style.display = "block";
                                    modalImg.src = this.src;
                                    captionText.innerHTML = this.alt;
                                    }

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() { 
                                    modal.style.display = "none";
                                    }
                                    </script>
                                <?php }
                                ?>
                                </div>
                            </div>
                            </div> 
                            <div class="media post_item">
                        </aside>                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mt-0">
                <hr>
                <a href="javascript:void(0)" class="genric-btn default">Deskripsi</a>
                <hr>
                </div>
                <div class="col-lg-12 mb-5 mt-0">
                <?php 
                echo $row['description'];
                ?>
                </div>
            </div>           
        </div>
    </section>

    <footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href="/home/"> <img src="../../img/footerlogo.png" alt=""> </a>
                    <p align="justify">Cv. Mitra Surya Mandiri Sukses merupakan perusahaan yang berlokasi di Batam (Indonesia) yang bergerak di bidang flooring dan interior sejak 2003.
                    </p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Best Services</h4>
                    <div class="contact_info">
                        <ul>
                        <li>
                                <a href="/services/">Interior Design</a>
                            </li>
                            <li>
                                <a href="/services/">Vinyl Flooring</a>
                            </li>
                            <li>
                                <a href="/services/">Carpet</a>
                            </li>
                            <li>
                                <a href="/services/">Epoxy</a>
                            </li>
                            <li>
                                <a href="/services/">Wallpaper</a>
                            </li>
                            <li>
                                <a href="/services/">Painting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Contact info</h4>
                    <div class="contact_info"> 
                        <p>Jl. Komp. Business Centre No.13-14, Lubuk Baja Kota, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444</p>
                        <p><span> Phone :</span> (0778) 433 187 </p>
                        <p><span> WhatsApp :</span> <a href="https://wa.me/6282169337787?text=Halo, saya ingin berbicara lanjut tentang product mitra sukses" target=_>0821 6933 7787</a> </p>
                        <p><span> Line :</span> <a href="http://line.me/ti/p/~yenayou23" target=_></i>yenayou23</a> </p>
                        <p><span> Email : </span>sales@mitrasurya.co.id </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> MSMS. All rights reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
   <!-- footer part end-->
    <!-- jquery plugins here-->
    <!-- jquery -->
  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../../js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="../../js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="../../js/swiper.min.js"></script>
    <!-- isotope js -->
    <script src="../../js/isotope.pkgd.min.js"></script>
    <!-- particles js -->
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="../../js/slick.min.js"></script>
    <script src="../../js/jquery.counterup.min.js"></script>
    <script src="../../js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="../../js/custom.js"></script>