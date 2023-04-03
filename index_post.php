<?php require_once "header.php"; ?>

<body>

<?php
if(isset($_POST['btn_add_post']))
{
    $post_text = $_POST['post_text'];

    if ($post_text != "") {

    $sql = "INSERT INTO posts (post_text,post_date) VALUES('$post_text', now())";
    $result = mysqli_query($con,$sql);
   }
}
?>






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

    <a href="home.php" class="active"><i class="fas fa-home"></i></a>
    <div class="grid-container">
        <div class="main">
            <p class="page__title">Home</p>
        </div>
      
    </div>
<div class="tweet__box tweet__add">
    <div class="tweet__left">
        <img src="images/user2.jpg" alt="">
</div>

<div class="tweet__body">
    <form method="post" enctype="multipart/form-date">
         <textarea name="post_text" id="" cols="100%" rows="3" 
         placeholder="What's happening?"></textarea>
        

<div class="tweet__icons-wrapper">
    <div class="tweet__icons-add">
         <i class="far fa-image"></i>
         <i class="fa fa-chart-bar"></i>
         <i class="far fa-smile"></i>
         <i class="far fa-calendar-alt"></i>
    </div>

<button class="button__tweet" type="submit" name="btn_add_post">Tweet</button>


</div>
</form>
</div>
</div>

<?php require_once "tweet.php"; ?>

</div>
</div>

<?php
 if(isset($GET['del']))
 {
    $Del_ID = $_GET['del'];
    $sql = "delete from posts where post_id='$Del_ID'";
    $post_query = mysqli_query($con,$sql);

    if($sql)
    {
        header("location: index_post.php");
    }
 }
?>

</body>
</html>