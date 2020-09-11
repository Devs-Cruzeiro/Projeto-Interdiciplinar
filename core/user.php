<?php

//removendo usuários do wordpress
function wps_remove_role() {
    remove_role( 'author' );
    remove_role( 'contributor' );
    remove_role( 'subscriber' );
}
add_action( 'init', 'wps_remove_role' );

//adiciona usuário ao wordpress
function wps_add_role() {
    add_role( 'contributor', 'Colaborador', 
             array(
                  'read',
                  'edit_posts',
                  'delete_posts',
                  )
    );
}
add_action( 'init', 'wps_add_role' );