<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="forme">
        <div class="form-text">
            Inscription
        </div>
        <div class="form-saisie">
            <!-- Afficher les messages d'erreur ou de succès en haut du formulaire -->
            <?php

            if (isset($_GET['error'])) {
                echo '<div style="color: red; font-weight: 800;font-size:20px;">' . $_GET['error'] . '</div>';
            }

            if (isset($_GET['success'])) {
                echo '<div style="color: #46cb29; font-weight: 800;font-size:20px;">' . $_GET['success'] . '</div>';
            }
        
            ?>
            <form action="validation.php" method="post">
                <span>Prenom</span>
                <input type="text" name="prenom" placeholder="entrez votre prenom">
                <span>Nom</span>
                <input type="text" name="nom" placeholder="entrez votre nom">
                <span>Email</span>
                <input type="email" name="email" placeholder="ex:ndiayemariedelza@gmail.com">
                <span>Mot de passe</span>
                <input type="password" name="password" placeholder="entrez votre mot de passe">
                <span>Confirmer mot de passe</span>
                <input type="password" name="confirm_password" placeholder="confirmer votre mot de passe">
                <input type="submit" value="S'inscrire" class="btninscription" name="submit">
                Avez-vous dejas un compte? <a href="connexion.php">Connectez-vous ici !!</a>
            </form>
        </div>
    </div>
</body>

</html>