<?php
include 'header.php';

if (isset($_POST['submit'])) {
  $client =     $_POST['nom'];
  $portable =     $_POST['portable'];
  $email =   $_POST['email'];
  $max = $_POST['max'];
  $adresse = $_POST['adresse'];
  $sql = "SELECT * FROM clients WHERE telephone='$portable'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) echo "<script>alert('" . $client . " deja existe')</script>";
  else {
    $sql = "INSERT INTO clients (nom, telephone, email, montantmax, adresse)
                            VALUES ('$client', '$portable', '$email', '$max', '$adresse')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Nouveau client créé avec succès')</script>";
      header("location: listeclients.php");
    } else {
      echo "<script>alert('Erreur')</script>";
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>

<div class="container">
  <div class="title">Nouveau client</div>
  <div class="content">
    <form method="post" action="">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nom</span>
          <input type="text" name="nom" placeholder="client..." required>
        </div>
        <div class="input-box">
          <span class="details">N° téléphone</span>
          <input type="text" name="portable" placeholder="n° téléphone..." required>
        </div>

        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" name="email" placeholder="email...">
        </div>
        <div class="input-box">
          <span class="details">Montant max</span>
          <input type="number" name="max" placeholder="montant max...">
        </div>
        <div class="input-box">
          <span class="details">Adresse</span>
          <input type="text" name="adresse" placeholder="adresse...">
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Entrer" name="submit">
      </div>
    </form>
  </div>
</div>
</body>

</html>