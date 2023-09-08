<?php
// Connexion à la base de données (Assurez-vous de configurer les informations de connexion correctement)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire de connexion
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Vérification si les champs sont vides
if (empty($email) || empty($password) || empty($confirm_password)) {
    $error = "Tous les champs sont obligatoires.";
    header("Location: connexion.php?error=" . urlencode($error));
    exit();
}

// Vérification si les champs de mot de passe correspondent
if ($password !== $confirm_password) {
    $error = "Les mots de passe ne correspondent pas.";
    header("Location: connexion.php?error=" . urlencode($error));
    exit();
}

// Requête SQL pour vérifier si l'utilisateur existe en fonction de l'adresse e-mail
$sql = "SELECT * FROM inscrit WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];
    
    // Vérification si le mot de passe correspond
    if (password_verify($password, $hashed_password)) {
        // Mot de passe correct, connectez l'utilisateur.
        // Vous pouvez gérer la connexion de l'utilisateur ici.
        // Par exemple, en créant une session pour le maintenir connecté.
        session_start();
        $_SESSION['user_id'] = $row['id']; // Vous pouvez stocker l'ID de l'utilisateur dans la session
        $success = "Connexion réussie ! Bienvenue, " . $row['prenom'] . " " . $row['nom'];
        header("Location: connexion.php?success=" . urlencode($success));
        exit();
    } else {
        $error = "Mot de passe incorrect. Veuillez réessayer.";
        header("Location: connexion.php?error=" . urlencode($error));
        exit();
    }
} else {
    $error = "Adresse e-mail non enregistrée. Veuillez vous inscrire d'abord.";
    header("Location: connexion.php?error=" . urlencode($error));
    exit();
}

// Fermer la connexion à la base de données
$conn->close();
