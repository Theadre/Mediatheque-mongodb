<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercice 2</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
      body {
        background: #dfdfdf;
      }
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 95vh;
      }
    </style>
  </head>
  <body>

<div class="container">
  <div class="card" style="width: 20rem;">
    <div class="card-body">
      <h5 class="card-title">Login</h5>
      <form method="post">
        <div class="form-group" method="post">
          <label for="exampleInputEmail1">Utilisateur</label>
          <input type="text" class="form-control" name="t1" id="t1">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe</label>
          <input type="password" class="form-control" name="t2" id="t2" value="123">
        </div>
        <button type="submit" name="b1" id="b1" class="btn btn-primary">Connexion</button>
        <a href="signupPage.php">Créer un compte</a>
      </form>
    </div>
  </div>
</div>
<?php 
  if (isset($_POST['b1'])) {
    require 'MyCollection.php';
    $db = new MyCollection('users');

    $user = array(
        'name' => addslashes($_POST['t1']),
        'pwd' => hash('sha512', addslashes($_POST['t2'])),
    );
    
    $rows = $db->query($user);
    
    if (count($rows) != 0) {
      session_start();
      $_SESSION['user'] = $rows[0];
      print "<script>window.location='index.php';</script>";
    } else {
      echo "<b><font color = red> Utilisateur ou mot de passe non reconnu </font></b>";
    }
  }
?>
</body>
</html>