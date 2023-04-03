<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/8twitter.png" type="image/x-icon">
    <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" 
    />
    <link 
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" 
    rel="stylesheet"
    />
    <title>Sign-up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <section class="login-page">
        <div class="login">
            <div class="login-content">
            <a href="home.php" class="active"><i class="fas fa-home"></i></a>
                <h2>Sign up to Chirpify</h2>
                <form action="insert_data.php" method="post" class="login-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="login-user-info" placeholder="Email" name="email"/>
                    <label for="username">Username</label>
                    <input type="text" id="username" class="login-user-info" placeholder="Username" name="username"/>
                    <label for="password">Password</label>
                    <input type="password"  placeholder="Password" name="password" />
                    <input type="submit" value="Sign-up" name="submit"  /> 
                </form>
            </div>
        </div>
    </section>
</body>
   </html>