<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama-obat'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = mysqli_query($koneksi, "INSERT INTO obat(nama_obat, harga, stok) VALUES('$nama', '$harga', '$stok')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=obat';
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
        $nama = $_POST['nama-obat'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $sql = mysqli_query($koneksi, "UPDATE obat SET
            nama_obat = '$nama',
            harga = '$harga',
            stok = '$stok'
            WHERE id_obat = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=obat';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM obat where id_obat='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=obat';
        </script>";
    }
}