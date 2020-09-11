<?php
//Gerar a meta tag title
function custom_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'custom_setup' );


//somente numerico
function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}

//Cria página no admin com os dados do Grupo
function custom_page_content(){
	?>
		<div>
			<img src="<?php echo get_bloginfo('template_directory').'/img/unicsul.png' ?>" width="250" alt="Faculdade Cruzeiro do Sul">
			<h2>Dados do Grupo do Projeto Interdiciplinar II</h2>
			<p><strong>Rafael Henrique de Souza</strong><br>RGM: 2071519-6</p>
			<p><strong>Ollyver Ottoboni</strong><br>RGM: 2112093-5</p>
			<p><strong>Eduardo Startari Ferreira</strong><br>RGM: 2102909-1</p>
			<p><strong>Rodrigo Cesar França</strong><br>RGM: 2125914-3</p>
			<p><strong>Thais Ananda Soares</strong><br>RGM: 2071654-1</p>
			<p><strong>Lara Alves Matos</strong><br>RGM: 2226831-6</p>
		</div>
		<div>
			<p><strong>Repositório:</strong> <a href="https://github.com/orgs/Devs-Cruzeiro/" target="_blank"> GITHUB DEVS CRUZEIRO</a></p>
			<p><strong>Gerenciamento do projeto:</strong> <a href="https://trello.com/b/35IJsTgT/notdevs-cruzeiro" target="_blank"> TRELLO DEVS CRUZEIRO</a></p>
		</div>
	<?php
}