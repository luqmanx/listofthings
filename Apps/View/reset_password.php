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


			<div class="jumbotron">
				<?php if($user_id):?>
				<h1 style="color:#339933"><?php echo $title;?></h1>

					<div class="card-block">
						<div class="form-group row">
							<label class="col-md-3 form-control-label"></label>
							<div class="col-md-9">
								Password already being reset.<br>
								Click <a href="<?php echo $exe->url->create('login');?>"> here </a>to sign in
							</div>
						</div>
					</div>
					<br>
					<?php endif;?>

					<?php if(!($user_id)):?>
					<p></p>
					<?php endif;?>

			</div>

		</div>
	</body>


</html>