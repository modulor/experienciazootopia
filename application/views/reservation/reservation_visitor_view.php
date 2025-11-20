<div class="nick-and-judy">
  <img src="<?php echo base_url('assets/img/nick-and-judy.png') ?>" alt="Zootopia 2">
</div>
<p class="text-center mb-4 font-14"><strong>Reg&iacute;strate para conocer a uno de los personajes de Zootopia 2</strong></p>
<form action="<?php echo base_url('reservation/create') ?>" method="post" class="parsley-form">
  <div class="form-group">
    <label for="dates_available_id">Fechas disponibles</label>
    <select name="dates_available_id" id="dates_available_id" class="form-control" onchange="changeDatesAvailable(this);">
      <option value="" selected disabled></option>
      <?php foreach ($dates_available as $date) : ?>
        <option value="<?php echo $date->id ?>"><?php echo $date->date_label ?> (<?php echo $date->attendees_available ?> disponibles)</option>
      <?php endforeach; ?>
    </select>
  </div>
  <div id="dates_available_html"></div>
  <div id="total_attendees_html"></div>
  <div class="mt-4">
    <button id="btn-reservation" type="submit" disabled class="btn btn-success btn-lg btn-block">
      Continuar
    </button>
    <input type="hidden" name="visitors_id" value="<?php echo $visitors_id ?>">
    <div class="text-center">
      <p class="mt-2"><small class="text-muted">*Todos los campos son obligatorios</small></p>
    </div>
  </div>
</form>