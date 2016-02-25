

      <style type="text/css">
		    .jumbotron
		    {
		    	width: 1050px;
		    	background-color: white;
		    }

		</style>
	
			<div class="jumbotron">

				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'addnewcash']);?>">

				<div class="card-block">
						
						<?php if($cash):?>
						<table class="table table-striped">
						    <thead>
							<tr>
								<th>What is it?</th>
								<th>Where is it?</th>
								<th>Account #</th>
								<th>Balance(RM)</th>
								<th>Contact</th>
								<th></th>
								<th></th>
								<th>Notes</th>
								<th></th>
								<th></th>
							</tr>
							</thead>
							<?php foreach ($cash as $cash) :?>
							
					         <tr>
								<td><?php echo $cash->account_type;?></td>
								<td><?php echo $cash->bank_place;?></td>
								<td><?php echo $cash->account_no;?></td>
								<td><?php echo $cash->balance;?></td>

											<td><?php echo $cash->name;?></td>
											<td><?php echo $cash->phone;?></td>
											<td><?php echo $cash->email;?></td>
		
								<td><?php echo $cash->next_email;?></td>

								<td>
									<a href='<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'deletecash']);?>?cid=<?php echo $cash->cash_id;?>' onclick="return confirm('Are you sure to delete?')">
								<i class='fa fa-remove'></i></a>
								</td>
												
								<td>
									<a href='<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'editcash']);?>?cid=<?php echo $cash->cash_id;?>'>
									<i class='fa fa-edit'></i></a>
								</td>
								

							 </tr>
							
							
							<?php endforeach;?>
							</table>
						<?php endif;?>

						<?php if(!$cash):?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>What is it?</th>
									<th>Where is it?</th>
									<th>Account #</th>
									<th>Balance(RM)</th>
									<th>Contact</th>
									<th>Notes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td>No data found</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<?php endif;?>
						
					
					
				</div>

				<div style="text-align:right;">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Add New</button>
				</div>
				
				</form>

				</div>
			