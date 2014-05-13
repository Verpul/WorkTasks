<?php
	function renderTemplate($templates, $values){
		require 'templates/header.php';
		foreach ($templates as $template) {
			require 'templates/'.$template;
		}
		require 'templates/footer.html';
	}
?>