<?php include './partials/header.php'; ?>
<body>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
<table class="table table-borderless table-striped table-earning" id="tabel-data">
    <thead>
        <tr>
        <th>Id.</th>
        <th>Portfolio Name</th>
        <th>Operation</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include 'config.php';
        $sql = "SELECT * FROM portfolio";
        $result = $conn->query($sql);
        while($row = mysqli_fetch_array($result))
        {
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

    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</table>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>