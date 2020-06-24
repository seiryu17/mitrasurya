<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <h2>Manage Home</h2>
                    <br>
                    <?php if (isset($_POST['submitcounter'])){ 
						
                        $client = $_POST['text-client'];
                        $project = $_POST['text-project'];
                        $finish = $_POST['text-finish'];
                        
                        $sql ="update home set client = '$client', project = '$project', finish = '$finish'";
                        $hasil = mysqli_query($conn,$sql);
                        $dateket = date("Y-m-d h:i:sa");
                        if ($hasil) { 
                            $sql ="update home set lastupdate = '$dateket' where id = '1'";
                            $hasil = mysqli_query($conn,$sql);?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Counter berhasil diedit.
                                </div>
                            </section>
                        <?php }
                    }?>
                    <?php if(isset($_POST['submitgambar'])){
                         $filename = $_FILES["fileToUpload"]["name"];
                         $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                         $file_ext = substr($filename, strripos($filename, '.')); // get file name
                         $filesize = $_FILES["fileToUpload"]["size"];
                         $allowed_file_types = array('.jpg');	
                        
                         //5.000.000 = 5mb
                         if (in_array($file_ext,$allowed_file_types) && ($filesize < 5000000))
                         {	
                             // Rename file
                             if($_POST['content'] == 'Gambar No.1'){
                                $tglnow = "2";
                              $newfilename = 2 . $file_ext;
                             }else if($_POST['content'] == 'Gambar No.2'){
                                $tglnow = "3";
                              $newfilename = 3 . $file_ext;
                             }else if($_POST['content'] == 'Gambar No.3'){
                                $tglnow = "4";
                              $newfilename = 4 . $file_ext;
                             }
                                $dateket = date("Y-m-d h:i:sa");
                                $sql ="update home set lastupdate = '$dateket' where id = '$tglnow'";
                                $hasil = mysqli_query($conn,$sql);

                                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/" . $newfilename);
                                 ?>
                                <section class="section">
                                    <div class="alert alert-success alert-dismissable">
                                        <strong>Success!</strong> Gambar berhasil diupload.
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
                         elseif ($filesize > 200000)
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
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Last Update</th>
                                                <th>Content</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                            $sql = "SELECT * FROM home";
                                                            $result = $conn->query($sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                                $timestamp = strtotime($row['lastupdate']);
                                                                $new_date = date("d-m-Y h:i:sa", $timestamp);
                                                                echo "<form method='post'>";
                                                                echo "<tr>";
                                                                echo "<td> $new_date </td>";
                                                                echo "<td>" . $row['content'] . "</td>";
                                                                if($row['id'] == '1'){

                                                                }else if($row['id'] == '2')
                                                                {
                                                                    echo "<td><a href='' data-toggle='modal' data-target='#exampleModalCenter' ><button class='btn btn-primary btn-sm rounded-s' type ='button' name=''>View</button></a></td>";
                                                                    echo "<!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content' >                                                                       
                                                                          <div class='modal-body'>
                                                                            <img src='upload/2.jpg'>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>";
                                                                }
                                                                else if($row['id'] == '3')
                                                                {
                                                                    echo "<td><a href='' data-toggle='modal' data-target='#exampleModalCenter2' ><button class='btn btn-primary btn-sm rounded-s' type ='button' name=''>View</button></a></td>";
                                                                    echo "<!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter2' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content'>                                                                
                                                                          <div class='modal-body'>
                                                                            <img src='upload/3.jpg'>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>";
                                                                }
                                                                else if($row['id'] == '4')
                                                                {
                                                                    echo "<td><a href='' data-toggle='modal' data-target='#exampleModalCenter3' ><button class='btn btn-primary btn-sm rounded-s' type ='button' name=''>View</button></a></td>";
                                                                    echo "<!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter3' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content'>                                                                        
                                                                          <div class='modal-body'>
                                                                            <img src='upload/4.jpg'>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>";
                                                                }
                                                                echo "<td><button id='edithome' name='edithome' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
																";
                                                                echo "</tr>";
                                                                echo "<input class='form-control' type ='hidden' id='content' maxlength='2'  name='content' value='".$row["content"]."' />";
                                                                if ($row['content'] == 'Counter'){
                                                                    echo "<input class='form-control' type ='hidden' id='client' maxlength='2'  name='client' value='".$row["client"]."' />";
                                                                    echo "<input class='form-control' type ='hidden' id='project' maxlength='2'  name='project' value='".$row["project"]."' />";
                                                                    echo "<input class='form-control' type ='hidden' id='finish' maxlength='2'  name='finish' value='".$row["finish"]."' />";
                                                                    echo "</form>";
                                                                } 
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                                    <?php if (isset($_POST['edithome'])){
                                                        if($_POST['content'] != 'Counter'){?>
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
                                                                                    <label class=" form-control-label">Content</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <p class="form-control-static"><?Php echo $_POST['content']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="file-input" class=" form-control-label">File input</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="file" id="fileToUpload" accept="image/jpeg" name="fileToUpload" class="form-control-file">
                                                                                </div>
                                                                            </div>                                                                                                                    
                                                                    </div>
                                                                    <input class="form-control" type ="hidden" id="content" maxlength="2"  name="content" value="<?Php echo $_POST['content']; ?>" />
                                                                    <div class="card-footer">
                                                                        <button id="submitgambar" name="submitgambar" type="submit" class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                                        </button>
                                                                    </div>
                                                                        </form>
                                                            </div>                              
                                                            </div>     
                                                        <?php }else{ ?>
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
                                                                                    <label class=" form-control-label">Content</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <p class="form-control-static"><?Php echo $_POST['content']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label" >Jumlah Clients</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="number" id="text-client" name="text-client" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" class="form-control" value="<?php echo $_POST['client']; ?>">                                                      
                                                                                </div>
                                                                            </div>  
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Jumlah Projects</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="number" id="text-project" name="text-project" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" class="form-control" value="<?php echo $_POST['project']; ?>">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Jumlah Finished</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="number" id="text-finish" name="text-finish" onkeyup="this.value = this.value.replace(/[^0-9]/, '')" class="form-control" value="<?php echo $_POST['finish']; ?>">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                                                                                                         
                                                                    </div>
                                                                        <div class="card-footer">
                                                                        <button id="submitcounter" name="submitcounter" type="submit" class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                                        </button>
                                                                        </div>
                                                                        </form>
                                                            </div>                              
                                                        </div>                                                   
                                                    <?php } } ?>
                    </div>
                </div>  
            </div>   
            <!-- END CONTENT-->
            
 <?php include "partials/footer.php" ?>
