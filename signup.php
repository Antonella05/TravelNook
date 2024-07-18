<?php
// Récupérer les données envoyées par fetch
$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];

$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    $response = array('message' => 'Utilisateur enregistré avec succès');
    echo json_encode($response);
} else {
    $response = array('error' => 'Erreur lors de l\'enregistrement de l\'utilisateur');
    echo json_encode($response);
}
$conn->close();
?>
