<?php
$archivo = fopen('../assets/contratosClientes_30-03-2025.csv', 'r');
$conexion = new PDO('mysql:host=localhost;dbname=reclamos_awaterra', 'root', '');

$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
fgetcsv($archivo, 1000, ";"); // Omitir cabecera

while (($fila = fgetcsv($archivo, 1000, ";")) !== false) {
    $stmt = $conexion->prepare("INSERT INTO usuarios (codigo, nombre, apellido, ruc, cedula, celular, telefono, email, aprobado, activo, instalado, codigoviejo, direccion, contrato_id, persona_id, tienemedidor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute($fila);
}
fclose($archivo);
