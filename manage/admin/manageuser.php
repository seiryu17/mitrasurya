<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <h2>Manage User</h2>
                    <form method="post">
                    <button id='adduser' name='adduser' type ='submit' class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </form>
                    <br>
                    <?php if(isset($_POST['submituser'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $options = [
                            'cost' => 10,
                        ];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT,$options);
                        $sql ="INSERT INTO user (username, password, lastlogin) VALUES ('$username','$hashed_password', now())";
                        $hasil = mysqli_query($conn,$sql);
                        if($hasil){?>
                                    <section class="section">
                                       <div class="alert alert-success alert-dismissable">
                                           <strong>Success!</strong> User berhasil dibuat.
                                       </div>
                                    </section>
                                    <meta http-equiv='refresh' content='0.005'>
                                    <?php
                        }
                    } ?>  
                    <?php if (isset($_POST['ubahuser'])){ 
                        $id_user = $_POST['id_user'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql ="UPDATE user set username = '$username' ,password = '$hashed_password' where id_user = $id_user ";
                        $hasil = mysqli_query($conn,$sql);
                        if($hasil){?>
                                    <section class="section">
                                       <div class="alert alert-success alert-dismissable">
                                           <strong>Success!</strong> User berhasil diedit.
                                       </div>
                                    </section>
                                    <meta http-equiv='refresh' content='0.005'>
                                    <?php
                        }
                    }
                    ?> 
                     <?php if (isset($_POST['deleteuser'])){ 
                        
                        $id_user = $_POST['id_user'];
                        $sql2 ="delete from user where id_user = '$id_user' ";
                        $hasil2 = mysqli_query($conn,$sql2);
                        if ($hasil2) {?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> User berhasil didelete.
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
                                                <th>Username</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php
                                                            $sql = "SELECT * FROM user";
                                                            $result = $conn->query($sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                                echo "<tr>";
                                                                echo "<td>" .$row['id_user']. "</td>";  
                                                                echo "<td>" .$row['username']. "</td>";  
                                                                echo "<td><form method='post'>";
                                                                echo "<button id='edituser' name='edituser' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
                                                                <button id='deleteuser' name='deleteuser' type ='submit' class='btn btn-primary btn-sm rounded-s' onClick='return doconfirm();'><span class='fa fa-trash' aria-hidden='true'></span> Delete</button>";
                                                                echo "<input class='form-control' type ='hidden' id='id_user' maxlength='2'  name='id_user' value='".$row["id_user"]."' />";
                                                                echo "</form></td>";
                                                                echo "</tr>";
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                                    <?php if (isset($_POST['adduser'])){?>
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
                                                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="username" name="username" class="form-control">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="password" name="password" class="form-control">                                                      
                                                                                </div>
                                                                            </div>                                                                                                                                                                                    
                                                                    </div>
                                                                    
                                                                            <div class="card-footer">
                                                                                <button id="submituser" name="submituser" type="submit" class="btn btn-primary btn-sm">
                                                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                                                </button>                                                                               
                                                                            </div>                                              
                                                                        </form>
                                                                    </div>          
                                                            </div>                              
                                                            </div>                                                                                 
                                                    <?php  } ?>
                                                    <?php if (isset($_POST['edituser'])){
                                                         $sql = "SELECT * FROM user where id_user = ".$_POST['id_user']."";
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
                                                                                    <label for="text-input" class=" form-control-label">Username</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="username" name="username" class="form-control" required value="<?php echo $row['username']; ?>">                                                      
                                                                                </div>
                                                                            </div> 
                                                                            <div class="row form-group">
                                                                                <div class="col col-md-3">
                                                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                                                </div>
                                                                                <div class="col-12 col-md-9">
                                                                                    <input type="text" id="password" name="password"  required class="form-control">   
                                                                                    <small class="form-text text-muted">Input the new password</small>                                                   
                                                                                </div>
                                                                            </div>                                                                                                                                                                                    
                                                                    </div>
                                                                            <div class="card-footer">
                                                                            <input class='form-control' type ='hidden' id='id_user' maxlength='2'  name='id_user' value='<?php echo $row['id_user'] ?>' />
                                                                                <button id="ubahuser" name="ubahuser" type="submit" class="btn btn-primary btn-sm">
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
