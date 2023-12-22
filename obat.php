<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'koneksi.php';
    $page = isset($_GET['task']) ? $_GET['task'] : 'list';

    switch ($page) {
        case 'list':
    ?>
    <?php
            include 'koneksi.php';
            $obat = mysqli_query($koneksi, "SELECT * FROM obat");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Obat</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=obat&task=input" class="btn btn-primary">Input Data Obat</a>
            </div>
            <table class="table table-bordered table-hover table-responsive">
                <tr class="table-info">
                    <th>Id</th>
                    <th>Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($obat as $row) : ?>
                <tr>
                    <td> <?= $row["id_obat"]; ?></td>
                    <td> <?= $row["nama_obat"]; ?></td>
                    <td> <?= $row["harga"]; ?></td>
                    <td> <?= $row["stok"]; ?></td>
                    <td>
                        <a href="index.php?page=obat&task=edit&id_edt=<?= $row["id_obat"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesObat.php?task=delete&id_hps=<?= $row["id_obat"]; ?>"
                            onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span
                                data-feather="trash-2" class="align-text-bottom">Hapus</span></a>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
        break;

        case 'edit':
        include 'koneksi.php';
        ?>
        <link rel="stylesheet" href="css/bootstrap.min.css">

<body>
    <div class="container mt-3 ">
        <div class="col-md-4">
            <?php
                    include 'koneksi.php';

                    $edit = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Obat</h2>
            <a href="index.php?page=obat">Lihat data</a>
            <div class="row">
                <form action="proses/prosesObat.php?task=edit&id_edt=<?=$_GET['id_edt'];?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" name="nama-obat" value="<?=$data['nama_obat'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?=$data['harga'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" value="<?=$data['stok'];?>">
                </div>
                <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                </div>
                </form>
                <?php
                
                ?>
            </div>
        </div>
    </div>
    <?php
    break;
    case 'input':
    ?>
    <!-- input -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <div class="container mt-3 ">
        <div class="col-md-4">
            <h2>Form Input Obat</h2>
            <a href="index.php?page=obat">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesObat.php?task=input" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Obat</label>
                    <input type="text" class="form-control" name="nama-obat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                </div>
            </form>

        </div>
    </div>
    </div>
    <?php
        break;
        }?>
    </body>
    <script src="js/bootstrap.bundle.min"></script>
</html>