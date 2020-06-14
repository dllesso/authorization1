<html>
<head>
   <meta charset = "utf-8">
   <link rel="stylesheet" href="style.css"/>
   <title>авторизация</title>
</head>
<body>
<center><img src="shapka.png"></center>
<?php
require "db.php";

$data = $_POST;
if( isset($data['do_login']) )
{
	$errors = array(); 
	$user = R::findOne('users', 'login = ?', array( $data['login'] ));
	
	//
	if( $user )
	{
		//телефон существует
		
			$_SESSION['logged_user']=$user;
			?><center><div>
			<?php
			echo'Телефон веден верно, пароль для входа  ';
			$id = md5(uniqid(rand(),true));
            print $id."<br>";
			echo'действителен в течении 3 минут';
			//$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			//require ('signup.php');
			header('Location: signup.php'); exit;
			
			} else
	{?>
     
	 <?php
		$errors[] = 'телефон не найден';
		
	}
	if( ! empty($errors))
	{
	
	echo'<center><div class = "red">'.array_shift($errors).'</div></center> 
	</hr>';
	}
}


$fd = fopen("hello.txt", 'w') or die("не удалось создать файл");
$id = md5(uniqid(rand(),true));
fwrite($fd, $id);
fclose($fd);
  
?>
<?php



$fd1=fopen("time.txt", 'w')or die("не удалось создать файл");
$today[1] = date("s"); 
fwrite($fd1, $today[1]);
fclose($fd1);
?>

<center>

<div>
</br>
<center><p class ="smoll">ДОБРО ПОЖАЛОВАТЬ!</br>
Холдинг безопасности «Нева»</br>
Мы ближе! Мы быстрее! </p></center></br>
<form action="index.php" method = 'POST'>

<p class ="smoll1"><strong>Введите телефон</strong>:</p>
<input type = 'text' name = "login" value ="<?php echo @$data['login']; ?>">
</p>

<p>
<button type="submit" name = "do_login"><b>Оk</b></button>
</p>
</form>
</div>
<center/>
<body/>
<html/>