<!doctype html>
<html lang="en">

<head>
<?php include './partials/header.php'; ?>
<?php include "./manage/admin/config.php"; ?>    
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
                        <h2>Portfolio</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Portfolio</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- our_project part start-->
    <section class="our_project section_padding" id="portfolio">
        <div class="container">
            <div class="row justify-content-between">
                <!--<div class="col-lg-5 col-sm-10">
                    <div class="section_tittle">
                    </div>
                </div>
                 <div class="col-lg-6 col-sm-10">
                    <div class="filters portfolio-filter project_menu_item">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                           <li data-filter=".perusahaan">Perusahaan</li>
                            <li data-filter=".rebuild">Rebuild</li>
                            <li data-filter=".architecture">Architecture</li>
                        </ul>
                    </div>
                </div>-->
            </div>
            <div class="filters-content">
                        <div class="row justify-content-between portfolio-grid">
            <?php
                $sql = "SELECT * FROM portfolio order by id_portfolio DESC";
                $result = $conn->query($sql);
                while($row = mysqli_fetch_array($result)){?>
      
                            <div class="col-lg-4 col-sm-6 all mb-4" style="width:400px;height:400px;">
                                <div class="single_our_project">
                                    <div class="single_offer">
                                        <img src="../manage/admin/upload/<?php echo $row['id_portfolio']; ?>.jpg" alt="foto<?php echo $row['id_portfolio'] ?> " style="width:400px;height:400px;">
                                        <div class="hover_text">
                                            <p><?php echo $row['jenis']; ?></p>
                                            <a ><h2><?php echo $row['nama']; ?></h2></a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                   

                    <?php
                }
            ?>

</div>
                    </div>
        </div>
    </section>
    <!-- our_project part end-->

    <!-- footer part start-->
    <?php include './partials/footer.php'; ?>    
</body>

</html>