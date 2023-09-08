<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bodie">
    <div class="formeconnexion">
        <div class="form-text">
            Connexion
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
            <form action="traitement.php" method="post">

                <span>Email</span>
                <input type="email" name="email" placeholder="ex:ndiayemariedelza@gmail.com">
                <span>Mot de passe</span>
                <input type="password" name="password" placeholder="entrez votre mot de passe">
                <span>Confirmer mot de passe</span>
                <input type="password" name="confirm_password" placeholder="confirmer votre mot de passe">
                <input type="submit" value="Se connecter" class="btnconnexion">
                Si vous n'avez pas encore de compte? <a href="inscription.php" class="assa">Creer d'abord un compte !!</a>
            </form>
        </div>
    </div>
</body>

</html>