<?php
session_start();

header('Content-Type: application/json'); // Important pour renvoyer une réponse JSON


$servername = "localhost";
$username = "Mika";
$password = "nG]Q4pWk)9V@lPL!";
$dbname = "gb-database";

// Tentative de connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparation de la requête SQL pour vérifier l'existence de l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($user = $result->fetch_assoc()) {
        // Connexion réussie
        $_SESSION['user'] = $user;
        echo json_encode(['success' => true]);
    } else {
        // Échec de la connexion
        echo json_encode(['success' => false, 'errorMessage' => 'Nom d’utilisateur ou mot de passe incorrect']);
    }
    $stmt->close();
    $conn->close();
}
?>