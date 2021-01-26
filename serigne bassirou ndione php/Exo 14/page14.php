<?php
$servername = "mysql.hostinger.fr";
$database = "u000000001_nom";
$username = "u000000001_user";
$password = "MotDePasse";
$matricule=$_POST['Matricule'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Échec de la connexion : " . mysqli_connect_error());
};
 
echo "Connexion réussie";
// champ select 
echo"
<form action='page14.php' method='POST'>
<select name='service'>";
    
$requete="SELECT numS , nomS , Categorie FROM Service";
while($select= mysqli_fetch_array($requete)){
    echo"<option>{$select['numS']}</option>";
};
echo"</select>
</form>";

// requete sql 
$sql="SELECT E.nomE, E.prenomE , E.MatE FROM Employés E , Service S
WHERE S.numS= {$_POST['service']}
 Group by S.numS";
if (mysqli_query($conn, $sql)) {
      echo "Employé existe ";
// affichage dans un tableau 
      echo"
    <table>
      <thead>
        <tr>  
             <th>nom Employé</th>
             <th>prenom Employé</th>
             <th>matricule Employé</th>
        </tr>   
      </thead>";
      while ($res = mysqli_fetch_array($sql)){
          echo "<tbody>
                <tr>
                <td>{$res['nomE']}</td>
                <td> {$res['prenomE']}</td>
                <td>{$res['MatE']}</td>
                </tr>
                </tbody>
                ";
      };
      echo"</table>";
}else{
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
};