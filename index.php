<?php


require_once 'database.php';

// Crear objeto de conexión a la base de datos
$database = new Database();
$conn = $database->conn;

$datos= array();

try {
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, surname, dni, email, contrasena) VALUES (:nombre, :surname, :dni, :email, :contrasena)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contrasena', $contrasena);

    // Datos de ejemplo para insertar
    $nombre = "Carlos";
    $surname = "Martinez";
    $dni = "12345678A";
    $email = "juanperez@mail.com";
    $contrasena = "micontrasena";

    // Ejecutar la consulta
    $stmt->execute();
    echo "Datos insertados correctamente.";
} catch(PDOException $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}
?>
