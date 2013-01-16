<?php

$custom_metabox = $simple_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta',
	'title' => 'The Useful Bit',
	'types' =>  array('post'),
	'template' => get_stylesheet_directory() . '/metaboxes/simple-meta.php',
));

/* eof */