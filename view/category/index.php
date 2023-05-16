<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
    header('location:../index.php');
}

if (isset($_POST['submit'])) {
    $kat_name = $_POST['kategori'];

    if (empty($kat_name)) {
        echo "<script> alert('Nama Kategori TIdak Boleh Kosong')</script>";
    } else {
        $insert = $pdo->prepare("INSERT INTO tb_category (nm_cat) value (:cat)");
        $insert->bindParam(':cat', $kat_name);

        if ($insert->execute()) {
            echo "<script>alert('Data Berhasil Ditambah')</script>";
        } else {
            echo "<script>alert('Data Tidak Berhasil Ditambah')</script>";
        }
    }
}



?>

<?php
include_once("../inc/header.php");
include_once("../inc/admin_sidebar.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Seluruh Kategori</h3>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between ">
                                <div>
                                    Menampilkan <input class="form-control mr-1 d-inline" type="number" style="width : 19%">Data / Halaman
                                </div>
                                <div class="form-group row ">
                                    <label for="search" class="col-sm-5 font-weight-normal" style="font-size: 17px; margin-top:8px;">Pencarian :</label>
                                    <div class="col-7" style="margin-top:5px;">
                                        <input type="text" name="search" class="form-control" id="search">
                                    </div>
                                </div>
                            </div>


                            <table class="table table-hover table-responsive-md text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM tb_category";
                                    $stml = $pdo->query($sql);
                                    while ($row = $stml->fetch()) {
                                        $id = $row["id"];
                                        $cat = $row["nm_cat"];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $cat ?></td>
                                            <td>
                                                <a href="update.php?id=<?= $id; ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a href="delete.php?id=<?= $id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>


                                    <?php
                                    }
                                    ?>
                                </tbody>

                            </table>

                            <!-- /.card-body -->
                        </div>


                        <div class="d-flex justify-content-between">

                            <h6>Menampilkan 1 dari 1 halaman</h6>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- /.card-footer-->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card ">
                        <div class="card-header bg-primary">
                            <h5 class="mt-2 ">Tambah Kategori</h5>
                        </div>
                        <!-- card header -->
                        <form method="POST" action="">

                            <div class="card-body">
                                <div class="form-group ">
                                    <label for="katInput">Nama Kategori</label>
                                    <input style="width:100% ;" type="text" class="form-control input-lg" id="katInput" name="kategori">
                                </div>
                            </div>
                            <!-- card body -->

                            <div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
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