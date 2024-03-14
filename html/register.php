<?php
session_start();


// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "Mika";
$password = "nG]Q4pWk)9V@lPL!";
$dbname = "gb-database";
$uploadDir = __DIR__ . '/../profile-images/'; // Assurez-vous que ce répertoire existe et que le serveur web a les permissions d'écriture

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['username'] ?? '';
    $userPassword = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm-password'] ?? '';
    $email = $_POST['email'] ?? '';
    $country = $_POST['country'] ?? '';
    $image = $_FILES['profile-image'];

    if ($userPassword != $confirmPassword) {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas.";
    } elseif (!empty($userName) && !empty($userPassword) && !empty($email) && !empty($country) && $image['error'] == UPLOAD_ERR_OK) {
        // Tout semble bon, procéder avec le téléchargement du fichier
        $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . "." . $fileExtension;
        $uploadFile = $uploadDir . $fileName;

        // Assurer que le fichier est une image
        $check = getimagesize($image["tmp_name"]);
        if($check === false) {
            $_SESSION['message'] = "Le fichier n'est pas une image.";
        } else {
            // Déplacer l'image téléchargée dans le répertoire de destination
            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                // Préparer la requête pour insérer les informations de l'utilisateur, y compris le nom de l'image de profil
                $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (username, password, email, country, `profile-image`) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $userName, $hashedPassword, $email, $country, $fileName);

                if ($stmt->execute()) {
                    $_SESSION['message'] = "Nouvel enregistrement créé avec succès, vous allez être redirigés";
                    $_SESSION['user'] = ['username' => $userName, 'profile-image' => $fileName]; // Stocker les infos de l'utilisateur dans la session
                    $redirectionScript = "<script>setTimeout(function(){ window.location.href = '../index.php'; }, 3000);</script>";
                    
                } else {
                    $_SESSION['message'] = "Erreur lors de l'enregistrement : " . $conn->error;
                }
                $stmt->close();
            } else {
                $_SESSION['message'] = "Il y a eu une erreur de téléchargement de l'image.";
            }
        }
    } else {
        $_SESSION['message'] = "Tous les champs sont requis, y compris l'image.";
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Register GB-Database</title>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
</head>

<body class="register-body">

    <section class="register-block">
        <div class="register-img">
            <img src="../images/robotGB.jpg" alt="">
        </div>
        <div class="register-content">
            <h2 class="form-title">SignIn</h2>

            <?php
                // Ici tu affiches les messages
                if (isset($_SESSION['message'])) {
                    echo '<p class="success-message">' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                }
                if (isset($_SESSION['error'])) {
                    echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
            ?>


            <form class="register-form" id="registerForm" action="register.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="User Name" name="username">
                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Confirm Password" name="confirm-password">
                <input type="email" placeholder="Email" name="email">
               
                <select name="country">
                    <option value="">Select Country</option>
                    <option value="Australia">Australia</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="Italy">Italy</option>
                    <option value="Japan">Japan</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Spain">Spain</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="UK">UK</option>
                    <option value="USA">USA</option>
                    <option value="Other">Other country</option>
                </select>
                <input type="file" name="profile-image" required>
                <button class="register-button" type="submit">Register</button>
            </form>
        </div>
    </section>

    <?php
    // Affichage du message de succès et ajout du script de redirection
    if (!empty($redirectionScript)) {
        echo $_SESSION['message'];
        echo $redirectionScript; // Affiche le script de redirection après 3 secondes
        unset($_SESSION['message']); // Nettoyez le message de la session pour qu'il ne s'affiche pas à nouveau
    }
    ?>



    <!-- <div class="container-register">
            
        </div> 
    -->



    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/8921e10786.js" crossorigin="anonymous"></script>
</body>

</html>