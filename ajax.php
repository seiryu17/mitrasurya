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
                                <div class="card" >
									<a href="./<?php echo $row['id_product']; ?>/">
                                    <img class="card-img-top" src="../manage/admin/product/product<?php echo $row['id_product']; ?>/product0.png" alt="Card image top">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $row['nama']; ?></h3>
                                        <h4 class="card-subtitle" style="color:#dd443c">Rp <?php echo number_format($row['harga']); ?></h4>
                                        <p class="card-text"><?php echo substr($row['description'],0,42); ?>...</p>
                                    </div>
									</a>
                                </div>
                            </div>
                                <?php } ?>        
                        </div>   
                        <!--<nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item ">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav> --> 