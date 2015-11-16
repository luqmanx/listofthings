<?php
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $assetUrl;?>/css/jasny-bootstrap.min.css">

		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jquery_v1_11_3.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo $assetUrl;?>/js/jasny-bootstrap.min.js"></script>

	</head>

	<body>

		<div class="container">

			<nav>
				<div class="container-fluid">
					<ul class="nav navbar-nav navbar-right">
						<li><div style="margin-right:40px;margin-top:15px;"><?php echo $name;?>,</div></li>
						<li><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'maininterface']);?>"><span class="glyphicon glyphicon-home"></span>Home</a></li>
						<li><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action' => 'signout']);?>"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
					</ul>
				</div>
			</nav>

			<!--table class="top">
				<tr>
					<td><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action'=> 'cash']);?>" class="btn btn-primary btn-lg btn-block" role="button">My Cash</a></td>
					<td><a href="<?php echo $exe->url->create('default',['controller'=>'asset','action'=>'mainasset']);?>" class="btn btn-primary btn-lg btn-block" role="button">My Assets</a></td>
					<td><a class="btn btn-primary btn-lg btn-block" role="button">My Insurance</a></td>
					<td><a class="btn btn-primary btn-lg btn-block" role="button">My Debt</a></td>
					<td><a href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>" class="btn btn-primary btn-lg btn-block" role="button">My Wish</a></td>
				</tr>
			</table-->
			<ul class="nav nav-tabs">
			    <li id="cash"><a href="<?php echo $exe->url->create('default',['controller' => 'dashboard','action'=> 'cash']);?>">My Cash</a></li>
			    <li id="asset"><a href="<?php echo $exe->url->create('default',['controller'=>'asset','action'=>'viewasset']);?>">My Assets</a></li>
			    <li><a href="#">My Insurance</a></li>
			    <li><a href="#">My Debt</a></li>
			    <li id="wish"><a href="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'mainwish']);?>">My Wish</a></li>
			  </ul>
			<?php echo $view->render();?>


		</div>

	</body>

</html>