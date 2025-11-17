<div class="stitch-reservation">
  <img src="<?php echo base_url('assets/img/30-years.png') ?>" alt="Toy Story" class="img-fluid">
</div>
<p class="text-center mb-4"><strong>Tu visita ha sido registrada</strong></p>
<p class="text-center text-primary">
  No olvides presentar una identificación oficial para tu acceso
</p>
<div id="qr-container"></div>
<div class="mb-4">
  <button id="btnDescargar" class="btn btn-primary btn-lg btn-block" onclick="descargarQRGenerado('experiencia-ohana-<?php echo $reservation->fullname ?>.png')">
    Descargar Código QR
  </button>
</div>
<p><strong class="text-primary">TITULAR:</strong> <?php echo $reservation->fullname ?></p>
<p><strong class="text-primary">FECHA:</strong> <?php echo $reservation->date_label ?></p>
<p><strong class="text-primary">HORA:</strong> <?php echo $reservation->hour_label ?></p>
<p><strong class="text-primary">ACOMPAÑANTES:</strong> <?php echo $reservation->total_attendees - 1 ?></p>
<p>
  <strong class="text-primary">DIRECCIÓN:</strong>
  <a target="_blank" href="https://maps.app.goo.gl/ZLp9DfeF6dAj8xVq7">
    Cinemex Parque Delta
  </a>
</p>
<input type="hidden" name="rid" id="rid" value="<?php echo $reservation->id ?>">