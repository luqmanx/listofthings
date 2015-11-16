

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

		<script type="text/javascript">
			$(document).ready(function(){

				var i = 1;
				$('#addwish').click(function(){

					$('#newrow'+i).html("<td><textarea class='form-control' name='wish"+(i+1)+"[0]' placeholder='XXX'></textarea></td>\
						<td><textarea class='form-control' name='wish"+(i+1)+"[1]' placeholder='XXX'></textarea></td>\
						<td><textarea class='form-control' name='wish"+(i+1)+"[2]' placeholder='XXX'></textarea></td>\
						<td style='width:250px;'><textarea class='form-control' name='wish"+(i+1)+"[3]' placeholder='XXX'></textarea></td>\
						<td><textarea class='form-control' name='wish"+(i+1)+"[4]' placeholder='XXX'></textarea></td>\
						<td><a href='javascript:void(0);' class='delete'><span class='glyphicon glyphicon-remove'></span></a></td>\
						");

					$("#content").append('<tr id="newrow'+(i+1)+'"></tr>');
    				i++;

    				$(".delete").click(function(){
    				if(i>=1)
    				{
    					$('#newrow'+(i-1)).html('');
    					i--;

    				}
    				}); 
				});

			});
		</script>

		<script type="text/javascript">
			function submitWish()
			{
				$('#submitwish').submit();
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				window.onload=function () {
			    $('#wish').addClass('active');
				};
			});
		</script>

			<div class="jumbotron">

				<table class="table" id="content">
				
					<tr>

						<th>What is it?</th>
						<th>Where is it?</th>
						<th>Account #</th>
						<th style="width:250px;">What do I want to with it?</th>
						<th>Notify</th>

					</tr>

				<form method="post" action="<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'savewish']);?>" id="submitwish">


					<?php if($wish):?>

						<?php foreach ($wish as $wish): ?>

						<tr>

							<td><?php echo $wish->wish_type;?></td>
							<td><?php echo $wish->wish_address;?></td>
							<td><?php echo $wish->wish_acc;?></td>
							<td style="width:250px;">
								<?php if($wish->wish_dolist):?>
									<?php echo $wish->wish_dolist;?>
									<input type="hidden" value="<?php echo $wish->wish_dolist;?>" name="asset[<?php echo $wish->wish_id;?>][0]">
								<?php endif;?>
								<?php if($wish->wish_dolist == ''):?>
									<textarea placeholder="XX" class="form-control" name="asset[<?php echo $wish->wish_id;?>][0]"></textarea>
								<?php endif;?>
							</td>
								
							<td>
								<?php if($wish->wish_notify):?>
									<?php echo $wish->wish_notify;?>
									<input type="hidden" value="<?php echo $wish->wish_notify;?>" name="asset[<?php echo $wish->wish_id;?>][1]">
								<?php endif;?>
								<?php if($wish->wish_notify == ''):?>
									<textarea placeholder="XX" class="form-control" name="asset[<?php echo $wish->wish_id;?>][1]"></textarea>
								<?php endif;?>
							</td>

							<td>
								<a href='<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'deletewish']);?>?wid=<?php echo $wish->wish_id;?>' onclick="return confirm('Are you sure to delete?')">
							<span class='glyphicon glyphicon-remove'></span></a>
							</td>
											
							<td>
								<a href='<?php echo $exe->url->create('default',['controller' => 'wish','action' => 'editwish']);?>?wid=<?php echo $wish->wish_id;?>'>
								<span class='glyphicon glyphicon-edit'></span></a>
							</td>

						</tr>
					
					<?php endforeach;?>

				<?php endif;?>

					<?php if(!$wish):?>
					<tr>
						<td><textarea class="form-control" name="wish1[0]" placeholder="XXX"></textarea></td>
						<td><textarea class="form-control" name="wish1[1]" placeholder="XXX"></textarea></td>
						<td><textarea class="form-control" name="wish1[2]" placeholder="XXX"></textarea></td>
						<td style="width:250px;"><textarea class="form-control" name="wish1[3]" placeholder="XXX"></textarea></td>
						<td><textarea class="form-control" name="wish1[4]" placeholder="XXX"></textarea></td>
					</tr>
					<?php endif;?>
					
					<tr id="newrow1"></tr>

					</table>

					<nav>
					<div class="container-fluid">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="javascript:void(0);" id="addwish"><span class="glyphicon glyphicon-plus"></span>Add New</a></li>
							<li><a href="javascript:submitWish();"><span class="glyphicon glyphicon-floppy-save"></span>Save</a></li>
						</ul>
					</div>
					</nav>

				</form>
					
				
				</div>