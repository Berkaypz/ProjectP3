<?php
if(isset($_POST['update'])){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=chirpify", "root", "");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

    $ID = $_POST['ID'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

$query  =  "UPDATE register SET username=:username, email=:email, password=:password WHERE ID=:ID";

$pdoResult = $conn->prepare($query);
$password = password_hash(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
$pdoExec = $pdoResult->execute(array(":username"=>$username, ":email"=>$email, ":password"=>$password, ":ID"=>$ID));

if($pdoExec){
    echo 'Data update';
}else{
   echo 'Error Data not updated'; 
}
}


?>

<html>
<link 
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" 
    rel="stylesheet"
    />
    <link rel="stylesheet" href="post.css">
 <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <head></head>
    <body>
    <a href="index_post.php" class="active"><i class="fas fa-home"></i></a>
        <h1>Welkom Berkay!</h1>
        <br>
    <form action="" method="POST">
        <label for="">id</label>
        <input type="text" name="ID" placeholder="id" ><br><br>

        <label for="">Update username</label>
        <input type="text" name="username"><br><br>
        <label for="">Update email</label>
        <input type="text" name="email"><br><br>
        <label for="">Update password</label>
        <input type="password" name="password"><br><br>
        <input type="submit" name="update" value="update">
    </form>


    </body>
</html>