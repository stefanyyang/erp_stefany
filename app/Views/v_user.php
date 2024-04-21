  <div class="content-wrapper">
  	 	<table class="table table-striped">
  	 	<tr>
	
	<th>No</th>
	<th>Username</th>
	 <td>password</th> 
	<th>Level</th>

	<?php 
	$no=1;
	foreach ($octa as $evan ) {
		?>
	

	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $evan->username?></td>
	    <td><?php echo $evan->password?></td>  
		<td><?php echo $evan->level?></td>
		<td>

		
	</tr>
	<?php 
}
?>


</table>
</div>
</div>
</div>

