<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "INSERT INTO cabang(nama_cab, alamat) VALUES('$nama', '$alamat')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=cabang';
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
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "UPDATE cabang SET
            nama_cab = '$nama',
            alamat = '$alamat'
            WHERE id_cab = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=cabang';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM cabang where id_cab='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=cabang';
        </script>";
    }
}