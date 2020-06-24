<head>
<?php include "./partials/header.php" ?>
<?php include "./manage/admin/config.php" ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.img-wrapper {
  position: relative;
 }

.img-responsive {
  width: 100%;
  height: auto;

}
.img-responsive2 {
  width: 75px;
  height: 75px;
  position: absolute;
  bottom: 50;
  right: 250;
  border-style: solid;
  border-color: black;
  border-width: 1px;
}

.img-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
}

.img-overlay:before {
  content: ' ';
  display: block;
  /* adjust 'height' to position overlay content vertically */
  height: 50%;
}
.btn{
  position: absolute;
     bottom: 0;
     left: 0;
}
.btn2{
  position: absolute;
     bottom: 20;
}
.btn-responsive {
  /* matches 'btn-md' */
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
  background-color; yellow:
}
.bottom-right {
  position: absolute;
  bottom: 55;
  right: 265;
}

@media (max-width:760px) { 
    /* matches 'btn-xs' */
    .btn-responsive {
        padding: 1px 5px;
        font-size: 10px;
        line-height: 1.5;
        border-radius: 3px;
    }
    .img-responsive2 {
      width: 50px;
      height: 50px;
      position: absolute;
      bottom: 10;
      right: 100;
      border-style: solid;
      border-color: black;
      border-width: 1px;
    }
    .bottom-right {
      position: absolute;
      bottom: 10;
      right: 107;
      font-size: 11;
    }
   

}

.rotate90 {
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    transform: rotate(90deg);
}

</style>
</head>

        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                <div class="img-wrapper">
                    <img id="simulasi" class="img-responsive" src="../img/simulasi/simulasi1.png">
                    <div class="img-overlay">
                    <div class="btn btn-group-vertical">
                      <button id="go" class="btn btn-md btn-warning btn-responsive mb-2" onclick="window.location.href = ''" data-tooltip="tooltip" data-placement="top" title="Go To Product"> <i class="fa fa-cubes"></i></button>
                      <button class="btn btn-md btn-warning btn-responsive mb-2" data-toggle="modal" data-target=".bd-example-modal-lg" data-tooltip="tooltip" data-placement="top" title="Search Product"><i class="fa fa-search" aria-hidden="true"></i></button>
                      <button class="btn btn-md btn-warning btn-responsive mb-2" onclick="openFullscreen();"><i class="fa fa-arrows-alt" aria-hidden="true" data-tooltip="tooltip" data-placement="top" title="Full Screen"></i></button>
                      <button id="download" class="btn btn-md btn-warning btn-responsive mb-2" data-href="../img/simulasi/simulasi1.png" download="simulasi.png" onclick="forceDownload(this);" data-tooltip="tooltip" data-placement="top" title="Download"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </div>
                    <a data-toggle="modal" data-target=".bd-example-modal-lg"><img  id="boxindicator" class="img-responsive2 rotate90" src="../img/simulasi/1.png" alt="Click to change">
                    <div class="bottom-right">Click <br>to<br> change</div>
                    </a>
                    </div>
                </div>
                <br>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <section class="our_service padding_top2 padding_bottom2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                            <div class="blog_right_sidebar">
                                    <aside class="single_sidebar_widget post_category_widget">
                                        <h4 class="widget_title">Category</h4>
                                        <div class="overflowTest">
                                        <ul class="list cat-list">
                                            <nav class="navigation">  
                                            <?php
                                            $sql = "SELECT * FROM category_product";
                                            $result = $conn->query($sql);
                                            $a=-1;
                                            while($row = mysqli_fetch_array($result)){
                                            ?>
                                            <ul class="mainmenu">
                                                <li><a><b><?php echo $row['nama']; ?></b></a><hr>
                                                <?php
                                            $sql2 = "SELECT * FROM subcategory_product where id_category = ".$row['id_category']."";
                                            $result2 = $conn->query($sql2);  
                                            while($row2 = mysqli_fetch_array($result2)){
                                                $a++;
                                            ?>
                                                <ul class="submenu">               
                                                    <li><a href="javascript:void(0)" onclick="loadDoc<?php echo $a; ?>()"><?php echo $row2['nama']; ?></a></li>
                                                    
                                                    <script>
                                                    function loadDoc<?php echo $a; ?>() {
                                                    var xhttp = new XMLHttpRequest();
                                                    xhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                        document.getElementById("demo").innerHTML = this.responseText;
                                                        }
                                                    };
                                                    xhttp.open("GET", "/ajax2.php?idcategory=<?php echo $row['id_category']; ?>&idsubcategory=<?php echo $row2['id_subcategory']; ?>", true);
                                                    xhttp.send();
                                                    }
                                                    </script>
                                                </ul>
                                                <?php } ?>
                                                </li>
                                            </ul>
                                            <?php } ?>
                                            </nav>                          
                                        </ul>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                    <p id="demo" ></p>
                                <br>
                            </div>               
                        </div>
                    </div>
                </section>
                </div>
              </div>
            </div>
            </div>
            </div>
            
<script>
function forceDownload(link){
    var url = link.getAttribute("data-href");
    var fileName = link.getAttribute("download");
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob";
    xhr.onload = function(){
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(this.response);
        var tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    }
    xhr.send();
}
function myFunction($src,$src2,$id) {
  $('.bd-example-modal-lg').modal('hide');
  document.getElementById("simulasi").src = $src;
  document.getElementById("boxindicator").src = $src2;
  document.getElementById("go").setAttribute("onclick", "location.href='/products/"+$id+"/'");
  document.getElementById("download").setAttribute("data-href", ""+$src+"");
}

$(function () {
  $('[data-tooltip="tooltip"]').tooltip()
})

var elem = document.getElementById("simulasi");
function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
}
</script>
<?php include "./partials/footer.php" ?>