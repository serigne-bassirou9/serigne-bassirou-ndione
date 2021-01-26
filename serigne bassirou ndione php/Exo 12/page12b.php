<form action="page12b.php" method="POST">
<div>
    <input type="number" id="b" name="numS" placeholder="numero dU SERVICE  ?" required/>
    <label for="b"> numero service  </label>
    <input type="text" id="c" name="nomS" placeholder=" NOM du service?" required/>
    <label for="c"> NOM SERVICE </label>
    <input type="text" id="d" name="cat" placeholder=" Categorie  ?" required/>
    <label for="d"> Categorie </label>
    <br><br>
    <input type="submit" name="envoyer " value="enregistrer" >
</div>
</form>
<?php
$servername = "mysql.hostinger.fr";
$database = "u000000001_nom";
$username = "u000000001_user";
$password = "MotDePasse";
$num=$_POST['numS'];
$nom=$_POST['nomS'];
$cat=$_POST['cat'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Échec de la connexion : " . mysqli_connect_error());
};
 
echo "Connexion réussie";
 
$sql = "INSERT INTO  Service (numS , nomS, Categorie) VALUES ($num,$nom,$cat)";
if (mysqli_query($conn, $sql)) {
      echo "Nouveau enregistrement créé avec succès";
      $afficher="SELECT numS , nomS , Categorie from Service";
      echo "$afficher";
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
};