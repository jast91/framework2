<div class="row">
	<div class="col-xs-12">
		
	</div>
</div>
<h2>Categorias</h2>
<div class="table-responsive">
	<table class="table table-striped"> 
		<tr>
			<th>ID</th>
			<th>username</th>
			<th>Action</th>
		</tr>

	<?php foreach ($categories as $categorie): ?>
	<tr>
		<td><?php echo $categorie["categories"]["id"]; ?></td>
		<td><?php echo $categorie["categories"]["name"]; ?></td>
		<td>

			<?php
				echo $this->Html->link(
					"<span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>", "/categories/edit/".$categorie["categories"]["id"],
					array(
						"title"=>"Editar usuario",
						"target"=>"_blank"
					)
				);
			?>
			<?php
				echo $this->Html->link(
					"Delete", 
					"/categories/delete/".$categorie["categories"]["id"]
					
				);
			?>
			
		</td>
	</tr>
	<?php endforeach; ?>

	</table>
</div>
