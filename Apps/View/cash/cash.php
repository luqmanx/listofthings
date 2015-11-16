	<style type="text/css">
		    .jumbotron
		    {
		    	width: 1200px;
		    	background-color: white;
		    }
			.top1 {
				border: 1px solid #000;
				width: 100px;
				padding: 10px;
				margin-right: 20px;
			}
			td
			{
				padding: 10px;
			}
			.btn-primary
			{
				width: 150px;
			}
			.content
			{
				width: 120px;
				height: 80px;
				padding: 10px;
				margin-right: 20px;
				margin-top: 10px;
				border: 1px solid;
			}
			.link
			{
				width: 10px;
				margin-top: 20px;
			}

		</style>

		<script>
			$(document).ready(function(){ 
				var i = 1;
  				$('#add').click(function()
				{
   					$('#addrow'+i).html("<td>\
   						<textarea name='cash"+i+"[0]' placeholder='Fixed Deposit' class='form-control'></textarea> </td>\
   						<td><textarea name='cash"+i+"[1]' placeholder='eg. CIMB-KLCC' class='form-control'></textarea></td>\
   						<td><textarea name='cash"+i+"[2]' placeholder='eg. 123456789'  class='form-control'></textarea></td>\
   						<td><textarea class='form-control' placeholder='1000' name='cash"+i+"[3]'></textarea></td>\
   						<td><textarea class='form-control' placeholder='xxx' name='cash"+i+"[4]' /></textarea></td>\
   						<td><textarea class='form-control' placeholder='Phone' name='cash"+i+"[5]' /></textarea></td>\
   						<td><textarea class='form-control' placeholder='Email' name='cash"+i+"[6]' /></textarea></td>\
						<td><textarea class='form-control' placeholder='Email' name='cash"+i+"[7]' /></textarea></td>\
						<td><a href='javascript:void(0);' class='delete'><span class='glyphicon glyphicon-remove'></span></a></td>\
   						");
					
    				$("#secondtable").append('<tr id="addrow'+(i+1)+'"></tr>');
    				i++;

    		$(".delete").click(function(){
    			if(i>=1)
    			{
    				$('#addrow'+(i-1)).html('');
    				i--;

    			}
      		
    		}); 

    	});

			});
		</script>

		<script>
			function submitForm()
			{
				$('#submitcash').submit();
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				window.onload=function () {
			    $('#cash').addClass('active');
				};
			});
		</script>
	
			<div class="jumbotron">

				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'savecash']);?>" id="submitcash">

				<table id="secondtable" class="table">
					<tr>
						<th>What is it?</th>
						<th>Where is it?</th>
						<th>Account #</th>
						<th>Balance(RM)</th>
						<th colspan="3" style="text-align:center;">Contact</th>
						<th>Notes</th>
						<th></th>
						<th></th>
					</tr>
			
					<?php if($cash):?>
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
							<span class='glyphicon glyphicon-remove'></span></a>
							</td>
											
							<td>
								<a href='<?php echo $exe->url->create('default',['controller' => 'dashboard', 'action' => 'editcash']);?>?cid=<?php echo $cash->cash_id;?>'>
								<span class='glyphicon glyphicon-edit'></span></a>
							</td>
								

						</tr>
							
							
						<?php endforeach;?>
					<?php endif;?>

					<?php if(!$cash):?>
					<tr>
						<td><textarea class="form-control" placeholder="Current Account" name="cash0[0]"></textarea></td>
						<td><textarea class="form-control" placeholder="eg. CIMB-KLCC" name="cash0[1]"></textarea></td>
						<td><textarea class="form-control" placeholder="eg. 123456789" name="cash0[2]"></textarea></td>
						<td><textarea class="form-control" placeholder="1000" name="cash0[3]"></textarea></td>
						
						<td><textarea class="form-control" placeholder="xxx" name="cash0[4]"></textarea></td>
						<td><textarea class="form-control" placeholder="Phone" name="cash0[5]"></textarea></td>
						<td><textarea class="form-control" placeholder="Email" name="cash0[6]"></textarea></td>
							
						<td><textarea class="form-control" placeholder="Email" name="cash0[7]"></textarea></td>
					</tr>
					<?php endif;?>
			
					<tr id="addrow1"></tr>
				
				</table>

				<nav>
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="javascript:void(0);" id="add"><span class="glyphicon glyphicon-plus"></span>Add New</a></li>
							<li><a href="javascript:submitForm();"><span class="glyphicon glyphicon-floppy-save"></span>Save</a></li>
						</ul>
					</div>
				</nav>
				
				</form>

				</div>
			