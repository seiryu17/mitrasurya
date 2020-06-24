<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <ul class="breadcrumb">
                    <li><a href="./managecategory.php">Manage Categories</a></li>
                    <li><b>Manage Sub-Categories</b></li>
                    </ul>
                    <h2>Manage Sub Category :
                    <?php 
                        $categoryid = $_GET['category'];
                        $sql2 = "SELECT * FROM category_product where id_category = $categoryid";
                        $result = $conn->query($sql2);  
                        $row = mysqli_fetch_array($result);
                        echo $row['nama'];        
                    ?>             
                    </h2>
                    <form method="post">
                    <button id='addsubcategory' name='addsubcategory' type ='submit' class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </form>
                    <br>
                    <?php if (isset($_POST['simpansubcategory'])){ 
                        
                        $nama = $_POST['namasubcategory'];
                        $dateket = date("Y-m-d h:i:sa");
                        $id_category = $_GET['category'];
                        $sql ="INSERT INTO subcategory_product (nama, lastupdate, createdby, id_category) VALUES ('$nama', '$dateket', 'Rio','$id_category')";
                        $hasil = mysqli_query($conn,$sql);
                        if ($hasil) { ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Sub Category berhasil ditambah.
                                  <meta http-equiv='refresh' content='0.005'>
                                </div>
                            </section>
                        <?php }
                    }?> 
                    <?php if (isset($_POST['ubahsubcategory'])){ 
                        
                        $id = $_POST['idsubcategory'];
                        $nama = $_POST['namasubcategory'];
                        $sql ="update subcategory_product set nama = '$nama' where id_subcategory = '$id'";
                        $hasil = mysqli_query($conn,$sql);
                        $dateket = date("Y-m-d h:i:sa");
                        if ($hasil) { 
                            $sql ="update subcategory_product set lastupdate = '$dateket' where id_subcategory = '$id'";
                            $hasil = mysqli_query($conn,$sql);?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Sub Category berhasil diedit.
                                  <meta http-equiv='refresh' content='0.005'>
                                </div>
                            </section>
                        <?php }
                    }?>  
                    <?php if (isset($_POST['deletesubcategory'])){ 
                        
                        $id = $_POST['idsubcategory'];
                        $sql ="delete from subcategory_product where id_subcategory = '$id'";
                        $hasil = mysqli_query($conn,$sql);
                        if ($hasil) {
                            rrmdir('./product/product'.$id.'');
                            rrmdir('./varianmodel/varian'.$id.'');
                            rrmdir('./varianmodel/model'.$id.'');
                             ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Sub Category berhasil didelete.
                                  <meta http-equiv='refresh' content='0.005'>
                                </div>
                            </section>
                        <?php }
                    }?>                     
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Id.</th>
                                                <th>Sub-Category Name</th>
                                                <th>View</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php   $categoryid = $_GET['category'];
                                                            $sql = "SELECT * FROM subcategory_product where id_category = $categoryid";
                                                            $result = $conn->query($sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                                $timestamp = strtotime($row['lastupdate']);
                                                                $new_date = date("d-m-Y h:i:sa", $timestamp);
                                                                echo "<tr>";
                                                                echo "<td>" . $row['id_subcategory'] . "</td>";   
                                                                echo "<td>" . $row['nama'] . "</td>";     
                                                                echo "<td><a href='manageproducts.php?category=".$row['id_category']."&subcategory=".$row['id_subcategory']."'><button id='view' name='view' type ='submit' class='btn btn-primary btn-sm rounded-s'><aria-hidden='true'>View Products</button></a></td>";                                                   
                                                                echo "<form method='post'>";
                                                                echo "<td><button id='editsubcategory' name='editsubcategory' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
                                                                <button id='deletesubcategory' name='deletesubcategory' type ='submit' class='btn btn-primary btn-sm rounded-s' onClick='return doconfirm();'><span class='fa fa-trash' aria-hidden='true'></span> Delete</button>";
                                                                echo "<input class='form-control' type ='hidden' id='nama' maxlength='2'  name='nama' value='".$row["nama"]."' />";
                                                                echo "<input class='form-control' type ='hidden' id='idsubcategory' maxlength='2'  name='idsubcategory' value='".$row["id_subcategory"]."' />";
                                                                echo "</tr>";
                                                                echo "</form>";
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                                                    <?php if (isset($_POST['editsubcategory'])){?>
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <strong>Form Edit</strong>
                                                                    </div>
                                                                    <div class="card-body card-block">
                                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Sub Category</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namasubcategory" name="namasubcategory" class="form-control" value="<?php echo $_POST['nama']; ?>">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                            
                                                                    </div>
                                                                            <div class="card-footer">
                                                                                <button id="ubahsubcategory" name="ubahsubcategory" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>
                                                                            <input class='form-control' type ='hidden' id='idsubcategory' maxlength='2'  name='idsubcategory' value="<?php echo $_POST['idsubcategory']; ?>" />
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                    <?php  } ?>
                                                    <?php if (isset($_POST['addsubcategory'])){?>
                                                            <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <strong>Form Add</strong>
                                                                    </div>
                                                                    <div class="card-body card-block">
                                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Sub Category</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namasubcategory" name="namasubcategory" class="form-control">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                            
                                                                    </div>
                                                                            <div class="card-footer">
                                                                                <button id="simpansubcategory" name="simpansubcategory" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>                                              
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                    <?php  } ?>
                                                    
                    </div>
                </div>  
            </div>   
            <!-- END CONTENT-->
            
 <?php include "partials/footer.php" ?>
