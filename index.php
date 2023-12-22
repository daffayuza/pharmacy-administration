<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!--Main Navigation-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    #sidebarMenu{
        width:230px;
    }

    .containerr{
        display:flex;
        flex-direction:row;
    }

    main{
        width:1200px;
    }

    .position-sticky, header{
        background-color:#567189;
        height:600px;
    }
    .gambar{
      width:18px;
      margin-bottom:5px;
    }


</style>
<div class="containerr" >
    <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky" >
          <div class="list-group list-group-flush mx-1 mt-4">
            <h2 style="margin:0 0 20px 13px; color:white;">Apotek Daoa</h2>
            <a href="index.php?page=home" class="list-group-item list-group-item-action py-2 ripple  home">
              <i class="fas fa-chart-area fa-fw me-3"></i>
              <span><img src="gambar/home.png" alt="" class="gambar"></span>
              <span>Home</span>
            </a>
            <a href="index.php?page=admin" class="list-group-item list-group-item-action py-2 ripple admin">
              <i class="fas fa-chart-area fa-fw me-3"></i>
              <span><img src="gambar/user1.png" alt="" class="gambar"></span>
              <span>Admin</span>
            </a>
            <a href="index.php?page=pegawai" class="list-group-item list-group-item-action py-2 ripple pegawai"
              ><i class="fas fa-lock fa-fw me-3"></i>
              <span><img src="gambar/pgw.png" alt="" class="gambar"></span>
              <span>Pegawai</span></a
            >
            <a href="index.php?page=pasien" class="list-group-item list-group-item-action py-2 ripple pasien"
              ><i class="fas fa-chart-line fa-fw me-3"></i>
              <span><img src="gambar/patient.png" alt="" class="gambar"></span>
              <span>Pasien</span></a
            >
            <a href="index.php?page=obat" class="list-group-item list-group-item-action py-2 ripple obat">
              <i class="fas fa-chart-pie fa-fw me-3"></i>
              <span><img src="gambar/pill.png" alt="" class="gambar"></span>
              <span>Obat</span>
            </a>
            <a href="index.php?page=supplier" class="list-group-item list-group-item-action py-2 ripple supplier"
              ><i class="fas fa-chart-bar fa-fw me-3"></i>
              <span><img src="gambar/sup.png" alt="" class="gambar"></span>
              <span>Supplier</span></a
            >
            <a href="index.php?page=cabang" class="list-group-item list-group-item-action py-2 ripple cabang"
              ><i class="fas fa-globe fa-fw me-3"></i>
              <span><img src="gambar/cabang1.png" alt="" class="gambar"></span>
              <span>Cabang</span></a
            >
          </div>
          <div class="w-100 mt-3 text-center">
            <a href="logout.php" class="btn btn-danger py-2 ripple cabang"
              ><i class="fas fa-globe fa-fw "></i><span>Sign Out</span></a
            >
          </div>
        </div>
      </nav>
      <!-- Sidebar -->
    </header>
    
    <!--Main layout-->
    <main style="margin:10px 0 0 40px;">
        <?php
            if($_GET['page']=='home'){
                include 'home.html';
                echo "<script>
                  document.querySelector('.home').classList.remove('ripple');
                  document.querySelector('.home').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='pegawai'){
                include 'pegawai.php';
                echo "<script>
                  document.querySelector('.pegawai').classList.remove('ripple');
                  document.querySelector('.pegawai').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='admin'){
                include 'admin.php';
                echo "<script>
                  document.querySelector('.admin').classList.remove('ripple');
                  document.querySelector('.admin').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='pasien'){
              include 'pasien.php';
              echo "<script>
                  document.querySelector('.pasien').classList.remove('ripple');
                  document.querySelector('.pasien').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='obat'){
              include 'obat.php';
              echo "<script>
                  document.querySelector('.obat').classList.remove('ripple');
                  document.querySelector('.obat').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='supplier'){
              include 'supplier.php';
              echo "<script>
                  document.querySelector('.supplier').classList.remove('ripple');
                  document.querySelector('.supplier').classList.add('active');
                </script>";
            }
            elseif($_GET['page']=='cabang'){
              include 'cabang.php';
              echo "<script>
                  document.querySelector('.cabang').classList.remove('ripple');
                  document.querySelector('.cabang').classList.add('active');
                </script>";
            }
        ?>
    </main>
</div>
<script src="js/bootstrap.bundle.min"></script>
<!--Main layout-->