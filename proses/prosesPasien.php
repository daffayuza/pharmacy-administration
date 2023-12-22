<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $sakit = $_POST['sakit'];
        $obat = $_POST['obat'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "INSERT INTO pasien(nama, sakit, obat_id, alamat) VALUES('$nama', '$sakit', '$obat', '$alamat')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pasien';
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
        $sakit = $_POST['sakit'];
        $obat = $_POST['obat'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "UPDATE pasien SET
            nama = '$nama',
            sakit = '$sakit',
            obat_id = '$obat',
            alamat = '$alamat'
            WHERE id_pasien = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pasien';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM pasien where id_pasien='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=pasien';
        </script>";
    }
}