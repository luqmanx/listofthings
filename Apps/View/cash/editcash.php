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

			<?php if($cashdata):?>

            <form method="post" action="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'saveeditcash']);?>">

			<table>
				<?php foreach ($cashdata as $cashdata) :?>
				<input type="hidden" value="<?php echo $cashid;?>" name="cid">
				<tr>
					<td>Account Type: </td>
					<td><textarea class="form-control" rows="2" cols="50" name="acc_type"><?php echo $cashdata->account_type;?></textarea></td>
				</tr>
				<tr>
					<td>Bank Place:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="bank_place"><?php echo $cashdata->bank_place;?></textarea></td>
				</tr>
				<tr>
					<td>Account No:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="acc_no"><?php echo $cashdata->account_no;?></textarea></td>
				</tr>
				<tr>
					<td>Balance(RM):</td>
					<td><textarea class="form-control" rows="2" cols="50" name="bal"><?php echo $cashdata->balance;?></textarea></td>
				</tr>
				<tr>
					<td>Name : </td>
					<td><textarea class="form-control" rows="2" cols="50" name="name"><?php echo $cashdata->name;?></textarea></td>
				</tr>
				<tr>
					<td>Phone : </td>
					<td><textarea class="form-control" rows="2" cols="50" name="phone"><?php echo $cashdata->phone;?></textarea></td>
				</tr>
				<tr>
					<td>Email : </td>
					<td><textarea class="form-control" rows="2" cols="50" name="email"><?php echo $cashdata->email;?></textarea></td>
				</tr>
				<tr>
					<td>Second Email:</td>
					<td><textarea class="form-control" rows="2" cols="50" name="next_email"><?php echo $cashdata->next_email;?></textarea></td>
				</tr>


				<?php endforeach;?>



			</table>

				<div class="bottom">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'cash']);?>" class="btn btn-primary">Back</a>
				</div>
              
              </form>

			<?php endif;?>

			</div>

		</div>

	</body>


</html>