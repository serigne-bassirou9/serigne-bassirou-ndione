<form action="page11.php" method="POST">
<div>
    <input type="number" id="b" name="num" placeholder="numero de la fonction  ?" required/>
    <label for="b"> numero fonction  </label>
    <input type="text" id="c" name="nom" placeholder=" NOM de la fonction?" required/>
    <label for="c"> NOM </label>
    <input type="text" id="d" name="desgn" placeholder=" Designation de la fonction  ?" required/>
    <label for="d"> DESIGNATION </label>
    <br><br>
    <input type="submit" name="envoyer " value="enregistrer" >
</div>
</form>

<?php
$servername = "mysql.hostinger.fr";
$database = "u000000001_nom";
$username = "u000000001_user";
$password = "MotDePasse";
$num=$_POST['num'];
$nom=$_POST['nom'];
$design=$_POST['desgn'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Échec de la connexion : " . mysqli_connect_error());
};
 
echo "Connexion réussie";
 
$sql = "INSERT INTO Fonction (numf , nom, design) VALUES ($num,$nom,$design)";
if (mysqli_query($conn, $sql)) {
      echo "Nouveau enregistrement créé avec succès";
      $afficher="SELECT numf , nom , design from Fonction";
      while ($res = mysqli_fetch_array($afficher)){
            echo "{$res['numf']}
                  {$res['nom']}
                  {$res['design']}
                  ";
        };
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
};