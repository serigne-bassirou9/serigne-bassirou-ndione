<form action="page11b.php" method="POST">
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
      $requete="SELECT numS , nomS , Categorie from Service";
      echo"
    <table border = 1px cellspacing= 0 style='margin-top: 50px; margin-bottom: 50px;'>
      <thead>
        <tr>  
             <th style='padding: 7px>num fonction</th>
             <th style='padding: 7px>nom fonction</th>
             <th style='padding: 7px>designation fonction</th>
        </tr>   
      </thead>";
      while ($res = mysqli_fetch_array($requete)){
          echo "<tbody>
                <tr>
                <td style='padding: 7px;'>{$res["numf"]}</td>
                <td style='padding: 7px;'> {$res["nom"]}</td>
                <td style='padding: 7px;'>{$res["design"]}</td>
                </tr>
                </tbody>
               ";
      };
      echo" </table>";
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
};