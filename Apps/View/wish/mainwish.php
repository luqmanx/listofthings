

		<style type="text/css">
			.jumbotron
			{
				background-color: white;
			}
			td
			{
				padding:10px;
			}
			.btn-primary
			{
				width: 150px;
			}
			.link
			{
				width: 10px;
				margin-top: 30px;
			}
		</style>

			<div class="jumbotron">


				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'addwish']);?>">


					<?php if($wish):?>

						<table class="table table-striped" id="content">
							
							<thead>
								<tr>

									<th>What is it?</th>
									<th>Where is it?</th>
									<th>Account #</th>
									<th>What do I want to with it?</th>
									<th>Notify</th>
									<th></th>
									<th></th>

								</tr>
							</thead>

						<?php foreach ($wish as $wish): ?>

						<tr>

							<td><?php echo $wish->wish_type;?></td>
							<td><?php echo $wish->wish_address;?></td>
							<td><?php echo $wish->wish_acc;?></td>
							<td>
								<?php if($wish->wish_dolist):?>
									<?php echo $wish->wish_dolist;?>
								<?php endif;?>
							</td>
								
							<td>
								<?php if($wish->wish_notify):?>
									<?php echo $wish->wish_notify;?>
								<?php endif;?>
							</td>

							<td>
								<a href='<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'deletewish']);?>?wid=<?php echo $wish->wish_id;?>' onclick="return confirm('Are you sure to delete?')">
							<i class='fa fa-remove'></i></a>
							</td>
											
							<td>
								<a href='<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'editwish']);?>?wid=<?php echo $wish->wish_id;?>'>
								<i class='fa fa-edit'></i></a>
							</td>

						</tr>

					<?php endforeach;?>
					
					</table>

				<?php endif;?>

					<?php if(!$wish):?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>What is it?</th>
								<th>Where is it?</th>
								<th>Account #</th>
								<th>What do I want to with it?</th>
								<th>Notify</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td>No data found</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
					
					<?php endif;?>

					<div style="text-align:right;">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Add New</button>
					</div>

				</form>
					
				
				</div>