<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<!-- Site Metas -->
<title>Tech Blog - NEWSPAPERS FOOTBALL</title>
<meta name="keywords" content="">
<meta name="description" content=""><meta name="author" content="">
    
<!-- Site Icons -->
<link rel="shortcut icon" href="/templates/techblog/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="/templates/techblog/images/apple-touch-icon.png">
<!-- Design fonts -->
<link href="https:/fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

<!-- Bootstrap core CSS -->
<link href="/templates/techblog/css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="/templates/techblog/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="/templates/techblog/css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="/templates/techblog/css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="/templates/techblog/css/version/tech.css" rel="stylesheet">
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Util/DBConnectionUtil.php';
    $newspaper_id = $_POST['anewspaper_id'];
    $name = $_POST['aname'];
    $email = $_POST['aemail'];
    $website = $_POST['awebsite'];
    $comment = $_POST['acomment'];
    $query = "INSERT INTO comment(name, email, website, comment, newspaper_id)
     VALUES ('{$name}','{$email}','{$website}','{$comment}','{$newspaper_id}')";
    $result = $mysqli->query($query);
?>
<?php $query1 = "SELECT * FROM comment WHERE newspaper_id = {$newspaper_id} ORDER BY comment_id DESC LIMIT 5";
    $result1 = $mysqli->query($query1);
    while($arComment = mysqli_fetch_assoc($result1)){
        $comment1 = $arComment['comment'];
        $created_at1 = $arComment['created_at'];
        $name1 = $arComment['name'];
    
?>
<div class="media">
    <a class="media-left" href="#">
      <img src="/templates/techblog/upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $name1;?><small><?php echo $created_at1;?></small></h4>
        <p><?php echo $comment1;?></p>
        <a href="#" class="btn btn-primary btn-sm">Reply</a>
    </div>
</div>
<?php
    }
    ?>