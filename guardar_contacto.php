<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre   = $_POST["nombre"];
    $email    = $_POST["email"];
    $telefono = $_POST["telefono"];
    $asunto   = $_POST["asunto"];
    $mensaje  = $_POST["mensaje"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=portafolio_rony;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO contactos (nombre, email, telefono, asunto, mensaje)
                VALUES (:nombre, :email, :telefono, :asunto, :mensaje)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nombre"   => $nombre,
            ":email"    => $email,
            ":telefono" => $telefono,
            ":asunto"   => $asunto,
            ":mensaje"  => $mensaje
        ]);

        echo "¡Mensaje enviado correctamente!";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "Método no permitido.";
}
