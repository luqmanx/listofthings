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
			.container
		    {
		     background-image: url('<?php echo $assetUrl;?>/image/backgroundimage.jpg');
		    }
			.error
			{
				color:red;
			}
		</style>
	</head>

	<body>

	<div class="container">

		<nav>
	        <div class="container-fluid">
	          <ul class="nav navbar-nav navbar-right">
	            <li></li>
	            <li></li>
	          </ul>
	        </div>
	     </nav>

			<div class="jumbotron">

				<form method="post" action="<?php echo $exe->url->create('loginprocess');?>">

					<div class="card-block">
                        <div class="text-center">
                            <i class="icon-login"></i>
                            <h1 style="color:#339933"><?php echo $title;?></h1>
                        </div>
                        <?php if($exe->flash->has('error_login')):?>
                        <div class="text-center">
                        	<p class="error"><?php echo $exe->flash->get('error_login');?></p>
                        </div>
                        <?php endif;?>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" name="login_name" value="<?php if($exe->flash->has('login_username')){echo $exe->flash->get('login_username');}?>" required>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="login_password" value="<?php if($exe->flash->has('login_password')){echo $exe->flash->get('login_password');}?>" required>
                        </div>
                        <br>
                        <button class="btn btn-block btn-success" type="submit">Sign In</button>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-6 text-center"><a href="<?php echo $exe->url->create('signup');?>" class="btn btn-link">Sign Up</a></div>
                            <div class="col-xs-6 text-center"><a href="<?php echo $exe->url->create('forgot');?>" class="btn btn-link">Forgot Password?</a></div>
                        </div>
                    </div>
                	</div>
				
				</form>
			</div>

		</div>

	</body>

</html>