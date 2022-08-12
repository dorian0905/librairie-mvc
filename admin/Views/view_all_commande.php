<table class='table table-bordered table-responsive-md bg_table'>
	<thead>
		<tr>
			<th>Livre</th>
			<th>Auteur</th>
			<th>Fournisseur</th>
			<th>Date d'achat</th>
			<th>Prix achat</th>
			<th>Nombre d'exemplaires</th>
			<th>Modifier</th>
			<th>Supprimer</th>
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
				<td><a href="?controller=commande&action=modifier_commande&id=<?= $c->Id_commande ?>">Modifier</a></td>
				<td><p class="pLink" onclick="validateDelete('commande', <?= $c->Id_commande ?>)">Supprimer</p></td>
			</tr>
		<?php endforeach; ?>	
	</tbody>
</table>

<?php
	if(isset($success)) {
		if($success) {
			echo '<p id="notif" class="success-notif">Opération réalisée avec succès.</p>';
		} else {
			echo '<p id="notif" class="unsuccess-notif">Echec de la réalisation de l\'opération.</p>';
		}
	}
?>