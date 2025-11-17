<div class="row mb-4">
  <div class="col-12">
    <h2>Fecha: <?php echo $reservations[0]->date_label ?></h2>
    <h2>Horario: <?php echo $hour->hour_label ?></h2>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <h2>Reservaciones</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped bg-white">
        <thead>
          <th>Registro</th>
          <th>Email</th>
          <th>Nombre completo</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Personas</th>
        </thead>
        <tbody>
          <?php
          foreach ($reservations as $reservation):
          ?>
            <tr>
              <td><?php echo $reservation->created_at ?></td>
              <td><?php echo $reservation->email ?></td>
              <td><?php echo $reservation->fullname ?></td>
              <td><?php echo $reservation->date_label ?></td>
              <td><?php echo $reservation->hour_label ?></td>
              <td><?php echo $reservation->total_attendees ?></td>
            </tr>
          <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>