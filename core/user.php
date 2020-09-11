<?php

//removendo usuários do wordpress
function wps_remove_role() {
    remove_role( 'author' );
    remove_role( 'contributor' );
    remove_role( 'subscriber' );
}
add_action( 'init', 'wps_remove_role' );