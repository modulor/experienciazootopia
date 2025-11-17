<div class="row mb-4">
  <div class="col-6">
    <div class="card">
      <div class="card-body text-center">
        <h2><?php echo $total_visitors ?></h2>
        <p class="mb-0">Visitantes registrados</p>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-body text-center">
        <h2><?php echo $total_reservations ?></h2>
        <p class="mb-0">Reservaciones hechas</p>
      </div>
    </div>
  </div>
</div>
<div class="row mb-4">
  <div class="col-12">
    <h2>Fechas</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped bg-white">
        <thead>
          <tr>
            <th>Fecha</th>
            <th class="text-right">Disponibles</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($dates_available as $date):
          ?>
            <tr>
              <td width="70%"><?php echo $date->date_label ?></td>
              <td class="text-right"><?php echo $date->attendees_available ?></td>
              <td>
                <a href="<?php echo base_url("admin/reservations/date_details/{$date->id}") ?>" class="btn btn-primary btn-xs btn-block">Ver horarios</a>
              </td>
            </tr>
          <?php
          endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <h2>Reservaciones</h2>
  </div>
  <div class="col-6 text-right">
    <button onclick="exportTableToCSV('myTable', 'datos_tabla.csv')" class="btn btn-success btn-xs">Exportar a Excel</button>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-bordered table-striped bg-white" id="myTable">
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