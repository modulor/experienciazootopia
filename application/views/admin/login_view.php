<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Experiencia Ohana - Admin</title>
</head>

<body>
  <section class="mt-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="card">
            <div class="card-body">
              <form action="<?php echo base_url("admin/login") ?>" method="post">
                <div class="form-group mb-3">
                  <label for="emailaddress">Correo electr&oacute;nico</label>
                  <input class="form-control" name="email" type="email" id="emailaddress" required="" autofocus="">
                </div>
                <div class="form-group mb-3">
                  <label for="password">Contrase&ntilde;a</label>
                  <input class="form-control" name="password" type="password" required="" id="password">
                </div>
                <div class="form-group mb-0 text-center">
                  <button class="btn btn-primary btn-block" type="submit"> Entrar </button>
                  <input type="hidden" name="reservations_id" value="<?php echo $reservations_id ?>">
                </div>
                <?php
                if (isset($error_login)) :
                ?>
                  <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show mt-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <?php echo $error_login; ?>
                  </div>
                <?php
                endif;
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>