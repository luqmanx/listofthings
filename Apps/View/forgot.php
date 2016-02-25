<?php
?>

<!DOCTYPE html>
<html lang = "en">

	<head>
		<meta name="viewport" content="width=device-width, inital-scale=1">
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
						<li><a href="<?php echo $exe->url->create('login');?>"><span class="glyphicon glyphicon-step-backward"></span>Back</a></li>
					</ul>
				</div>
			</nav>

			<div class="jumbotron">
				<h1 style="color:#339933"><?php echo $title;?></h1>

				<?php if($exe->flash->has('error_email')):?>
				<p class="error"><?php echo $exe->flash->get('error_email');?></p>
				<?php endif;?>

				<form method="post" action="<?php echo $exe->url->create('forgot_password');?>">

					<div class="card-block">
						<div class="form-group row">
							<label class="col-md-3 form-control-label">Email: </label>
							<div class="col-md-9">
								<input type="text" name="email_forgot" class="form-control" value="<?php if($exe->flash->has('email_forgot_error')){echo $exe->flash->get('email_forgot_error');}?>"required>
							</div>
						</div>
					</div>
					<br>
					<button class="btn btn-block btn-primary" type="submit">Submit</button>

				</form>

			</div>

		</div>
	</body>


</html>