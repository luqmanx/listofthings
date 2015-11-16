
		<style type="text/css">
		
			.jumbotron
			{
				background-color: white;
			}
		</style>

		<script type="text/javascript">
			$(document).ready(function(){
				window.onload=function () {
			    $('#asset').addClass('active');
				};
			});
		</script>

			<div class="jumbotron">

				<table class="table">
					<tr>

						<td>No.</td>
						<td>What is it?</td>
						<td>Where is it?</td>
						<td>Developer</td>
					</tr>

						<?php $index=1;?>
						<?php if($viewasset):?>
							<?php foreach ($viewasset as $viewasset) :?>
							<tr>
								<td><?php echo $index;?></td>
								<td>
									<a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'editasset']);?>?aid=<?php echo $viewasset->asset_id;?>">
										<?php echo $viewasset->type;?>
									</a>
								</td>
								<td><?php echo $viewasset->address;?></td>
								<td><?php echo $viewasset->developer;?></td>
								<?php $index++;?>
								<td>
									<a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'deleteasset']);?>?aid=<?php echo $viewasset->asset_id;?>" onclick="return confirm('Are you sure to delete?')">
										<span class='glyphicon glyphicon-remove'></span>
									</a>
								</td>
							</tr>
							<?php endforeach;?>
						<?php endif;?>

				</table>
					
				<nav>
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="<?php echo $exe->url->create('default',['controller' => 'asset','action'=>'mainasset']);?>">
									<span class="glyphicon glyphicon-pencil"></span>Add more data
								</a>
							</li>
						</ul>
					</div>
				</nav>

			</div>
