<?php 

class DocumentController {


	public function documentView() {
		$documentService = new DocumentService();
		$listDocuments = $documentService->getDocuments();
		
		$html = '<h3>Liste des documents </h3>';
		$html .= '<table>';
		$html .= "
		<tr>
			<th>id</th>
			<th>titre avec lien_vers le catalogue</th>
			<th>auteur</th>

		</tr>";

		foreach ($listDocuments as $document) {
			
			$html .= "
			<tr>
				<td>".$car['id']."</td>
				<td>".$car['titre_avec_lien_vers_le_catalogue']."</td>
				<td>".$car['auteur']."</td>
			</tr>";
		}
		$html .= '</table>';
		
		echo $html;
	}

}