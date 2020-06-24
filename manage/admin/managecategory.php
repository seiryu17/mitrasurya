<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <h2>Manage Category</h2>
                    <form method="post">
                    <button id='addcategory' name='addcategory' type ='submit' class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </form>
                    <br>
                    <?php if (isset($_POST['ubahcategory'])){ 
                        
                        $id = $_POST['idcategory'];
                        $nama = $_POST['namacategory'];
                        $sql ="update category_product set nama = '$nama' where id_category = '$id'";
                        $hasil = mysqli_query($conn,$sql);
                        $dateket = date("Y-m-d h:i:sa");
                        if ($hasil) { 
                            $sql ="update category_product set lastupdate = '$dateket' where id_category = '$id'";
                            $hasil = mysqli_query($conn,$sql);?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Category berhasil diedit.
                                  <meta http-equiv='refresh' content='0.005'>
                                </div>
                            </section>
                        <?php }
                    }?> 
                        <?php if (isset($_POST['simpancategory'])){ 
                        
                        $nama = $_POST['namacategory'];
                        $dateket = date("Y-m-d h:i:sa");
                        $sql ="INSERT INTO category_product (nama, lastupdate, createdby) VALUES ('$nama', '$dateket', 'Rio')";
                        $hasil = mysqli_query($conn,$sql);
                        if ($hasil) { ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Category berhasil ditambah.
                                  <meta http-equiv='refresh' content='0.005'>
                                </div>
                            </section>
                        <?php }
                    }?> 
                     <?php if (isset($_POST['deletecategory'])){ 
                        
                        $id = $_POST['idcategory'];
                        $sql4 ="select * from product where id_category = '$id' ";
                        $hasil4 = mysqli_query($conn,$sql4);
                        while($row4 = mysqli_fetch_array($hasil4)){
                        rrmdir('./product/product'.$row4['id_product'].'');
                        rrmdir('./varianmodel/varian'.$row4['id_product'].'');
                        rrmdir('./varianmodel/model'.$row4['id_product'].'');
                        }
                        $sql3 ="delete from product where id_category = '$id' ";
                        $hasil3 = mysqli_query($conn,$sql3);
                        $sql2 ="delete from subcategory_product where id_category = '$id' ";
                        $hasil2 = mysqli_query($conn,$sql2);
                        $sql ="delete from category_product where id_category = '$id' ";
                        $hasil = mysqli_query($conn,$sql);
                        if ($hasil) {
                             ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Category berhasil didelete.
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
                                                <th>Category Name</th>
                                                <th>View</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                            $sql = "SELECT * FROM category_product";
                                                            $result = $conn->query($sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                                $timestamp = strtotime($row['lastupdate']);
                                                                $new_date = date("d-m-Y h:i:sa", $timestamp);
                                                                echo "<tr>";
                                                                echo "<td>" .$row['id_category']. "</td>";  
                                                                echo "<td>" .$row['nama']. "</td>";  
                                                                echo "<td><a href='managesubcategory.php?category=".$row['id_category']."'><button id='view' name='view' type ='submit' class='btn btn-primary btn-sm rounded-s'><aria-hidden='true'>View Sub-Categories</button></a></td>";
                                                                echo "<td><form method='post'>";
                                                                echo "<button id='editcategory' name='editcategory' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
                                                                <button id='deletecategory' name='deletecategory' type ='submit' class='btn btn-primary btn-sm rounded-s' onClick='return doconfirm();'><span class='fa fa-trash' aria-hidden='true'></span> Delete</button>";
                                                                echo "<input class='form-control' type ='hidden' id='idcategory' maxlength='2'  name='idcategory' value='".$row["id_category"]."' />";
                                                                echo "<input class='form-control' type ='hidden' id='namacategory' maxlength='2'  name='namacategory' value='".$row["nama"]."' />";
                                                                echo "</form></td>";
                                                                echo "</tr>";
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                                    <?php if (isset($_POST['addcategory'])){?>
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
                                                                                    <label for="text-input" class=" form-control-label">Category</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namacategory" name="namacategory" class="form-control">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                            
                                                                    </div>
                                                                            <div class="card-footer">
                                                                                <button id="simpancategory" name="simpancategory" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>                                              
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                    <?php  } ?>
                                                    <?php if (isset($_POST['editcategory'])){?>
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
                                                                                    <input type="text" id="namacategory" name="namacategory" class="form-control" value="<?php echo $_POST['namacategory']; ?>"/>                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                            
                                                                    </div>
                                                                            <div class="card-footer">
                                                                                <button id="ubahcategory" name="ubahcategory" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>    
                                                                            <input class='form-control' type ='hidden' id='idcategory' maxlength='2'  name='idcategory' value="<?php echo $_POST['idcategory']; ?>" />                                        
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
