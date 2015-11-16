<?php
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">

		<style type="text/css">
		.jumbotron
		{
			margin-top: 30px;
			background-color: #E6F5FA
		}
		h1
		{
			text-align: center;
		}
		table
		{
			margin-top: 30px;
		}
		td
		{
        	padding: 10px;
		}
		.error
		{
			color:red;
			text-align: center;
		}

		</style>

	</head>

	<body>
	
 		
 		<div class="container">

 			<nav>
 				<div class="container-fluid">
 					<ul class="nav navbar-nav navbar-right">
 						<li><a href="<?php echo $exe->url->create('login');?>"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
 					</ul>
 				</div>
 			</nav>

 			<div class="jumbotron">
 				<h1 style="color:#339933"><?php echo $title;?></h1>

 				<?php if($exe->flash->has('error_signup')):?>
   					<p class="error"><?php echo $exe->flash->get('error_signup')?></p>
   				<?php endif;?>

 				<form method="post" action="<?php echo $exe->url->create("signupprocess");?>">

   					
 					<table align="center">
 						<tr>
 							<td><label>Your Name : </label></td>
 							<td><input type="text" class="form-control" name="username_signup" size="40" value="<?php if($exe->flash->has('signup_username')){echo $exe->flash->get('signup_username');}?>" required></td>
 						</tr>
 						<tr>
 							<td><label>Your Email :</label></td>
 							<td><input type="email" class="form-control" name="email_signup" size="40" value="<?php if($exe->flash->has('signup_email')){echo $exe->flash->get('signup_email');}?>" required></td>
 						</tr>
 						<tr>
 							<td><label>Your password:</label></td>
 							<td><input type="password" class="form-control" name="password_signup" size="40" value="<?php if($exe->flash->has('signup_password')){echo $exe->flash->get('signup_password');}?>" required></td>
 						</tr>
 						<tr>
 							<td></td>
 							<td><button type="submit" class="btn btn-primary">REGISTER AND GET YOUR FREE JOURNAL</button></td>
 						</tr>
 					</table>

 				</form>

 			</div>

 		</div>

   </body>


</html>