<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
    header('location:../index.php');
}
$queryId = $_GET["id"];

if (isset($_POST['update'])) {
    $category = $_POST['kategori'];
    $sql = "UPDATE tb_category SET nm_cat='$category' WHERE id='$queryId'";
    $result = $pdo->query($sql);

    if ($result) {
        echo "<script>alert('Data Berhasil Di Perbarui')</script>";
    } else {
        echo "<script>alert('Data Tidak Berhasil Di Perbarui')</script>";
    }
}

?>

<?php
include_once("../inc/header.php");
include_once("../inc/admin_sidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    $no = 1;
    $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
    $stml = $pdo->query($sql);
    while ($row = $stml->fetch()) {
        $cat = $row["nm_cat"];
    }
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6 mx-auto">
                    <div class="card ">
                        <div class="card-header bg-primary">
                            <h5 class="mt-2 ">Edit Kategori</h5>
                        </div>
                        <!-- card header -->
                        <form method="POST" action="">

                            <div class="card-body">
                                <div class="form-group ">
                                    <label for="katInput">Memperbarui</label>
                                    <input style="width:100% ;" type="text" class="form-control input-lg" id="katInput" name="kategori">
                                </div>
                            </div>
                            <!-- card body -->

                            <div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit" name="update">Perbarui</button>
                                    <a href="index.php" class="btn btn-info">Kembali</a>
                                </div>
                            </div>
                            <!-- card footer -->
                        </form>
                    </div>

                    <!-- card -->
                </div>
            </div>
        </div>
</div><!-- /.container-fluid -->
</section>





</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<?php
include_once("../inc/footer.php");
?>