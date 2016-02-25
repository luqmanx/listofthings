<?php
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo $assetUrl;?>/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">

		<style type="text/css">
		.jumbotron
		{
			margin-top: 30px;
	 		margin-left: 250px;
	 		width: 500px;
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
		.container
	    {
	     background-image: url('<?php echo $assetUrl;?>/image/backgroundimage.jpg');
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
 				<div class="text-center">
	 				<i class="icon-login"></i>
	 				<h1 style="color:#339933"><?php echo $title;?></h1>
 				</div>

 				<?php if($exe->flash->has('error_user')):?>
   					<p class="error"><?php echo $exe->flash->get('error_user')?></p>
   				<?php endif;?>

 				<form method="post" action="<?php echo $exe->url->create("register");?>">

 					<div class="form-group">
		                <div class="input-group">
		                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if($exe->flash->has('username')){echo $exe->flash->get('username');}?>" required>
		                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="input-group">
		                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if($exe->flash->has('email')){echo $exe->flash->get('email');}?>" required>
		                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="input-group">
		                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if($exe->flash->has('password')){echo $exe->flash->get('password');}?>" required>
		                    <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
		                </div>
		            </div>

   				    <button type="submit" class="btn btn-primary" style="width:380px">REGISTER AND GET YOUR FREE JOURNAL</button>

 				</form>

 			</div>

 		</div>

   </body>


</html>