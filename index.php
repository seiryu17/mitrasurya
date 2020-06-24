<!doctype html>
<html lang="en">

<head>
<?php include "./partials/header.php" ?>
<?php include "./manage/admin/config.php" ?>
</head>
<body>
    <!--::header part start::-->

    <!-- Header part end-->

    <!-- banner part start-->
    <div id="nav" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <section class="banner_part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-xl-6">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h1>Make it simple<br>
                                        but <span>Significant</span> </h1>
                                    <p>Kami berpengalaman di bidang Vinyl , Karpet , Wallpaper dan Pengecatan.</p>
                                    <a href="/portfolio/" class="btn_1 genric-btn danger circle">View project </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </div>
            <div class="carousel-item">
            <section class="banner_part" style="  height: 800px;
                position: relative;
                overflow: hidden;
                background-image: url('../img/banner_img.jpg');
                background-repeat: no-repeat;
                background-size: content;
                background-position: center top; ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-xl-6">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h1>Contact <span>Us</span> </h1>
                                    <p><font color="white">Hubungi kami jika anda ingin berkunjung ke gallery kami.</font></p>
                                    <a href="/contactus/" class="btn_1 genric-btn danger circle">Contact Us </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <a class="carousel-control-prev" href="#nav" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#nav" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
   
 
    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_img">
                        <img src="../img/foto1.jpg" height="650px" width="500px" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_part_text">
                        <h2>CV. Mitra Surya Mandiri Sukses
                            </h2>
                        <ul>
                            <li>
                                <span class="fa fa-certificate fa-4x"></span>
                                <h3>Sertifikasi Perusahaan</h3>
                                <p>Kami sudah memiliki izin dan sertifikasi dalam bidang ini. </p>
                            </li>
                            <li>
                                <span class="fa fa-user fa-4x"></span>
                                <h3>Karyawan Profesional</h3>
                                <p>Kami juga memiliki karyawan yang handal dan profesional dalam menyelesaikan pekerjaan. </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!-- our_service start-->
    <section class="our_service padding_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="section_tittle">
                        <h2>Kenapa Kami ?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service">
                            <i class="fa fa-clock-o fa-4x" style="color:#dd443c;"></i>
                            <h4>Pengalaman</h4>
                            <p>Mempunyai pengalaman lebih dari 16 tahun untuk memenuhi keinginan pelanggan.</p>
                            <a href="#" class="btn_3"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service">
                            <i class="fa fa-check-circle fa-4x" style="color:#dd443c;"></i>
                            <h4>Garansi</h4>
                            <p>Memberikan garansi atas hasil pekerjaan.</p>
                            <a href="#" class="btn_3"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_feature">
                        <div class="single_service single_service_2">
                            <i class="fa fa-money fa-4x" style="color:#dd443c;"></i>
                            <h4>Harga</h4>
                            <p>Memberikan harga yang kompetitif dengan pelayanan yang sangat baik.</p>
                            <a href="#" class="btn_3"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_service part end-->

    <!-- about part start-->
    <section class="about_part experiance_part section_padding">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_text">
                        <h2>Kami Sangat Berpengalaman</h2>
                        <p>Kami sudah memiliki banyak customer yang mempercayai kami untuk penanganan flooring dan interior sejak 2003.</p>
                        <div class="about_text_iner">
                            <div class="about_text_counter">
                                <h2><?php 
                                $tahunbuka = "2003";
                                $tahunskrg = date("Y");
                                echo $tahunbuka = intval($tahunskrg) - intval($tahunbuka);
                                ?></h2>
                            </div>
                            <div class="about_iner_content">
                                <h3>year <span>of Experience</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="about_part_img">
                    <img src="../img/foto2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->
  


    <?php
            $sql = "SELECT * FROM home";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result)   
    ?>
     <!-- member_counter counter start -->
     <section class="member_counter padding_bottom padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_counter_icon">
                        <img src="../img/icon/Icon_1.svg" alt="">
                    </div>
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $row['client']; ?></span>
                        <h4> <span>Satisfied</span> Client</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_counter_icon">
                        <img src="../img/icon/Icon_3.svg" alt="">
                    </div>
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $row['project']; ?></span>
                        <h4> <span>Total</span> Projects</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_counter_icon">
                        <img src="../img/icon/Icon_4.svg" alt="">
                    </div>
                    <div class="single_member_counter">
                        <span class="counter"><?php echo $row['finish']; ?></span>
                        <h4> <span>Work</span> Finished</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- member_counter counter start -->
      
            <section class="member_counter  padding_bottom">
                <div class="container">
                <div class="row">
                <div class="col-xl-5">
                        <div class="section_tittle">
                                <h2>Profile Kami</h2>
                            </div>
                        </div>
                </div>
                    <div class="row">
                        <img src="../img/profilehistory.png" alt="">
                    </div>
                </div>
            </section>
    
   

    <!-- footer part start-->
    <?php include "./partials/footer.php" ?>
    <!-- footer part end-->

</body>

</html>