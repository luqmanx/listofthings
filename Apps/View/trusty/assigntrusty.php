		<style type="text/css">
			.jumbotron
			{
				margin-top: 30px;
				background-color: white;
			}
		</style>

		<div class="jumbotron">
			<form method="post" action="<?php echo $exe->url->create('default',['controller'=>'trusty','action'=>'addtrusty']);?>">

				<?php if($trusty):?>
					<?php $i=1;?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Address</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<?php foreach ($trusty as $trusty):?>
							<tr>
								<td><?php echo $i;$i++;?></td>
								<td><?php echo $trusty->trusty_name;?></td>
								<td><?php echo $trusty->trusty_phone;?></td>
								<td><?php echo $trusty->trusty_email;?></td>
								<td><?php echo $trusty->trusty_address;?></td>
								<td><a href='<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'deletetrusty']);?>?tid=<?php echo $trusty->trusty_id;?>' onclick="return confirm('Are you sure to delete?')">
							<i class='fa fa-remove'></i></a></td>
								<td><a href='<?php echo $exe->url->create('default',['controller' => 'trusty','action' => 'edittrusty']);?>?tid=<?php echo $trusty->trusty_id;?>'>
								<i class='fa fa-edit'></i></a></td>
							</tr>
						<?php endforeach;?>
					</table>
				<?php endif;?>

				<?php if(!($trusty)):?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Contact Number</th>
								<th>Email</th>
								<th>Address</th>
							</tr>
						</thead>
						<tr>
							<td></td>
							<td>No data for trusty found</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				<?php endif;?>


					</table>

					<div style="text-align:right;">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Add Trusty</button>
					</div>

			</form>
		</div>
			