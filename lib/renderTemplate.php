<?php
	function renderTemplate($templates, $values){
		require_once 'templates/header.php';
		foreach ($templates as $template) {
			require_once 'templates/'.$template;
		}
		require_once 'templates/footer.html';
	}

	function makeSpecial($value){
		return htmlspecialchars("$value", ENT_QUOTES);
	}
?>