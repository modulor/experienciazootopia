<p class="text-center mb-4"><strong>Tu visita ha sido registrada</strong></p>
<p class="text-center text-primary">
  No olvides presentar una identificación oficial para tu acceso
</p>
<div id="qr-container"></div>
<div class="mb-4">
  <button id="btnDescargar" class="btn btn-success btn-lg btn-block" onclick="descargarQRGenerado('experiencia-ohana-<?php echo $reservation->fullname ?>.png')">
    Descargar Código QR
  </button>
</div>
<p><strong class="text-success">TITULAR:</strong> <?php echo $reservation->fullname ?></p>
<p><strong class="text-success">FECHA:</strong> <?php echo $reservation->date_label ?></p>
<p><strong class="text-success">HORA:</strong> <?php echo $reservation->hour_label ?></p>
<p><strong class="text-success">ACOMPAÑANTES:</strong> <?php echo $reservation->total_attendees - 1 ?></p>
<p>
  <strong class="text-success">DIRECCIÓN:</strong>
  <a target="_blank" href="https://maps.app.goo.gl/vvHQDgAAnG1nvMLG7">
    ARTZ Pedregal
  </a>
</p>
<input type="hidden" name="rid" id="rid" value="<?php echo $reservation->id ?>">