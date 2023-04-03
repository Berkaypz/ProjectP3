<?php
session_start();

try {
    $conn = new PDO("mysql:host=localhost;dbname=chirpify","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['login'])) {
       
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        
        $query = $conn->prepare("SELECT * FROM register WHERE email = :email");
        $query->bindParam(":email", $email);
        $query->execute();

     
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Encrypted wachtwoord
            if (password_verify($password, $result['password'])) {
                // Sla de gebruikers-ID en gebruikersnaam op in de sessievariabelen
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                // Succesvol ingelogd
                echo "You have successfully logged in.";
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "There is no account with that email address.";
        }
       
        echo "<br>";
    }

    // Controleer of het registratieformulier is ingediend
    if (isset($_POST['submit'])) {
        // Haal de ingevoerde email, gebruikersnaam en wachtwoord op en filter deze
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = password_hash(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

        // Controleer of de ingevoerde email of gebruikersnaam al bestaat in de database
        $query = $conn->prepare("SELECT * FROM register WHERE email = :email OR username = :username");
        $query->bindParam(":email", $email);
        $query->bindParam(":username", $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Als er al een account bestaat met de ingevoerde email of gebruikersnaam, geef dan een foutmelding weer
        if ($result) {
            echo "An account with that email or username already exists.";
        } else
 {
            // Voeg een nieuw account toe aan de database
            $query = $conn->prepare("INSERT INTO register (email, username, password) VALUES (:email, :username, :password)");
            // bindParam betekent eigenlijk dat het gaat voorbereiden om het uit te voeren
            $query->bindParam(":email", $email);
            $query->bindParam(":username", $username);
            $query->bindParam(":password", $password);
            // Execute staat voor het uitvoeren van 
            if($query->execute()) {
                echo "Your account has been created.";
            } else {
                echo "An error occurred!";
            }
        }
        echo "<br>";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}


?>