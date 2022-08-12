<table class='table table-bordered table-responsive-md bg_table'>
	<thead>
		<tr>
			<th>Code</th>
			<th>RS</th>
			<th>Rue</th>
			<th>CP</th>
			<th>Ville</th>
			<th>Pays</th>
			<th>Tel</th>
			<th>URL</th>
			<th>Email</th>
			<th>Fax</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($fournisseurs as $f):?>
			<tr>
				<td><?= $f->Code_fournisseur ?></td>
				<td class="element<?= $f->Id_fournisseur ?>"><?= $f->Raison_sociale ?></td>
				<td><?= $f->Rue_fournisseur ?></td>
				<td><?= $f->Code_postal ?></td>
				<td><?= $f->Localite ?></td>
				<td><?= $f->Pays ?></td>
				<td><?= $f->Tel_fournisseur ?></td>
				<td><?= $f->Url_fournisseur ?></td>
				<td><?= $f->Email_fournisseur ?></td>
				<td><?= $f->Fax_fournisseur ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>