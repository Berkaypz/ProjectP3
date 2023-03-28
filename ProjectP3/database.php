<?php
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=localhost;dbname=registration", $Firstname, $Password);
    /* het pakt alle errors op en laat het in een bericht zien */
}catch(PDOException $error){
echo $error->getMessage();
}


?>
