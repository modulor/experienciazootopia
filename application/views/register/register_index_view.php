<p class="text-center mb-4 font-14"><strong>Reg&iacute;strate para disfrutar la experiencia Zootopia 2</strong></p>
<form action="<?php echo base_url('register/create') ?>" method="post" class="parsley-form">
  <div class="form-group">
    <label for="email">Correo electrónico</label>
    <input type="email" name="email" class="form-control" maxlength="300" required>
  </div>
  <div class="form-group">
    <label for="fullname">Nombre completo</label>
    <input type="text" name="fullname" class="form-control" maxlength="200" required>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="terms" name="terms" required>
    <label class="form-check-label" for="terms">
      He leído y acepto los <a href="<?php echo base_url('terminos-y-condiciones.pdf') ?>" target="_blank">Términos y Condiciones</a>
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="privacy" name="privacy" required>
    <label class="form-check-label" for="privacy">
      He leído el <a href="<?php echo base_url('aviso-de-privacidad.pdf') ?>" target="_blank">Aviso de Privacidad</a>
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="adult" name="adult" required>
    <label class="form-check-label" for="adult">
      Soy mayor de edad
    </label>
  </div>
  <div class="mt-4">
    <div class="ball">
      <img src="<?php echo base_url('assets/img/carrot.webp') ?>" alt="carrot">
    </div>
    <button type="submit" class="btn btn-success btn-lg btn-block">
      Reg&iacute;strate
    </button>
    <div class="text-center">
      <p class="mt-2"><small class="text-muted">*Todos los campos son obligatorios</small></p>
    </div>
  </div>
</form>