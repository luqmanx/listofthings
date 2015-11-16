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
			button
			{
				margin-left: 280px;
				width: 150px;
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
						<li><a href="<?php echo $exe->url->create('signup');?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
					</ul>
				</div>
			</nav>

			<div class="jumbotron">
				<h1 style="color:#339933"><?php echo $title;?></h1>

				<?php if($exe->flash->has('error_login')):?>
				<p class="error"><?php echo $exe->flash->get('error_login');?></p>
				<?php endif;?>

				<form method="post" action="<?php echo $exe->url->create('loginprocess');?>">

					<table align="center">
						<tr>
							<td><label>Username:</label></td>
							<td><input type="text" name="login_name" class="form-control" size="40" value="<?php if($exe->flash->has('login_username')){echo $exe->flash->get('login_username');}?>" required></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="login_password" class="form-control" size="40" value="<?php if($exe->flash->has('login_password')){echo $exe->flash->get('login_password');}?>" required></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit" class="btn btn-primary">LOGIN</button></td>
						</tr>
					</table>
				</form>
			</div>

		</div>

	</body>

</html>