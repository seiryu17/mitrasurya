<?php include "partials/header.php" ?>
<?php include "config.php" ?>

            <!-- MAIN CONTENT-->         
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <ul class="breadcrumb">
                    <li><a href="./managecategory.php">Manage Categories</a></li>
                    <li><a href="./managesubcategory.php?category=<?php echo $_GET['category'] ?>">Manage Sub-Categories</a></li>
                    <li><b>Manage Products</b></li>
                    </ul>
                    <h2>Manage Products :
                    <?php 
                        $categoryid = $_GET['category'];
                        $sql2 = "SELECT * FROM category_product where id_category = $categoryid";
                        $result = $conn->query($sql2);  
                        $row = mysqli_fetch_array($result);
                        echo $row['nama'];    
                        echo " > ";
                        $categoryid = $_GET['subcategory'];
                        $sql2 = "SELECT * FROM subcategory_product where id_subcategory = $categoryid";
                        $result = $conn->query($sql2);  
                        $row = mysqli_fetch_array($result);
                        echo $row['nama'];   
                    ?>             
                    </h2>
                    <form action="detailproduct.php?category=<?php echo $_GET['category']; ?>&subcategory=<?php echo $_GET['subcategory']; ?>&opr=add" method="post">
                    <button id='addsubcategory' name='addsubcategory' type ='submit' class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add</button>
                    </form>
                    <br>
                    <?php if (isset($_POST['deleteproduct'])){
                     
                        $id = $_POST['idproduct'];
                        $sql ="delete from product where id_product = '$id'";
                        $hasil = mysqli_query($conn,$sql);
                        if ($hasil) {
                            rrmdir('./product/product'.$id.'');
                            rrmdir('./varianmodel/varian'.$id.'');
                            rrmdir('./varianmodel/model'.$id.'');
                            ?>							
                            <section class="section">
                                <div class="alert alert-success alert-dismissable">
                                  <strong>Success!</strong> Product berhasil didelete.
                                  
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
                                                <th>Product Name</th>
                                                <th>View</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <?php   $categoryid = $_GET['category'];
                                                            $subcategoryid = $_GET['subcategory'];
                                                            $sql = "SELECT * FROM product where id_category = $categoryid and id_subcategory = $subcategoryid";
                                                            $result = $conn->query($sql);
                                                            $a =-1;
                                                            while($row = mysqli_fetch_array($result)){
                                                                $a++;
                                                                $timestamp = strtotime($row['lastupdate']);
                                                                $new_date = date("d-m-Y h:i:sa", $timestamp);
                                                                echo "<tr>";
                                                                echo "<td>" . $row['id_product'] . "</td>";   
                                                                echo "<td>" . $row['nama'] . "</td>";     
                                                                echo "<td><a href='' data-toggle='modal' data-target='#exampleModalCenter".$row['id_product']."' ><button class='btn btn-primary btn-sm rounded-s' type ='button' name=''>View Image</button></a></td>";
                                                                echo "<!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter".$row['id_product']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content'>                                                                
                                                                          <div class='modal-body'>"?>
                                                                            <img src='./product/product<?php echo $row['id_product'];?>/product0.png'>
                                                                <?php echo"
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>";
                                                                echo "<form action='detailproduct.php?id=".$row['id_product']."&opr=".'edit'."' method='post'>";
                                                                echo "<td><button id='editproduct' name='editproduct' type ='submit' class='btn btn-primary btn-sm rounded-s'><span class='fa fa-pencil' aria-hidden='true'></span> Edit</button>
                                                                <button id='deleteproduct' name='deleteproduct' type ='submit' class='btn btn-primary btn-sm rounded-s' formaction='' onClick='return doconfirm();'><span class='fa fa-trash' aria-hidden='true'></span> Delete</button>";
                                                                echo "<input class='form-control' type ='hidden' id='nama' maxlength='2'  name='nama' value='".$row["nama"]."' />";
                                                                echo "<input class='form-control' type ='hidden' id='idproduct' maxlength='2'  name='idproduct' value='".$row["id_product"]."' />";
                                                                echo "</tr>";
                                                                echo "</form>";
                                                                }
                                                    ?>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </div>  
            </div>   
            <!-- END CONTENT-->
            
 <?php include "partials/footer.php" ?>
