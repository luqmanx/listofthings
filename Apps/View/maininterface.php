<?php

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">

		<style type="text/css">
			table
			{
				margin-top: 30px;
			}
			td{
				padding: 30px;
			}
			.btn-primary{
				width: 200px;
				height: 100px;
			}
			.space
			{
				padding-top: 3px;
			}
		
		</style>

	</head>

	<body>

		<div class="container">

			<nav>
        		<div class="container-fluid">
          			<ul class="nav navbar-nav navbar-right">
            			<li>Welcome, <?php echo $name;?><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'signout']);?>"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
          			</ul>
        		</div>
      		</nav>

			<table align="center">
				<tr>
					<td><a href="#" class="btn btn-primary" role="button"><h2>My Financial</h2></a></td>
					<td><a href="#" class="btn btn-primary" role="button"><h2>My Deeds</h2></a></td>
					<td><a href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>" class="btn btn-primary" role="button"><h2>My Wish</h2></a></td>
				</tr>
				<tr>
					<td><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action'=> 'cash']);?>" class="btn btn-default btn-block" role="button">My Cash</a></td>
					<td><a href="#" class="btn btn-default btn-block" role="button">My Deeds</a></td>
				</tr>
				<tr>
					<td class="space"><a href="<?php echo $exe->url->create('default',['controller' => 'asset','action' => 'viewasset']);?>" class="btn btn-default btn-block" role="button">My Assets</a></td>
					<td class="space"><a href="#" class="btn btn-default btn-block" role="button">My Charity</a></td>
				</tr>
				<tr> 
					<td class="space"><a href="#" class="btn btn-default btn-block" role="button">My Insurance</a></td>
					<td class="space"><a href="<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'addtrusty']);?>" class="btn btn-default btn-block" role="button">Assign Trusty</td>
				</tr>
				<tr>
					<td class="space"><a href="#" class="btn btn-default btn-block" role="button">My Debt</a></td>
					<td class="space"></td>
				</tr>
			</table>
		</div>

	</body>

</html>