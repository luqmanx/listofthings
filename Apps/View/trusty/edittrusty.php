<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">

		<style type="text/css">
			h2
			{
				text-align: center;
			}
			.jumbotron
			{
				margin-top: 30px;
				margin-left: 50px;
				width: 800px;
			}
			td
			{
				padding: 10px;
			}
			.bottom
			{
				margin-left: 120px;
				margin-top: 50px;
			}
			

		</style>

	</head>

	<body>

		<div class="container">

			<div class="jumbotron">

				<h2><?php echo $title;?></h2>

			<?php if($edittrusty):?>

            <form method="post" action="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'saveedittrusty']);?>">

			<table>
				<?php foreach ($edittrusty as $edittrusty) :?>
				<input type="hidden" value="<?php echo $trusty_id;?>" name="tid">
				<tr>
					<td>Name: </td>
					<td><textarea class="form-control" rows="2" cols="50" name="trusty_name"><?php echo $edittrusty->trusty_name;?></textarea></td>
				</tr>
				<tr>
					<td>Contact Number:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="trusty_phone"><?php echo $edittrusty->trusty_phone;?></textarea></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="trusty_email"><?php echo $edittrusty->trusty_email;?></textarea></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="trusty_address"><?php echo $edittrusty->trusty_address;?></textarea></td>
				</tr>

					<input type="hidden" name="updated_date" value="<?php
							date_default_timezone_set('Asia/Kuala_Lumpur');
							$date = new Datetime;
							echo date_format($date, 'Y-m-d H:i:s');
							?>
							">
				<?php endforeach;?>



			</table>

				<div class="bottom">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'addtrusty']);?>" class="btn btn-primary">Back</a>
				</div>
              
              </form>

			<?php endif;?>

			</div>

		</div>

	</body>


</html>