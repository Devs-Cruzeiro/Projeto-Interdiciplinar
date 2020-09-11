<?php
//Cria página no admin com os dados do Grupo
function create_custom_page(){
  $page_title = 'Cruzeiro do Sul';
  $menu_title = 'Cruzeiro do Sul';
  $capability = 'read';
  $slug = 'custom_page_content';
  $callback = 'custom_page_content';
  $icon = 'dashicons-welcome-write-blog';
  $position = 1;
  add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
}
add_action( 'admin_menu', 'create_custom_page' );

//Troca versão do WordPress do rodapé do admin
function change_footer_version() {
  return 'Trabalho Interdiciplinar II';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );

//Mudar o texto de rodapé no painel de admin
function remove_footer_admin () {
  echo 'Visite: <a href="https://rafaelhsouza.com.br/faculdade/"> HELP CODE!</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//Remover ajuda no admin
function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
}
add_action('admin_head', 'hide_help');

//Remove logo com links do wordpress
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}

//remove editor Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Desabilita o box "Bem-vindo ao WordPress!" no painel administrativo
remove_action('welcome_panel', 'wp_welcome_panel');

// Desabilita os boxes do painel administrativo
function remove_wordpress_dashboard() {

    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');	// Agora
    //remove_meta_box('dashboard_activity', 'dashboard', 'normal');	// Atividade
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');	// Rascunho rápido
    remove_meta_box('dashboard_primary', 'dashboard', 'side');		// Novidades do WordPress

}

add_action('admin_init', 'remove_wordpress_dashboard');

// Altera o termo Post para Noticia no WordPress
function erikasarti_post_para_noticia_menu() {

    // altera as labels do menu do painel administrativo
	global $menu;
	global $submenu;
	$menu[5][0] = 'Not&iacute;cias';
	$submenu['edit.php'][5][0] = 'Not&iacute;cias';
	$submenu['edit.php'][10][0] = 'Adicionar not&iacute;cia';
	echo '';
}

add_action( 'admin_menu', 'erikasarti_post_para_noticia_menu' );

function erikasarti_post_para_noticia_painel() {

    // altera as strings no painel administrativo e na barra de ferramentas
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Not&iacute;cias';
 	$labels->singular_name = 'Not&iacute;cia';
	$labels->add_new = 'Nova not&iacute;cia';
	$labels->add_new_item = 'Adicionar nova not&iacute;cia';
	$labels->edit_item = 'Editar not&iacute;cia';
	$labels->new_item = 'Not&iacute;cia';
	$labels->view_item = 'Ver not&iacute;cia';
	$labels->search_items = 'Pesquisar nas not&iacute;cias';
	$labels->not_found = 'Nenhuma not&iacute;cia encontrada';
	$labels->not_found_in_trash = 'Nenhuma not&iacute;cia encontrada na Lixeira';
	$labels->all_items = 'Todas as not&iacute;cias';
	$labels->menu_name = 'Not&iacute;cias';
	$labels->name_admin_bar = 'Not&iacute;cia';
}

add_action( 'init', 'erikasarti_post_para_noticia_painel' );

//adiciona logo no admin bar
function wp_admin_bar_new_logo() {
global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id' => 'wp-admin-bar-new-logo',
		'title' => '<img class="logo-new-admin-bar" src="'.get_bloginfo('template_directory').'/img/icon-help-code.png">'
	));
}
add_action('admin_bar_menu', 'wp_admin_bar_new_logo',10);


//adiciona logo no wp-login
function my_login_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo-help-code-1.png);
background-repeat: no-repeat;
	height: 125px;
	background-size: 100%;
	width: 70%;
}
body.login.js.login-action-login.wp-core-ui.locale-pt-br {
    background: #020e2e !important;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

//função muda URL do logo em wp-login
function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
return 'Acervo Digital';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


//remove avisos de atualizações do wordpress, temas e plugins
add_filter( 'pre_site_transient_update_core','remove_core_updates' );
add_filter( 'pre_site_transient_update_plugins','remove_core_updates' );
add_filter( 'pre_site_transient_update_themes','remove_core_updates' );

function remove_core_updates(){
    global $wp_version;
    return(object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version
    );
}