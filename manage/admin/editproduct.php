<?php include "partials/header.php" ?>
<?php include "config.php" ?>
            <!-- MAIN CONTENT-->
            
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
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
                                                        <label class=" form-control-label">Category Name</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <p class="form-control-static"><?php echo $_GET['category'] ?></p>
                                                    </div>
                                                </div>
                                                <?php for($x = 1 ; $x<=10 ; $x++){
                                                    echo "<div class='row form-group'>";
                                                    echo "<div class='col col-md-3'>";     
                                                    echo "<label for='text-input' class=' form-control-label'>Sub-Category ".$x."</label>";                                                                                             
                                                    echo " </div>";    
                                                    echo "<div class='col-12 col-md-9'>";                                                
                                                    echo "<input type='text' id='Sub-Category1' name='Sub-Category".$x."' class='form-control'>  ";                                                
                                                    echo "</div>";                                                
                                                    echo "</div>";                                                
                                                } ?>               
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                </div>                              
                            </div>
                    </div>  
                </div>
            </div>        
            <!-- END CONTENT-->
            
 <?php include "partials/footer.php" ?>
