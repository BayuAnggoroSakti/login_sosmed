
<?php
session_start();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Google Account by CodexWorld</title>
<style type="text/css">
h1
{
font-family:Arial, Helvetica, sans-serif;
color:#999999;
}
.wrapper{width:600px; margin-left:auto;margin-right:auto;}
.welcome_txt{
	margin: 20px;
	background-color: #EBEBEB;
	padding: 10px;
	border: #D6D6D6 solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box{
	margin: 20px;
	background-color: #FFF0DD;
	padding: 10px;
	border: #F7CFCF solid 1px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
}
.google_box .image{ text-align:center;}
</style>
</head>
<body>
<div class="wrapper">
   <?php 
    if (!isset($_SESSION['id'])) { ?>
       <a href="config/fb_config.php">Facebook</a>
       <a href="src/Google/autoload.php">Google</a>
      <?php } else{ ?>

      	<h1><?php echo $_SESSION['sosmed'] ?></h1>
		    <?php
		    echo '<div class="welcome_txt">Welcome <b>'.$_SESSION['nama'].'</b></div>';
		    echo '<div class="google_box">';
		    echo '<p class="image"><img src="'.$_SESSION['foto'].'" alt="" width="300" height="220"/></p>';
		    echo '<p><b>Google ID : </b>' . $_SESSION['id'].'</p>';
		    echo '<p><b>Name : </b>' . $_SESSION['nama'].'</p>';
		    echo '<p><b>Email : </b>' . $_SESSION['email'].'</p>';
		    echo '<p><b>Logout from <a href="logout.php?logout">'.$_SESSION['sosmed'].'</a></b></p>';
		    echo '</div>';
		    ?>


      	<?php }?>
</div>
</body>
</html>