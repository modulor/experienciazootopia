let qrCodeInstance = null; // Para mantener la instancia del QR

function generarQR() {
  // http://localhost:8888/experienciaohana/admin/qr/read/3
  const reservationId = $("#rid").val();
  const datos = `${baseURL}admin/qr/read/${reservationId}`;
  const contenedor = document.getElementById("qr-container");

  if (!datos) {
    alert("Por favor, introduce datos para generar el QR.");
    return;
  }

  // Limpiar el contenedor anterior
  contenedor.innerHTML = "";

  // 2. Generar el QR
  qrCodeInstance = new QRCode(contenedor, {
    text: datos,
    width: 200, // Tamaño del QR
    height: 200,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H, // Nivel de corrección de errores
  });

  // Mostrar el botón de descarga
  // Puede que qrcode.js tarde un instante en generar el canvas/img
  setTimeout(() => {
    document.getElementById("btnDescargar").style.display = "inline-block";
  }, 100); // Pequeña espera
}

function descargarQRGenerado(nombreArchivo = "codigo-qr.png") {
  const contenedor = document.getElementById("qr-container");
  const canvas = contenedor.querySelector("canvas");
  const img = contenedor.querySelector("img"); // qrcode.js a veces añade un img también

  let urlDatosImagen;

  if (canvas) {
    // 3. Obtener los datos de la imagen desde el canvas (como Data URL)
    urlDatosImagen = canvas.toDataURL("image/png");
  } else if (img && img.src.startsWith("data:image")) {
    // Si qrcode.js usó una imagen con Data URL
    urlDatosImagen = img.src;
  } else {
    alert(
      "No se pudo encontrar la imagen del QR para descargar. Intenta generarlo de nuevo."
    );
    console.error("Contenido del qr-container:", contenedor.innerHTML);
    return;
  }

  // 4. Crear un enlace temporal y simular clic para descargar
  const enlaceDescarga = document.createElement("a");
  enlaceDescarga.href = urlDatosImagen;
  enlaceDescarga.download = nombreArchivo;

  document.body.appendChild(enlaceDescarga);
  enlaceDescarga.click();
  document.body.removeChild(enlaceDescarga);
}

generarQR();
