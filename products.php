<!doctype html>
<html lang="en">

<head>
<?php include './partials/header.php'; ?>
<?php include "./manage/admin/config.php"; ?>  
</head>

<body onload="loadDoc0();">


    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-6">
                    <div class="breadcrumb_tittle text-left">
                        <h2>Products</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="breadcrumb_content text-right">
                        <p>Home<span>/</span>Products</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- product start-->
    <section class="our_service padding_top2 padding_bottom2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                <div class="blog_right_sidebar">
                        <!--<aside class="single_sidebar_widget search_widget">
                            <form action="" method="POST">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" class="form-control" placeholder='Search Keyword' id="searchform" name="searchform"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">                                  
                                  </div>
                               </div>
                               <button class="genric-btn danger circle btn_1 block" id="search" name="search" type="submit">Search</button>
                            </form>
                         </aside>-->
                       
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <div class="overflowTest">
                            <ul class="list cat-list">
                                <nav class="navigation">
                                <?php
                                $sql = "SELECT * FROM category_product";
                                $result = $conn->query($sql);
                                $a=-1;
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                <ul class="mainmenu">
                                    <li><a><b><?php echo $row['nama']; ?></b></a><hr>
                                    <?php
                                $sql2 = "SELECT * FROM subcategory_product where id_category = ".$row['id_category']."";
                                $result2 = $conn->query($sql2);  
                                while($row2 = mysqli_fetch_array($result2)){
                                    $a++;
                                ?>
                                    <ul class="submenu">               
                                        <li><a href="javascript:void(0)" onclick="loadDoc<?php echo $a; ?>()"><?php echo $row2['nama']; ?></a></li>
                                        
                                        <script>
                                        function loadDoc<?php echo $a; ?>() {
                                        var xhttp = new XMLHttpRequest();
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("demo").innerHTML = this.responseText;
                                            }
                                        };
                                        xhttp.open("GET", "/ajax.php?idcategory=<?php echo $row['id_category']; ?>&idsubcategory=<?php echo $row2['id_subcategory']; ?>", true);
                                        xhttp.send();
                                        }
                                        </script>

                                        
                                    </ul>
                                    <?php } ?>
                                    </li>
                                </ul>
                                <?php } ?>
                                </nav>                          
                            </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                        <p id="demo" ></p>
                    <br>
                </div>               
            </div>
        </div>
    </section>


    <?php include './partials/footer.php'; ?>
</body>

</html>