<table class='table table-bordered table-responsive-md bg_table'>
	<thead>
		<tr>
			<th>Livre</th>
			<th>Auteur</th>
			<th>Fournisseur</th>
			<th>Date d'achat</th>
			<th>Prix achat</th>
			<th>Nombre d'exemplaires</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($commandes as $c):?>
			<tr>
				<td class="element<?= $c->Id_commande ?>"><?= $c->Titre_livre ?></td>
				<td><?= $c->Nom_auteur ?></td>
				<td class="element<?= $c->Id_commande ?>"><?= $c->Raison_sociale ?></td>
				<td><?= $c->Date_achat ?></td>
				<td><?= $c->Prix_achat ?></td>
				<td><?= $c->Nbr_exemplaires ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>