<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $type = $_POST['type'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "INSERT INTO pegawai(nama, type, no_hp, alamat) VALUES('$nama', '$type', '$no_hp', '$alamat')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pegawai';
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
        $type = $_POST['type'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "UPDATE pegawai SET
            nama = '$nama',
            type = '$type',
            no_hp = '$no_hp',
            alamat = '$alamat'
            WHERE id_pgw = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pegawai';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM pegawai where id_pgw='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=pegawai';
        </script>";
    }
}