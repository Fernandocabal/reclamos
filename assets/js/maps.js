let mapa, marcador;
document.addEventListener('DOMContentLoaded', function () {
    mapa = L.map('map').setView([-25.2637, -57.5759], 13); // Ñemby por defecto

    // Cargar el mapa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(mapa);
    marcador = L.marker([-25.2637, -57.5759], { draggable: true }).addTo(mapa);

    marcador.on('dragend', function (event) {
        let lat = event.target.getLatLng().lat;
        let lon = event.target.getLatLng().lng;
        document.getElementById("ubicacion").value = lat + ", " + lon;
    });
});

// Obtener la ubicación actual del usuario
function obtenerUbicacion(event) {
    event.preventDefault();
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function (position) {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            let ubicacionTexto = lat + ", " + lon;

            // Actualizar input
            document.getElementById("ubicacion").value = ubicacionTexto;

            if (mapa) { // Verifica si 'mapa' está definido
                mapa.setView([lat, lon], 15);
                marcador.setLatLng([lat, lon]);
            }

            // Mover el mapa y el marcador a la nueva ubicación
            mapa.setView([lat, lon], 15);
            marcador.setLatLng([lat, lon]);
        }, function (error) {
            alert("Error al obtener la ubicación: " + error.message);
        });
    } else {
        alert("Geolocalización no soportada en este navegador.");
    }
}
