<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            $supplier = mysqli_query($koneksi, "SELECT * FROM supplier 
            INNER JOIN obat on obat.id_obat = obat_id");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Supplier</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=supplier&task=input" class="btn btn-primary">Input Data supplier</a>
            </div>
            <table class="table table-bordered  table-hover table-responsive">
                <tr class="table-info">
                    <th>Id</th>
                    <th>Nama Supplier</th>
                    <th>Obat</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>                    
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($supplier as $row) : ?>
                <tr>
                    <td> <?= $row["id_sup"]; ?></td>
                    <td> <?= $row["nama_sup"]; ?></td>
                    <td> <?= $row["nama_obat"]; ?></td>
                    <td> <?= $row["lokasi"]; ?></td>
                    <td>
                        <a href="index.php?page=supplier&task=edit&id_edt=<?= $row["id_sup"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesSupplier.php?task=delete&id_hps=<?= $row["id_sup"]; ?>"
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

                    $edit = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_sup='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Supplier</h2>
            <a href="index.php?page=supplier">Lihat data</a>
            <div class="row">
                <form action="proses/prosesSupplier.php?task=edit&id_edt=<?=$_GET['id_edt']?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama_sup']; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Obat</label>
                    <div class="row g-2">
                        <select name="obat" id="" class="form-select">
                            <?php
                                $obat = mysqli_query($koneksi, "SELECT * from obat");
                                while($data_obat = mysqli_fetch_array($obat)){
                                ?>
                                <option value="<?=$data_obat['id_obat']?>"><?=$data_obat['nama_obat']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <textarea name="lokasi" class="form-control" rows="3" cols="9"><?= $data['lokasi'];?></textarea>
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
            <h2>Form Input Supplier</h2>
            <a href="index.php?page=supplier">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesSupplier.php?task=input" method="post">
            <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Obat</label>
                    <div class="row g-2">
                        <select name="obat" id="" class="form-select">
                        <option value="" selected>--Pilih Obat--</option>
                            <?php
                                $obat = mysqli_query($koneksi, "SELECT * from obat");
                                while($data_obat = mysqli_fetch_array($obat)){
                                ?>
                                <option value="<?=$data_obat['id_obat']?>"><?=$data_obat['nama_obat']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <textarea name="lokasi" class="form-control" rows="3" cols="9"></textarea>
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
</html>