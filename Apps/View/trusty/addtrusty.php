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

		<style type="text/css">
			.jumbotron
			{
				margin-top: 30px;
			}
			td{
				padding:10px;
			}
		</style>

		<script type="text/javascript">
			function submittrusty()
			{
				$('#formtrusty').submit();
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('#addtrusty').click(function(){
					$('#trusty').html("<td>2</td>\
						<td><input type='text' class='form-control' name='trusty_name' placeholder='Name'/></td>\
						<td><input type='text' class='form-control' name='trusty_phone' placeholder='Contact Number' /></td>\
						<td><input type='text' class='form-control' name='trusty_email' placeholder='Email' /></td>\
						<td><textarea class='form-control' name='trusty_address' placeholder='Address'></textarea></td>\
						<td><a href='javascript:void(0);' class='delete'><span class='glyphicon glyphicon-remove'></span></a></td>\
						");

					$('.delete').click(function()
					{
						$('#trusty').html('');
					});
				});
				
			});
		</script>

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

			<div class="jumbotron">
				<form method="post" action="<?php echo $exe->url->create('default',['controller'=>'trusty','action'=>'savetrusty']);?>" id="formtrusty">

					<table class="table">
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Contact Number</th>
							<th>Email</th>
							<th>Address</th>
						</tr>
					<?php if($trusty):?>
						<?php $i=1;?>
						<?php foreach ($trusty as $trusty):?>
							<tr>
								<td><?php echo $i;$i++;?></td>
								<td><?php echo $trusty->trusty_name;?></td>
								<td><?php echo $trusty->trusty_phone;?></td>
								<td><?php echo $trusty->trusty_email;?></td>
								<td><?php echo $trusty->trusty_address;?></td>
								<td><a href='<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'deletetrusty']);?>?tid=<?php echo $trusty->trusty_id;?>' onclick="return confirm('Are you sure to delete?')">
							<span class='glyphicon glyphicon-remove'></span></a></td>
								<td><a href='<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'edittrusty']);?>?tid=<?php echo $trusty->trusty_id;?>'>
								<span class='glyphicon glyphicon-edit'></span></a></td>
							</tr>
						<?php endforeach;?>
					<?php endif;?>
					<?php if(!$trusty):?>
						<tr>
							<td>1</td>
							<td><input type="text" class="form-control" name="trusty_name" placeholder="Name"></td>
							<td><input type="text" class="form-control" name="trusty_phone" placeholder="Contact Number"></td>
							<td><input type="text" class="form-control" name="trusty_email" placeholder="Email"></td>
							<td><textarea class="form-control" name="trusty_address" placeholder="Address"></textarea></td>
						</tr>
					<?php endif;?>

						<tr id="trusty"></td>

					</table>

					
					<nav>
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
							<?php if(!(!$trusty)):?>
							<li><a href="javascript:void(0);" id="addtrusty"><span class="glyphicon glyphicon-plus"></span>Add new</a></li>
							<?php endif;?>
							<li><a href="javascript:submittrusty();"><span class="glyphicon glyphicon-floppy-save"></span>Save</a></li>
						</ul>
					</div>
					</nav>
					

				</form>
			</div>
			
		</div>

	</body>
</html>
