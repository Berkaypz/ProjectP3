<?php
// Start de PHP-sessie
session_start();

try {
    // Maak een nieuwe verbinding met de database
    $conn = new PDO("mysql:host=localhost;dbname=registration","root","");

    // Stel de error mode in van de databaseverbinding zodat uitzonderingen worden gegenereerd in plaats van fouten
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controleer of het login-formulier is ingediend
    if (isset($_POST['login'])) {
        // Haal de ingevoerde email en wachtwoord op en filter deze
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        // Bereid de database-query voor om een account te selecteren op basis van de ingevoerde email
        $query = $conn->prepare("SELECT * FROM accounts WHERE email = :email");
        $query->bindParam(":email", $email);
        $query->execute();

        // Haal de resultaten van de query op en sla ze op in een associatieve array
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Controleer of er een account is gevonden met de ingevoerde email
        if ($result) {
            // Controleer of het ingevoerde wachtwoord overeenkomt met het gehashte wachtwoord in de database
            if (password_verify($password, $result['password'])) {
                // Sla de gebruikers-ID en gebruikersnaam op in de sessievariabelen
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                // Geef een succesbericht weer
                echo "You have successfully logged in.";
            } else {
                // Geef een foutmelding weer als het wachtwoord onjuist is
                echo "Incorrect password.";
            }
        } else {
            // Geef een foutmelding weer als er geen account is gevonden met de ingevoerde email
            echo "There is no account with that email address.";
        }
        // Geef een scheidingsteken weer tussen de uitvoer
        echo "<br>";
    }

    // Controleer of het registratieformulier is ingediend
    if (isset($_POST['submit'])) {
        // Haal de ingevoerde email, gebruikersnaam en wachtwoord op en filter deze
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = password_hash(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

        // Controleer of de ingevoerde email of gebruikersnaam al bestaat in de database
        $query = $conn->prepare("SELECT * FROM accounts WHERE email = :email OR username = :username");
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
            $query = $conn->prepare("INSERT INTO accounts (email, username, password) VALUES (:email, :username, :password)");
            $query->bindParam(":email", $email);
            $query->bindParam(":username", $username);
            $query->bindParam(":password", $password);
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