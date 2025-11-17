<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/img/favicon/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/favicon/favicon-16x16.png') ?>">
  <link rel="manifest" href="<?php echo base_url('assets/img/favicon/site.webmanifest') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
  <?php
  if (isset($_css)) {
    foreach ($_css as $css) {
  ?>
      <link rel="stylesheet" href="<?php echo base_url("assets/css/$css") ?>">
  <?php
    }
  }
  ?>
  <title>Toy Story - 30 años</title>
</head>

<body>
  <div class="container my-4">
    <!-- <div class="row">
      <div class="col-12 col-lg-4 offset-lg-4">
        <img src="<?php echo base_url('assets/img/woody-buzz.png') ?>" alt="Woody y Buzz" class="img-fluid">
      </div>
    </div> -->
    <div class="row">
      <div class="col-xl-6 offset-xl-3 col-md-6 offset-md-3 col-12">
        <div class="card border-rounded">
          <div class="card-body ">
            <div class="mb-4">
              <img src="<?php echo base_url('assets/img/logo.webp') ?>" alt="logo" class="img-fluid mx-auto d-block" style="max-width: 200px;">
            </div>
            <?php $this->load->view($content_view)  ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">&copy; Disney</div>
  <script>
    const baseURL = '<?php echo base_url() ?>'
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha512-jGsMH83oKe9asCpkOVkBnUrDDTp8wl+adkB2D+//JtlxO4SrLoJdhbOysIFQJloQFD+C4Fl1rMsQZF76JjV0eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?php echo base_url('assets/vendor/parsley/parsley.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/vendor/parsley/i18n/es.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
  <?php
  if (isset($_js)) {
    foreach ($_js as $js) {
  ?>
      <script src="<?php echo base_url("assets/$js") ?>"></script>
  <?php
    }
  }
  ?>
</body>

</html>