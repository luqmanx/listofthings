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
			.container
		    {
		     background-image: url('<?php echo $assetUrl;?>/image/backgroundimage.jpg');
		    }
		</style>

	</head>

	<body>

		<div class="container">

			<nav>
				<div class="container-fluid">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo $exe->url->create('forgot');?>"><span class="glyphicon glyphicon-step-backward"></span>Back</a></li>
					</ul>
				</div>
			</nav>

			<div class="jumbotron">
				<div><h2><strong><?php echo $title;?></strong></h2></div>

				<form method="post">

					<div class="card-block">
						<div class="form-group row">
							
								<p>Reset link already being sent. Please check your email.</p>
						</div>
					</div>
					<br>

				</form>

			</div>

		</div>
	</body>


</html>