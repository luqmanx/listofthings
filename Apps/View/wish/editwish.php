<?php

?>

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

			<?php if($wish):?>

            <form method="post" action="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'updatewish']);?>">

			<table>
				<?php foreach ($wish as $wish) :?>
				<input type="hidden" value="<?php echo $wishid;?>" name="wid">
				<tr>
					<td>What is it?</td>
					<td><textarea class="form-control" rows="2" cols="50" name="wish_type"><?php echo $wish->wish_type;?></textarea></td>
				</tr>
				<tr>
					<td>Where is it?</td>
					<td><textarea class="form-control" rows="2" cols="50" name="wish_address"><?php echo $wish->wish_address;?></textarea></td>
				</tr>
				<tr>
					<td>Account #:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="wish_acc"><?php echo $wish->wish_acc;?></textarea></td>
				</tr>
				<tr>
					<td>What do I want to do with it:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="wish_dolist"><?php echo $wish->wish_dolist;?></textarea></td>
				</tr>
				<tr>
					<td>Notify : </td>
					<td><textarea class="form-control" rows="2" cols="50" name="wish_notify"><?php echo $wish->wish_notify;?></textarea></td>
				</tr>


				<?php endforeach;?>



			</table>

				<div class="bottom">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>" class="btn btn-primary">Back</a>
				</div>
              
              </form>

			<?php endif;?>

			</div>

		</div>

	</body>


</html>