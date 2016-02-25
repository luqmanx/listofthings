
		<style type="text/css">
		
			.jumbotron
			{
				background-color: white;
			}
		</style>

			<div class="jumbotron">

				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'addasset']);?>">

				<div class="card-block">

						<?php $index=1;?>
						<?php if($viewasset):?>
							
							<table class="table table-striped">
								<thead>
								<tr>

									<th>No.</th>
									<th>What is it?</th>
									<th>Where is it?</th>
									<th>Developer</th>
									<th></th>
									<th></th>
								</tr>
								</thead>

							<?php foreach ($viewasset as $viewasset) :?>
								<tr>
									<td><?php echo $index;?></td>
									<td><?php echo $viewasset->type;?></td>
									<td><?php echo $viewasset->address;?></td>
									<td><?php echo $viewasset->developer;?></td>
									<?php $index++;?>
									<td>
										<a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'deleteasset']);?>?aid=<?php echo $viewasset->asset_id;?>" onclick="return confirm('Are you sure to delete?')">
											<i class='fa fa-remove'></i>
										</a>
									</td>
									<td>
										<a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'editasset']);?>?aid=<?php echo $viewasset->asset_id;?>">
										<i class='fa fa-edit'></i></a>
									</td>
								</tr>
							
							<?php endforeach;?>
							</table>
						<?php endif;?>

						<?php if(!$viewasset):?>
						<table class="table table-striped">
							<thead>
							<tr>

								<th>No.</th>
								<th>What is it?</th>
								<th>Where is it?</th>
								<th>Developer</th>
							</tr>
							</thead>
							<tbody>
							<tr>

								<td></td>
								<td>No Data For Asset Found</td>
								<td></td>
								<td></td>

							</tr>
							</tbody>
						</table>
						<?php endif;?>

				

				</div>	

				<div style="text-align:right;">	
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Add asset</button>		
				</div>

				</form>
				

			</div>
