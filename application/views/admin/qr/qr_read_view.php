<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    body {
      background-color: #eee;
    }
  </style>
  <title>Experiencia Ohana</title>
</head>

<body>
  <section class="mt-5 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <?php
              if ($reservation) :
              ?>
                <h3 class="<?php echo $reservation->qr_code != '' ? 'text-warning' : 'text-success' ?> mb-4 text-center">
                  Código <?php echo $reservation->qr_code != '' ? 'Usado' : 'Nuevo' ?>
                </h3>
                <p><strong>Fecha:</strong> <?php echo $reservation->date_label ?></p>
                <p><strong>Hora:</strong> <?php echo $reservation->hour_label ?></p>
                <p><strong>Personas (total):</strong> <?php echo $reservation->total_attendees ?></p>
                <p><strong>Email:</strong> <?php echo $reservation->email ?></p>
                <p><strong>Nombre:</strong> <?php echo $reservation->fullname ?></p>
              <?php
              else :
              ?>
                <h3 class="text-danger text-center">Código inválido</h3>
              <?php
              endif;
              ?>
            </div>
            <?php if ($reservation->qr_code == '') : ?>
              <div class="card-footer">
                <a href="<?php echo base_url("admin/qr/read/{$reservation->id}/OK") ?>" class="btn btn-primary btn-lg btn-block">
                  Check In
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>