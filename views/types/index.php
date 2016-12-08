<h2>Tipos</h2>

<div class="table-responsive">
	<table class="table table-striped">
		
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Action</th>
			</tr>

		<?php foreach ($types as $type): ?>
		<tr>
			<td><?php echo $type["types"]["id"]; ?></td>
			<td><?php echo $type["types"]["name"]; ?></td>
			<td>
				<a href="<?php echo APP_URL."/types/edit/".$type["types"]["id"]; ?>">Edit</a>
				<a href="<?php echo APP_URL."/types/delete/".$type["types"]["id"]; ?>">Delete</a>

			</td>
		</tr>
		<?php endforeach; ?>

		
	</table>

</div>