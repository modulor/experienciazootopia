<div class="form-group">
  <label for="hours_available_id">Horarios disponibles</label>
  <select name="hours_available_id" id="hours_available_id" class="form-control" onchange="changeHoursAvailable(this)">
    <option value="" disabled selected></option>
    <?php foreach ($hours_available as $hour) : ?>
      <option value="<?php echo $hour->id ?>"><?php echo $hour->hour_label ?> (<?php echo $hour->attendees_available ?> disponibles)</option>
    <?php endforeach; ?>
  </select>
</div>