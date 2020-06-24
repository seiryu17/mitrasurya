<?php include "partials/header.php" ?>
<?php include "config.php" ?>
                                                    <div class="main-content">
                                                        <div class="section__content section__content--p30">
                                                            <div class="container-fluid">
                                                                
                                                    <?php if (isset($_POST['addproduct'])){ 
                                                        $nama = $_POST['namaproduct'];
                                                        $harga = $_POST['hargaproduct'];
                                                        $stock = $_POST['stockproduct'];
                                                        $description = $_POST['description'];
                                                        $dateket = date("Y-m-d h:i:sa");
                                                        $idcategory = $_GET['category'];
                                                        $idsubcategory = $_GET['subcategory'];

                                                        $sql ="INSERT INTO product (nama, harga, stock, description, lastupdate,id_category,id_subcategory) VALUES ('$nama', '$harga', '$stock','$description','$dateket','$idcategory','$idsubcategory')";
                                                        $hasil = mysqli_query($conn,$sql);
                                                        $last_id = mysqli_insert_id($conn);?>							
                                                            <section class="section">
                                                                <div class="alert alert-success alert-dismissable">
                                                                <strong>Success!</strong> Product berhasil ditambah.
                                                                <meta http-equiv='refresh' content='0.005'>
                                                                </div>
                                                            </section>
                                                        <?php 
                                                              // Count total files
                                                              $name_array = $_FILES['fileproduct']['name'];
                                                              $tmp_name_array = $_FILES['fileproduct']['tmp_name'];
                                                              // Number of files
                                                              $count_tmp_name_array = count($tmp_name_array);
  
                                                            if (!file_exists("product/product$last_id")) {
                                                                mkdir("product/product$last_id", 0777, true);
                                                            }
                                                              // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                              $static_final_name = "product";
  
                                                              for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                  // Get extension of current file
                                                                  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                  $filesize = $_FILES["fileproduct"]["size"];
                                                                  $allowed_file_types = array('png');	
                                                                  // Pay attention to $static_final_name 
                                                                  if(in_array($extension,$allowed_file_types)){
                                                                      if(compress($tmp_name_array[$i], "product/product$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                      } else {
                                                                          echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                      }
                                                                  }
                                                                  elseif($_FILES['fileproduct']['error'] != UPLOAD_ERR_NO_FILE){
                                                                  }else{
                                                                      ?>
                                                                          <section class="section">
                                                                              <div class="alert alert-danger alert-dismissable">
                                                                              <strong>Error!</strong> Gambar product gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                              </div>
                                                                          </section>
                                                                      <?php
                                                                  }
                                                              }


                                                            // Count total files
                                                            $name_array = $_FILES['filevarian']['name'];
                                                            $tmp_name_array = $_FILES['filevarian']['tmp_name'];
                                                            // Number of files
                                                            $count_tmp_name_array = count($tmp_name_array);

                                                          if (!file_exists("varianmodel/varian$last_id")) {
                                                              mkdir("varianmodel/varian$last_id", 0777, true);
                                                          }
                                                            // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                            $static_final_name = "varian";

                                                            for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                // Get extension of current file
                                                                $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                $filesize = $_FILES["filevarian"]["size"];
                                                                $allowed_file_types = array('png');	
                                                                // Pay attention to $static_final_name 
                                                                if(in_array($extension,$allowed_file_types)){
                                                                    if(compress($tmp_name_array[$i], "varianmodel/varian$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                    } else {
                                                                        echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                    }
                                                                }
                                                                elseif($_FILES['filevarian']['error'] != UPLOAD_ERR_NO_FILE){
                                                                 }else{
                                                                    ?>
                                                                        <section class="section">
                                                                            <div class="alert alert-danger alert-dismissable">
                                                                            <strong>Error!</strong> Gambar varian gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                            </div>
                                                                        </section>
                                                                    <?php
                                                                }
                                                            }

                                                              // Count total files
                                                              $name_array = $_FILES['filemodel']['name'];
                                                              $tmp_name_array = $_FILES['filemodel']['tmp_name'];
                                                              // Number of files
                                                              $count_tmp_name_array = count($tmp_name_array);

                                                            if (!file_exists("varianmodel/model$last_id")) {
                                                                mkdir("varianmodel/model$last_id", 0777, true);
                                                            }
                                                              // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                              $static_final_name = "model";

                                                              for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                  // Get extension of current file
                                                                  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                  $filesize = $_FILES["filemodel"]["size"];
                                                                    $allowed_file_types = array('png');	
                                                                    
                                                                  // Pay attention to $static_final_name 
                                                                  if(in_array($extension,$allowed_file_types)){
                                                                  if(compress($tmp_name_array[$i], "varianmodel/model$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                  } else {
                                                                    echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                  }
                                                                }elseif($_FILES['filemodel']['error'] != UPLOAD_ERR_NO_FILE){
                                                                 }else{?>
                                                                       <section class="section">
                                                                            <div class="alert alert-danger alert-dismissable">
                                                                            <strong>Error!</strong> Gambar model gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                            </div>
                                                                        </section>
                                                                    <?php
                                                                  }
                                                              }
                                                              
                                                    }?>
                                                    <?php if (isset($_POST['ubahproduct'])){ 
                                                        $nama = $_POST['namaproduct'];
                                                        $harga = $_POST['hargaproduct'];
                                                        $stock = $_POST['stockproduct'];
                                                        $description = $_POST['description'];
                                                        $dateket = date("Y-m-d h:i:sa");

                                                        $sql ="UPDATE product SET nama = '$nama',harga = '$harga', stock = '$stock', description = '$description', lastupdate = '$dateket' where id_product = ".$_GET['id']."";
                                                        $hasil = mysqli_query($conn,$sql);
                                                        $last_id = $_GET['id'];?>							
                                                            <section class="section">
                                                                <div class="alert alert-success alert-dismissable">
                                                                <strong>Success!</strong> Product berhasil diedit.
                                                                </div>
                                                            </section>
                                                        <?php 
                                                             // Count total files
                                                             $name_array = $_FILES['fileproduct']['name'];
                                                             $tmp_name_array = $_FILES['fileproduct']['tmp_name'];
                                                             // Number of files
                                                             $count_tmp_name_array = count($tmp_name_array);
 
                                                           if (!file_exists("product/product$last_id")) {
                                                               mkdir("product/product$last_id", 0777, true);
                                                           }
                                                             // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                             $static_final_name = "product";
 
                                                             for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                 // Get extension of current file
                                                                 $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                 $filesize = $_FILES["fileproduct"]["size"];
                                                                 $allowed_file_types = array('png');	
                                                                 // Pay attention to $static_final_name 
                                                                 if(in_array($extension,$allowed_file_types)){
                                                                     if(compress($tmp_name_array[$i], "product/product$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                     } else {
                                                                         echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                     }
                                                                 }
                                                                 elseif($_FILES['fileproduct']['error'] != UPLOAD_ERR_NO_FILE){
                                                                 }else{
                                                                     ?>
                                                                         <section class="section">
                                                                             <div class="alert alert-danger alert-dismissable">
                                                                             <strong>Error!</strong> Gambar product gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                             </div>
                                                                         </section>
                                                                     <?php
                                                                 }
                                                             }


                                                            // Count total files
                                                            $name_array = $_FILES['filevarian']['name'];
                                                            $tmp_name_array = $_FILES['filevarian']['tmp_name'];
                                                            // Number of files
                                                            $count_tmp_name_array = count($tmp_name_array);

                                                          if (!file_exists("varianmodel/varian$last_id")) {
                                                              mkdir("varianmodel/varian$last_id", 0777, true);
                                                          }
                                                            // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                            $static_final_name = "varian";

                                                            for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                // Get extension of current file
                                                                $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                $filesize = $_FILES["filevarian"]["size"];
                                                                $allowed_file_types = array('png');	
                                                                // Pay attention to $static_final_name 
                                                                if(in_array($extension,$allowed_file_types)){
                                                                    if(compress($tmp_name_array[$i], "varianmodel/varian$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                    } else {
                                                                        echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                    }
                                                                }elseif($_FILES['filevarian']['error'] != UPLOAD_ERR_NO_FILE){}
                                                                else{
                                                                    ?>
                                                                        <section class="section">
                                                                            <div class="alert alert-danger alert-dismissable">
                                                                            <strong>Error!</strong> Gambar varian gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                            </div>
                                                                        </section>
                                                                    <?php
                                                                }
                                                            }

                                                              // Count total files
                                                              $name_array = $_FILES['filemodel']['name'];
                                                              $tmp_name_array = $_FILES['filemodel']['tmp_name'];
                                                              // Number of files
                                                              $count_tmp_name_array = count($tmp_name_array);

                                                            if (!file_exists("varianmodel/model$last_id")) {
                                                                mkdir("varianmodel/model$last_id", 0777, true);
                                                            }
                                                              // We define the static final name for uploaded files (in the loop we will add an number to the end)
                                                              $static_final_name = "model";

                                                              for($i = 0; $i < $count_tmp_name_array; $i++){
                                                                  // Get extension of current file
                                                                  $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
                                                                  $filesize = $_FILES["filemodel"]["size"];
                                                                    $allowed_file_types = array('png');	
                                                                    
                                                                  // Pay attention to $static_final_name 
                                                                  if(in_array($extension,$allowed_file_types)){
                                                                  if(compress($tmp_name_array[$i], "varianmodel/model$last_id/".$static_final_name.$i.".".$extension,80)){
                                                                  } else {
                                                                    echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                                                                  }
                                                                }
                                                                elseif($_FILES['filemodel']['error'] != UPLOAD_ERR_NO_FILE){
                                                                 }else{?>
                                                                       <section class="section">
                                                                            <div class="alert alert-danger alert-dismissable">
                                                                            <strong>Error!</strong> Gambar model gagal diupload, silahkan gunakan menu edit product untuk mengupload.
                                                                            </div>
                                                                        </section>
                                                                    <?php
                                                                  }
                                                              }
                                                              
                                                    }?>                                                 
                                                            <div class="row">
                                                            <div class="col-lg-6">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <?php if($_GET['opr'] == "add"){
                                                                            echo "<strong>Form Add</strong>";
                                                                        }else{
                                                                            echo "<strong>Form Edit</strong>";
                                                                        } ?>
                                                                        
                                                                    </div>
                                                                    <?php
                                                                    if($_GET['opr'] == "edit"){
                                                                    $idproduct = $_GET['id'];
                                                                    $sql = "SELECT * FROM product where id_product = $idproduct";
                                                                    $result = $conn->query($sql);
                                                                    $row = mysqli_fetch_array($result);
                                                                    }
                                                                    ?>
                                                                    <div class="card-body card-block">
                                                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namaproduct" name="namaproduct" required class="form-control" value="<?php if($_GET['opr'] != "add"){ echo $row['nama'];} ?>">                                                      
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Harga</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="number" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" id="hargaproduct" name="hargaproduct" required class="form-control" value="<?php if($_GET['opr'] != "add"){echo $row['harga'];} ?>">                                                      
                                                                                </div>
                                                                            </div>   
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Stock</label>
                                                                                </div>  
                                                                                <div class="col-12 col-md-9">
                                                                                    <?php if($_GET['opr'] == "add"){ ?>
                                                                                    <select id="stockproduct" name="stockproduct" class="form-control" >
                                                                                    <option  value="yes">yes</option>
                                                                                    <option  value="no">no</option>
                                                                                    </select>      
                                                                                    <?php }else{ 
                                                                                        if($row['stock']=="yes"){?> 
                                                                                            <select id="stockproduct" name="stockproduct" class="form-control" >
                                                                                            <option selected="selected" value="yes">yes</option>
                                                                                            <option value="no">no</option>
                                                                                            </select>  
                                                                                        <?php }else{?>
                                                                                            <select id="stockproduct" name="stockproduct" class="form-control" >
                                                                                            <option value="yes">yes</option>
                                                                                            <option selected="selected" value="no">no</option>
                                                                                            </select>  
                                                                                       <?php } } ?>                                   
                                                                                </div>
                                                                            </div>   
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="file-input" class=" form-control-label">Product (PNG ONLY)</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                <?php
                                                                                if($_GET['opr'] != 'add'){
                                                                                    $directory = "./product/product".$_GET['id']."/";
                                                                                    $filecount = 0;
                                                                                    $files = glob($directory . "*");
                                                                                    if ($files){
                                                                                        $filecount = count($files);
                                                                                        for($a=0;$a<$filecount;$a++){  ?>
                                                                                            <img src ="./product/product<?php echo $_GET['id'];?>/product<?php echo $a;?>.png" style="width:150px;height:150px;border:1px solid black;" data-toggle='modal' data-target='#exampleModalCenter<?php echo $a; ?>' >
                                                                                              <!-- Modal -->
                                                                                            <div class='modal fade' id='exampleModalCenter<?php echo $a; ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                                                <div class='modal-content'>                                                                        
                                                                                                <div class='modal-body'>
                                                                                                    <img src='./product/product<?php echo $_GET['id'];?>/product<?php echo $a;?>.png'>
                                                                                                </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                     <input type="file" name="fileproduct[]" id="fileproduct" accept="image/png"  class="form-control-file" multiple>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="file-input" class=" form-control-label">Varian (png ONLY)</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                <?php
                                                                                if($_GET['opr'] != 'add'){
                                                                                    $directory = "./varianmodel/varian".$_GET['id']."/";
                                                                                    $filecount = 0;
                                                                                    $files = glob($directory . "*");
                                                                                    if ($files){
                                                                                        $filecount = count($files);
                                                                                        for($a=0;$a<$filecount;$a++){  ?>
                                                                                            <img src ="./varianmodel/varian<?php echo $_GET['id'];?>/varian<?php echo $a;?>.png" style="width:150px;height:150px;border:1px solid black;" data-toggle='modal' data-target='#ModalCenter<?php echo $a; ?>' >
                                                                                              <!-- Modal -->
                                                                                            <div class='modal fade' id='ModalCenter<?php echo $a; ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                                                <div class='modal-content'>                                                                        
                                                                                                <div class='modal-body'>
                                                                                                    <img src='./varianmodel/varian<?php echo $_GET['id'];?>/varian<?php echo $a;?>.png'>
                                                                                                </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                     <input type="file" name="filevarian[]" id="filevarian" accept="image/png"  class="form-control-file" multiple>
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="file-input" class=" form-control-label">Model (png ONLY)</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                <?php
                                                                                if($_GET['opr'] != 'add'){
                                                                                    $directory = "./varianmodel/model".$_GET['id']."/";
                                                                                    $filecount = 0;
                                                                                    $files = glob($directory . "*");
                                                                                    if ($files){
                                                                                        $filecount = count($files);
                                                                                        for($a=0;$a<$filecount;$a++){  ?>
                                                                                            <img src ="./varianmodel/model<?php echo $_GET['id'];?>/model<?php echo $a;?>.png" style="width:150px;height:150px;border:1px solid black;" data-toggle='modal' data-target='#exampleModal<?php echo $a; ?>' >
                                                                                              <!-- Modal -->
                                                                                            <div class='modal fade' id='exampleModal<?php echo $a; ?>' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                                                <div class='modal-content'>                                                                        
                                                                                                <div class='modal-body'>
                                                                                                    <img src='./varianmodel/model<?php echo $_GET['id'];?>/model<?php echo $a;?>.png'>
                                                                                                </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                     <input type="file" name="filemodel[]" id="filemodel" accept="image/png" class="form-control-file" multiple>
                                                                                </div>
                                                                            </div> 
                                                                            
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Description</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="description" name="description" required class="form-control" value="<?php if($_GET['opr'] != "add"){echo $row['description'];} ?>">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                               
                                                                    </div>
                                                                            <div class="card-footer">
                                                                            <?php
                                                                                if($_GET['opr'] == "add"){
                                                                                echo'<button id="addproduct" name="addproduct" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button> ';
                                                                                }else{
                                                                                echo'<button id="ubahproduct" name="ubahproduct" type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button> ';
                                                                                }
                                                                            ?>                                                                            
                                                                            </div>
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
<script>
function goBack() {
  window.history.back();
}
</script>

<?php include "partials/footer.php" ?>