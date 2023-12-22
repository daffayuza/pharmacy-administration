<!-- Section: Design Block -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }

    img{
        width:900px;
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-6 d-lg-flex">
        <img src="gambar/login2.jpg" alt="Trendy Pants and Shoes"
          class="w-200 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-6">
        <div class="card-body py-5 px-md-5 d-flex justify-content-center">

          <form class="w-50" method="post">
            <!-- Username input -->
            <h2 class="btn-block mb-3">Apotek Daoa</h2>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Nama</label>
                <input type="text" id="form2Example1" class="form-control" name="nama"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Username</label>
                <input type="text" id="form2Example1" class="form-control" name="username"/>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label">Password</label>
                <input type="password" id="floatingPassword" class="form-control" name="password"/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Confirm Password</label>
                <input type="password" id="floatingPassword" class="form-control" name="confirm-password"/>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-3 w-100" name="submit">Register</button><br>
                <div class="register"><br>
                <a href="login.php" text-align="center">Already have Account?</a>
                </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-3">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
            </div>
          </form>

          <?php
            include 'proses/prosesRegister.php';
         ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->