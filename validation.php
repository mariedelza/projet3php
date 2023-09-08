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

// Récupération des données du formulaire
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Vérification des champs obligatoires
if (empty($prenom) || empty($nom) || empty($email) || empty($password) || empty($confirm_password)) {
    $error = "Tous les champs sont obligatoires.";
    header("Location: index.html?error=" . urlencode($error));
    exit();
}

// Vérification si l'adresse e-mail existe déjà dans la base de données
$sql = "SELECT * FROM inscrit WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $error = "L'adresse e-mail existe déjà.";
    header("Location: inscription.php?error=" . urlencode($error));
    exit();
}

// Vérification si les mots de passe correspondent et ont une longueur minimale de 4 caractères
if ($password !== $confirm_password || strlen($password) < 4) {
    $error = "Les mots de passe ne correspondent pas ou sont trop courts (minimum 4 caractères).";
    header("Location: inscription.php?error=" . urlencode($error));
    exit();

}

// Hachage du mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insérer l'utilisateur dans la base de données
$insert_sql = "INSERT INTO inscrit (prenom, nom, email, password) VALUES ('$prenom', '$nom', '$email', '$hashed_password')";

if ($conn->query($insert_sql) === TRUE) {
    $message = "Inscription réussie !";
    header("Location: inscription.php?message=" . urlencode($message));
} else {
    $error = "Erreur lors de l'inscription : " . $conn->error;
    header("Location: inscription.php?error=" . urlencode($error));
}

// Fermer la connexion à la base de données
$conn->close();
