<?php
include "./manage/admin/config.php";
?>
<?php
 $sql32 = "SELECT * FROM category_product where id_category = ".$_GET['idcategory']."";
 $result32 = $conn->query($sql32);
 $row32 = mysqli_fetch_array($result32);
 $sql33 = "SELECT * FROM subcategory_product where id_subcategory = ".$_GET['idsubcategory']."";
 $result33 = $conn->query($sql33);
 $row33 = mysqli_fetch_array($result33);
?>
<h4>Category : <?php echo $row32['nama']; ?> > <?php echo $row33['nama']; ?></h4>
 <div class="row">
                        <?php
                                $sql = "SELECT * FROM product where id_category = ".$_GET['idcategory']." and id_subcategory = ".$_GET['idsubcategory']."";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_array($result)){
                                ?>
                                <div class="col-sm-3 mb-4">
                                    <div class="card" onclick="myFunction('../manage/admin/varianmodel/model<?php echo $row['id_product']; ?>/model0.png','../manage/admin/product/product<?php echo $row['id_product']; ?>/product0.png','<?php echo $row['id_product']; ?>')">
                                        <img class="card-img-top" src="../manage/admin/product/product<?php echo $row['id_product']; ?>/product0.png" alt="Card image top">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>        
                        </div>   

