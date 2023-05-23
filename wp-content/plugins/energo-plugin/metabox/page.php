<?php
return array(
	'title'      => 'Energo Setting',
	'id'         => 'energo_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'project', 'product' ),
	'sections'   => array(
		require_once ENERGOPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once ENERGOPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once ENERGOPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once ENERGOPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);