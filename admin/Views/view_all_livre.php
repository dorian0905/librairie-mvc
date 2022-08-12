<table class='table table-bordered table-responsive-md bg_table'>
	<thead>
		<tr>
			<th>ISBN</th>
			<th>Titre</th>
			<th>Thème</th>
			<th>Nombre de page</th>
			<th>Format</th>
			<th>Auteur</th>
			<th>Editeur</th>
			<th>Année d'édition</th>
			<th>Prix</th>
			<th>Langue</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($livres as $l):?>
			<tr>
				<td><?= $l->ISBN ?></td>
				<td class="element<?= $l->Id_Livre ?>"><?= $l->Titre_livre ?></td>
				<td><?= $l->Theme_livre ?></td>
				<td><?= $l->Nbr_pages_livre ?></td>
				<td><?= $l->Format_livre ?></td>
				<td><?= $l->Nom_auteur ?> <?= $l->Prenom_auteur ?></td>
				<td><?= $l->Editeur ?></td>
				<td><?= $l->Annee_edition ?></td>
				<td><?= $l->Prix_vente ?></td>
				<td><?= $l->Langue_livre ?></td>
				<td><a href="?controller=livre&action=modifier_livre&id=<?= $l->Id_Livre ?>">Modifier</a></td>
				<td><p class="pLink" onclick="validateDelete('livre', <?= $l->Id_Livre ?>)">Supprimer</p></td>
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