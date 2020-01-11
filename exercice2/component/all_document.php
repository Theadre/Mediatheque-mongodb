<?php
    $documents = $db->query();
?>

<h1>Les titres des documents</h1>

<table class='table'>
  <thead class='thead-dark'>
    <th scope='col'>Titre</th>
    <th scope='col'>Auteur</th>
    <th scope='col'>Type</th>
    <th scope='col'>Action</th>
  </thead>
  <tbody>
    <?php foreach ($documents as $doc) {?>
      <tr>
        <td> <?php echo $doc->fields->titre_avec_lien_vers_le_catalogue; ?></td>
        <td> <?php echo empty($doc->fields->auteur) ? "---" : $doc->fields->auteur; ?></td>
        <td> <?php echo empty($doc->fields->type_de_document) ? "---" : $doc->fields->type_de_document; ?></td>

        <!-- action -->
        <td>
          <form action="" role="form" method="post" >
            <input name="id" value="<?php echo $doc->_id ?>" type="hidden">

            <button id="<?php echo $doc->_id ?>" type="submit" 
                <?php echo !empty($doc->idBorrower) ?  ($doc->idBorrower == $currentUser->_id ?  '' : 'disabled') : '' ?>
                class="<?php echo !empty($doc->idBorrower) ? ($doc->idBorrower == $currentUser->_id ? 'btn btn-warning' : 'btn btn-secondary') : 'btn btn-primary' ?>" >
              <?php echo !empty($doc->idBorrower) ?  ($doc->idBorrower == $currentUser->_id ?  'Render' : 'pas dispo') : 'Emprunter' ?>
            </button>
          </form>

          <?php
            if (isset($_POST["id"]) && $_POST["id"] == $doc->_id) {
              if (empty($doc->idBorrower)) {
                $doc->idBorrower = $currentUser->_id;
                $i = $db->update($doc);
              } else {
                $doc->idBorrower = null;
                $i = $db->update($doc);
              }
              // resouder le probleme de varibale $POST
              print "<script>window.location='resolve.php';</script>";
            }
          ?>
        </td>
        <!-- end action -->
      </tr>
    <?php }?>
  </tbody>
</table>
