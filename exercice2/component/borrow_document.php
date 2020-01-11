<?php
$filter = ["idBorrower" => $currentUser->_id];

$myBorrowers = $db->query($filter);
?>

<h1>Vos emprunts</h1>

<table class='table'>
  <thead class='thead-dark'>
    <th scope='col'>Titre</th>
    <th scope='col'>Auteur</th>
    <th scope='col'>Type</th>
    <th scope='col'>Action</th>
    <th scope='col'></th>
  </thead>
  <tbody>
  <?php foreach ($myBorrowers as $doc) {?>
    <tr>
      <td> <?php echo $doc->fields->titre_avec_lien_vers_le_catalogue; ?></td>
      <td> <?php echo empty($doc->fields->auteur) ? "---" : $doc->fields->auteur; ?></td>
      <td> <?php echo empty($doc->fields->type_de_document) ? "---" : $doc->fields->type_de_document; ?></td>

      <td>
        <!-- action -->
        <form action="" role="form" method="post" >
          <input name="idReturn" value="<?php echo $doc->_id ?>" type="hidden">

          <?php if(!empty($doc->idBorrower)) { ?>
            <button type="submit" class="btn btn-warning">Render</button>
          <?php }?>

        </form>

        <?php
          if (isset($_POST["idReturn"]) && $_POST["idReturn"] == $doc->_id) {
            $doc->idBorrower = null;
            $i = $db->update($doc);
            // resouder le probleme de varibale $POST
            print "<script>window.location='resolve.php';</script>";
          }
        ?>
        <!-- action -->
      </td>
    </tr>
  <?php }?>
  </tbody>
</table>