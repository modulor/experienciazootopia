<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Experiencia Ohana</title>
  <style>
    body {
      background-color: rgb(232, 232, 232);
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/reservations') ?>">Reservaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/logout') ?>">Salir</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php $this->load->view($content_view) ?>
        </div>
      </div>
    </div>
  </main>

  <script>
    function exportTableToCSV(tableId, filename) {
      const table = document.getElementById(tableId);
      if (!table) {
        console.error(`Table with ID "${tableId}" not found.`);
        return;
      }

      let csv = [];
      const rows = table.querySelectorAll('tr');

      for (const row of rows) {
        let rowData = [];
        const cols = row.querySelectorAll('th, td');

        for (const col of cols) {
          let cellText = col.textContent.trim();

          // Handle commas and double quotes in cell content for proper CSV formatting
          if (cellText.includes(',') || cellText.includes('"') || cellText.includes('\n')) {
            cellText = cellText.replace(/"/g, '""'); // Escape double quotes
            cellText = `"${cellText}"`; // Enclose in double quotes
          }
          rowData.push(cellText);
        }
        csv.push(rowData.join(','));
      }

      // Join all rows with newline characters
      const csvString = csv.join('\n');

      // Create a Blob with the CSV data
      const blob = new Blob([csvString], {
        type: 'text/csv;charset=utf-8;'
      });

      // Create a temporary anchor element to trigger the download
      const link = document.createElement('a');
      if (link.download !== undefined) { // Feature detection for download attribute
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden'; // Hide the link
        document.body.appendChild(link);
        link.click(); // Programmatically click the link to trigger download
        document.body.removeChild(link); // Clean up the link
      } else {
        // Fallback for browsers that don't support the download attribute
        alert('Tu navegador no soporta la descarga directa de archivos. Por favor, copia el siguiente texto y pégalo en un editor de texto para guardar como .csv:\n\n' + csvString);
      }
    }
  </script>
</body>

</html>