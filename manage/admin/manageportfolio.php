<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <h2>Manage Portfolio</h2>
                    <form method="post">
                    <button id='addportfolio' name='addportfolio' type ='submit' class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </form>
                    <br>
                    <?php if(isset($_POST['submitgambar'])){
                         $filename = $_FILES["fileToUpload"]["name"];
                         $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                         $file_ext = substr($filename, strripos($filename, '.')); // get file name
                         $filesize = $_FILES["fileToUpload"]["size"];
                         $allowed_file_types = array('.jpg','.JPG');	
                        
                         //5.000.000 = 5mb
                         if (in_array($file_ext,$allowed_file_types) && ($filesize < 10000000))
                         {	
                             // Rename file
                                $dateket = date("Y-m-d h:i:sa");
                                $nama = $_POST['namaportfolio'];
                                $jenis = $_POST['jenisportfolio'];
                                $sql ="INSERT INTO portfolio (nama, jenis, lastupdate) VALUES ('$nama','$jenis', '$dateket')";
                                $hasil = mysqli_query($conn,$sql);
                                $last_id = $conn->insert_id;
                                $newfilename = $last_id . $file_ext;
								compress($_FILES["fileToUpload"]["tmp_name"], "upload/".$newfilename, 80);
                                 ?>
                                <section class="section">
                                    <div class="alert alert-success alert-dismissable">
                                        <strong>Success!</strong> Portfolio berhasil ditambah & gambar berhasil diupload.
                                    </div>
                                </section>	
                                
                                 <?php
                         }
                         elseif (empty($file_basename))
                         {	?>
                                <section class="section">
                                    <div class="alert alert-danger alert-dismissable">
                                        <strong>Error!</strong> Silahkan pilih gambar yang ingin diupload.
                                    </div>
                                </section>
                             <?php
                         }  
                         elseif ($filesize > 10000000)
                         {	
                            ?>
                            <section class="section">
                                <div class="alert alert-danger alert-dismissable">
                                    <strong>Error!</strong> File gambar melebihi ukuran yang ditentukan.
                                </div>
                            </section>
                         <?php
                         }
                         else
                         {
                             // file type error
                             ?>
                             <section class="section">
                                <div class="alert alert-danger alert-dismissable">
                                    <strong>Error!</strong> Format gambar hanya boleh .JPG.
                                </div>
                            </section>
                             <?php     
                             unlink($_FILES["fileToUpload"]["tmp_name"]);
                         }
                    } ?>  
                    <?php if (isset($_POST['ubahportfolio'])){ 
                        if (empty($_FILES['fileToUpload']['name'])) {
                            $dateket = date("Y-m-d h:i:sa");
                            $id_portfolio = $_POST['id_portfolio'];
                            $nama = $_POST['namaportfolio'];
                            $jenis = $_POST['jenisportfolio'];
                            $sql ="UPDATE portfolio set nama = '$nama' , jenis = '$jenis' ,  lastupdate = '$dateket' where id_portfolio = '$id_portfolio'";
                            $hasil = mysqli_query($conn,$sql);
                        }else{
                            $filename = $_FILES["fileToUpload"]["name"];
                            $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                            $file_ext = substr($filename, strripos($filename, '.')); // get file name
                            $filesize = $_FILES["fileToUpload"]["size"];
                            $allowed_file_types = array('.JPG','.jpg');	
                           
                            //5.000.000 = 5mb
                            if (in_array($file_ext,$allowed_file_types) && ($filesize < 10000000))
                            {	
                                // Rename file
                                   $dateket = date("Y-m-d h:i:sa");
                                   $id_portfolio = $_POST['id_portfolio'];
                                   $nama = $_POST['namaportfolio'];
                                   $sql ="UPDATE portfolio set nama = '$nama' , lastupdate = '$dateket' where id_portfolio = '$id_portfolio'";
                                   $hasil = mysqli_query($conn,$sql);
                                   $newfilename = $id_portfolio . $file_ext;
                                   
                                   compress($_FILES["fileToUpload"]["tmp_name"], "upload/".$newfilename, 80);
                                    ?>
                                   <section class="section">
                                       <div class="alert alert-success alert-dismissable">
                                           <strong>Success!</strong> Portfolio berhasil diedit & gambar berhasil diedit.
                                       </div>
                                   </section>	
                                   <meta http-equiv='refresh' content='0.005'>
                                    <?php
                            }
                            elseif (empty($file_basename))
                            {	?>
                                   <section class="section">
                                       <div class="alert alert-danger alert-dismissable">
                                           <strong>Error!</strong> Silahkan pilih gambar yang ingin diupload.
                                       </div>
                                   </section>
                                <?php
                            }  
                            elseif ($filesize > 10000000)
                            {	
                               ?>
                               <section class="section">
                                   <div class="alert alert-danger alert-dismissable">
                                       <strong>Error!</strong> File gambar melebihi ukuran yang ditentukan.
                                   </div>
                               </section>
                            <?php
                            }
                            else
                            {
                                // file type error
                                ?>
                                <section class="section">
                                   <div class="alert alert-danger alert-dismissable">
                                       <strong>Error!</strong> Format gambar hanya boleh .JPG.
                                   </div>
                               </section>
                                <?php     
                                unlink($_FILES["fileToUpload"]["tmp_name"]);
                            }
                        }
                        
                    }?> 
                     <?php if (isset($_POST['deleteportfolio'])){ 
                        
                        $id = $_POST['id_portfolio'];
                        $sql2 ="delete from portfolio where id_portfolio = '$id' ";
						
                        $hasil2 = mysqli_query($conn,$sql2);
                        if ($hasil2) {
                            unlink("./upload/$id.jpg"); ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Category berhasil didelete.
                                </div>
                            </section>
                            <meta http-equiv='refresh' content='0.005'>
                        <?php }
                    }?>     
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th>Id.</th>
                                                <th>Portfolio Name</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                            $sql = "SELECT * FROM portfolio";
                                                            $result = $conn->query($sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                                $timestamp = strtotime($row['lastupdate']);
                                                                $new_date = date("d-m-Y h:i:sa", $timestamp);
                                                                echo "<tr>";
                                                                echo "<td>" .$row['id_portfolio']. "</td>";  
                                                                echo "<td>" .$row['nama']. "</td>";  
                                                                echo "<td><form method='post'>";
                                                                echo "<button id='editportfolio' name='editportfolio' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
                                                                <button id='deleteportfolio' name='deleteportfolio' type ='submit' class='btn btn-primary btn-sm rounded-s' onClick='return doconfirm();'><span class='fa fa-trash' aria-hidden='true'></span> Delete</button>";
                                                                echo "<input class='form-control' type ='hidden' id='namaportfolio' maxlength='2'  name='namaportfolio' value='".$row["nama"]."' />";
                                                                echo "<input class='form-control' type ='hidden' id='id_portfolio' maxlength='2'  name='id_portfolio' value='".$row["id_portfolio"]."' />";
                                                                echo "</form></td>";
                                                                echo "</tr>";
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                                    <?php if (isset($_POST['addportfolio'])){?>
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
                                                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namaportfolio" name="namaportfolio" class="form-control">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Jenis</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="jenisportfolio" name="jenisportfolio" class="form-control">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Gambar</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="file" id="fileToUpload" accept="image/jpeg" name="fileToUpload" class="form-control-file">                                                     
                                                                                </div>
                                                                            </div>                                                                                                                                                                                     
                                                                    </div>
                                                                    
                                                                            <div class="card-footer">
                                                                                <button id="submitgambar" name="submitgambar" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>                                              
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                    <?php  } ?>
                                                    <?php if (isset($_POST['editportfolio'])){
                                                         $sql = "SELECT * FROM portfolio where id_portfolio = ".$_POST['id_portfolio']."";
                                                         $result = $conn->query($sql);
                                                         $row = mysqli_fetch_array($result)
                                                        ?>
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
                                                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="namaportfolio" name="namaportfolio" class="form-control" value="<?php echo $row['nama']; ?>">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Jenis</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="jenisportfolio" name="jenisportfolio" class="form-control" value="<?php echo $row['jenis']; ?>">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Gambar</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                <img src ="./upload/<?php echo $row['id_portfolio']; ?>.jpg" style="width:150px;height:150px;border:1px solid black;" data-toggle='modal' data-target='#exampleModal' >
                                                                                              <!-- Modal -->
                                                                                            <div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                                                <div class='modal-content'>                                                                        
                                                                                                <div class='modal-body'>
                                                                                                    <img src='./upload/<?php echo $row['id_portfolio']; ?>.jpg'>
                                                                                                </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            </div>
                                                                                
                                                                                    <input type="file" id="fileToUpload" accept="image/jpeg" name="fileToUpload" class="form-control-file">                                                     
                                                                                </div>
                                                                            </div>                                                                                                                                                                                     
                                                                    </div>
                                                                    
                                                                            <div class="card-footer">
                                                                            <input class='form-control' type ='hidden' id='id_portfolio' maxlength='2'  name='id_portfolio' value='<?php echo $row['id_portfolio'] ?>' />
                                                                                <button id="ubahportfolio" name="ubahportfolio" type="submit" class="btn btn-primary btn-sm">
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
