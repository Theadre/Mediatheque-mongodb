<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<html>
  <head>
    <title>Exercice 2</title>
  </head>
  <body>  
  <h2><p>Création d'un nouvel utilisateur</p></h2>
  <form action="" method="post">
  <table width="300">
    <tbody>
      <tr>
        <th align="justify"><label>Utilisateur</label></th>
        <td><input type="text" name="t1" id="t1" maxlength="15" ></td>
      </tr>
      <tr>
        <th align="justify"><label>Mot de passe</label></th>
        <td><input type="password" name="t2" id="t2" maxlength="15" ></td>
      </tr>

    </tbody>
  </table>
  <input type="submit" name="b1" id="b1" value="Créer">


  <?php 
  
if( isset($_POST['b1']) ){

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $bulk = new MongoDB\Driver\BulkWrite;
    $obj = array('_id' => addslashes ($_POST['t1']), 'pwd' => addslashes ($_POST['t2']));
    $bulk->insert($obj);
    $mng->executeBulkWrite('groupe_f.user', $bulk);

  print "<script>window.location='index.php';</script>";
}
  ?>

  </form>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>
</html>