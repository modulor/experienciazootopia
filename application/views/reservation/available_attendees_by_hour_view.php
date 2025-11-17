<div class="form-group">
  <label for="total_attendees">Número de acompañantes</label>
  <?php if ($max_total_attendees == 0) : ?>
    <p class="text-danger text-center mb-0">Lo sentimos, se han agotado los lugares para este horario.</p>
    <p class="text-danger text-center">Por favor elija otro horario.</p>
    <script>
      desactivateButton();
    </script>
  <?php else : ?>
    <select name="total_attendees" id="total_attendees" class="form-control">
      <?php for ($i = 0; $i <= $max_total_attendees; $i++) : ?>
        <option value="<?php echo $i ?>"><?php echo $i ?> <?php echo $i > 1 ? 'acompañantes' : 'acompañante' ?></option>
      <?php endfor; ?>
    </select>
    <script>
      activateButton();
    </script>
  <?php endif; ?>
</div>