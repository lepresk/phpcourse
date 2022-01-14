<?php

  if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO('mysql:host=localhost;dbname=projet_php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email' AND password = '$password'";

    $req = $pdo->query($sql);
    $resultat = $req->fetch();

    if($resultat == false) {
      echo "L'adresse email ou le mot de passe est invalide";
    } else {
      echo "L'utilisateur a bien été trouvé";
    }
  }
  
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card mt-5">
          <div class="card-header text-center">
            Connexion
          </div>
          <div class="card-body">

            <form method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
              </div>
  
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
              </div>
  
              <div class="d-grid">
                <button class="btn btn-primary">Se connecter</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>