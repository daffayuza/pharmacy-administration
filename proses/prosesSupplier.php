<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $obat = $_POST['obat'];
        $lokasi = $_POST['lokasi'];

        $sql = mysqli_query($koneksi, "INSERT INTO supplier(nama_sup, obat_id, lokasi) VALUES('$nama', '$obat', '$lokasi')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=supplier';
            </script>";
        }

        else{
            echo "<script>
                alert('data gagal disimpan!');
            </script>";
        }
    }
}

elseif($_GET['task'] == 'edit') {
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $obat = $_POST['obat'];
        $lokasi = $_POST['lokasi'];

        $sql = mysqli_query($koneksi, "UPDATE supplier SET
            nama_sup = '$nama',
            obat_id = '$obat',
            lokasi = '$lokasi'
            WHERE id_sup = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=supplier';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM supplier where id_sup='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=supplier';
        </script>";
    }
}