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
        <h5 class="card-title">Création d'un nouvel utilisateur</h5>
        <form method="post">
          <div class="form-group" method="post">
            <label for="exampleInputEmail1">Utilisateur</label>
            <input type="text" class="form-control" name="t1" id="t1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" class="form-control" name="t2" id="t2">
          </div>
          <button type="submit" name="b1" id="b1" class="btn btn-primary">Créer</button>
          <a href="loginPage.php">login</a>
        </form>
      </div>
    </div>
  </div>

  <?php 
    require 'MyCollection.php';
    if( isset($_POST['b1']) ) {

      $obj = array(
        'name' => addslashes ($_POST['t1']), 
        'pwd' => hash('sha512', addslashes ($_POST['t2']))
      );
      $db = new MyCollection('users');
      
      $i = $db->insert($obj);

      print "<script>window.location='loginPage.php';</script>";
    }
  ?>
</body>
</html>