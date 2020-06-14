
<?php
$today[1] = date("s");
$id = htmlentities(file_get_contents("hello.txt"));
$vremya = htmlentities(file_get_contents("time.txt"));
$vrem=$vremya-$today[1];


require "db.php";

           
$data = $_POST;
if(isset($data['du_signup']))
{		
	$errors = array(); 
	//проверка на незаполнение формы
	if($vrem>=4){
		$id=$id+md5(uniqid(rand(),true));
	}
	
	if($data['password'] == '')
	{
		$errors[] = 'Введите password!';
	} 
	
	
	if($id == $data['password']){

    if(empty($errors))
	{
		
	// все хорошо регистрируем	
	
	$user = R::dispense('users');
	
	$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	R::store($user);
	
	echo'<div style = "color: green;">Успешная регистрация</div> 
	</div></hr>';
	header('Location: blank_page.html'); exit;
	}
	else
	{//выводим первый элемент массива ошибок
		echo'<div style = "color: red;">'.array_shift($errors).'</div> 
	</div></hr>';
	}
	}else echo'<center><p class ="red">Ошибка - пароль не введен или истек срок действия</p>
	</center>';
	
	echo $data['password'];
}

	;
?>

<html>
<head>
   <meta charset = "utf-8">
   <link rel="stylesheet" href="style.css"/>
   <title></title>
</head>
<body>
<center>
<?php
echo'Телефон введен верно, пароль для входа:  '; 
	?>
	</br>
	<p class = "white">
	<?php
    echo $id;
	?></p>
	</br>
	<?php
	echo'действителен в течении 3 минут';
	
?>

<form action="/signup.php" method = "POST">

<p>
<p><strong>Ваш пароль</strong>:</p>
<input type = "password" name = "password" value ="<?php echo @$data['password']; ?>">
</p>

<p>
<button type="submit" name = "du_signup">Ok</button>
</p>
</form>
<center/>
<body/>
<html/>


