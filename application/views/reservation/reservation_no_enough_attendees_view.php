<section class="py-4 py-md-5 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="logo" class="img-fluid">
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2>¡Ups!</h2>
            <p class="my-4">Lo sentimos, el número de asistentes que seleccionaste han excedido la disponibilidad del horario que elegiste.</p>
            <a href="<?php echo base_url("reservation/visitor/$visitors_id") ?>" class="btn btn-danger btn-lg btn-block">
              Reintentar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>