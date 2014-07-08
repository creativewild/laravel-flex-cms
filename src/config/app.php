<?php

/**
 * The application configuration file, used to setup globally used values throughout the application
 */
return array(

    /**
     * The name of the application, will be used in the main management areas of the application
     */
    'name' => 'Laravel Flex CMS',

    /**
     * The email address associated with support enquires on a technical basis
     */
    'support_email' => 'mail@example.com',

    /**
     * The base path to put uploads into
     */
    'upload_base_path'=>'uploads/',

    /**
     * The URL key to access the main admin area
     */
    'access_url'=>'admin',

    /**
     * The menu items shown at the top and side of the application
     */
    'menu_items'=>array(
        'posts'=>array(
            'name'=>'Posts',
            'icon'=>'pencil',
            'top'=>true,
            'editor'=>true

        ),
        'blocks'=>array(
            'name'=>'Content Blocks',
            'icon'=>'th-large',
            'top'=>true,
            'editor'=>true
        ),

        'pages'=>array(
            'name'=>'Pages',
            'icon'=>'file',
            'top'=>true,
            'editor'=>true
        ),

        'menus'=>array(
            'name'=>'Menus',
            'icon'=>'align-justify',
            'top'=>true,
            'editor'=>true
        ),

        'containers'=>array(
            'name'=>'Containers',
            'icon'=>'list-alt',
            'top'=>true,
            'editor'=>true
        ),

        'pageLayouts'=>array(
            'name'=>'Layouts',
            'icon'=>'eye-open',
            'top'=>true,
            'editor'=>true
        ),


        'galleries'=>array(
            'name'=>'Galleries',
            'icon'=>'picture',
            'top'=>true,
            'editor'=>true
        ),
        'assets'=>array(
            'name'=>'Assets',
            'icon'=>'hdd',
            'top'=>true,
            'editor'=>true
        ),
	'includes'=>array(
            'name'=>'Includes',
            'icon'=>'edit',
            'top'=>true,
            'editor'=>true
        ),

        'globals'=>array(
            'name'=>'Globals',
            'icon'=>'globe',
            'top'=>true,
            'editor'=>true
        ),
	'newsletters'=>array(
            'name'=>'Newsletters',
            'icon'=>'envelope',
            'top'=>true,
            'editor'=>true

        ),


        'users'=>array(
            'name'=>'Users',
            'icon'=>'user',
            'top'=>true,
            'editor'=>true
        ),
        'settings'=>array(
            'name'=>'Settings',
            'icon'=>'cog',
            'top'=>true,
            'editor'=>true
        )
    )
);
