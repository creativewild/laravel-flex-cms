<?php

// The Posts Bindings
App::bind('HugoKalidas\FlexCms\Posts\PostsInterface', function(){
    return new HugoKalidas\FlexCms\Posts\PostsRepository( new HugoKalidas\FlexCms\Posts\Posts );
});

// The Users Bindings
App::bind('HugoKalidas\FlexCms\Accounts\UserInterface', function(){
    return new HugoKalidas\FlexCms\Accounts\UserRepository( new HugoKalidas\FlexCms\Accounts\User );
});

// The Settings Bindings
App::bind('HugoKalidas\FlexCms\Settings\SettingsInterface', function(){
    return new HugoKalidas\FlexCms\Settings\SettingsRepository( new HugoKalidas\FlexCms\Settings\Settings );
});

// The Newletters Bindings
App::bind('HugoKalidas\FlexCms\Newsletters\NewslettersInterface', function(){
    return new HugoKalidas\FlexCms\Newsletters\NewslettersRepository( new HugoKalidas\FlexCms\Newsletters\Newsletters );
});


// The Blocks Bindings
App::bind('HugoKalidas\FlexCms\Blocks\BlocksInterface', function(){
    return new HugoKalidas\FlexCms\Blocks\BlocksRepository( new HugoKalidas\FlexCms\Blocks\Blocks );
});

//todo refactor to blocks namespace
// The BlocksTypes Bindings
App::bind('HugoKalidas\FlexCms\BlocksTypes\BlocksTypesInterface', function(){
    return new HugoKalidas\FlexCms\BlocksTypes\BlocksTypesRepository( new HugoKalidas\FlexCms\BlocksTypes\BlocksTypes );
});

// The Assets Bindings
App::bind('HugoKalidas\FlexCms\Assets\AssetsInterface', function(){
    return new HugoKalidas\FlexCms\Assets\AssetsRepository( new HugoKalidas\FlexCms\Assets\Assets );
});

// The Pages Bindings
App::bind('HugoKalidas\FlexCms\Pages\PagesInterface', function(){
    return new HugoKalidas\FlexCms\Pages\PagesRepository( new HugoKalidas\FlexCms\Pages\Pages );
});

// The globals Bindings
App::bind('HugoKalidas\FlexCms\Globals\GlobalsInterface', function(){
    return new HugoKalidas\FlexCms\Globals\GlobalsRepository( new HugoKalidas\FlexCms\Globals\Globals );
});

// The Layouts Bindings
App::bind('HugoKalidas\FlexCms\Layouts\LayoutsInterface', function(){
    return new HugoKalidas\FlexCms\Layouts\LayoutsRepository( new HugoKalidas\FlexCms\Layouts\Layouts );
});

// The Containers Bindings
App::bind('HugoKalidas\FlexCms\Containers\ContainersInterface', function(){
    return new HugoKalidas\FlexCms\Containers\ContainersRepository( new HugoKalidas\FlexCms\Containers\Containers );
});


// The Menus Bindings
App::bind('HugoKalidas\FlexCms\Menus\MenusInterface', function(){
    return new HugoKalidas\FlexCms\Menus\MenusRepository( new HugoKalidas\FlexCms\Menus\Menus );
});

// The Tags Bindings
App::bind('HugoKalidas\FlexCms\Tags\TagsInterface', function(){
    return new HugoKalidas\FlexCms\Tags\TagsRepository( new HugoKalidas\FlexCms\Tags\Tags );
});

// The Uploads Bindings
App::bind('HugoKalidas\FlexCms\Uploads\UploadsInterface', function(){
    return new HugoKalidas\FlexCms\Uploads\UploadsRepository( new HugoKalidas\FlexCms\Uploads\Uploads );
});

// The Galleries Bindings
App::bind('HugoKalidas\FlexCms\Galleries\GalleriesInterface', function(){
    return new HugoKalidas\FlexCms\Galleries\GalleriesRepository( new HugoKalidas\FlexCms\Galleries\Galleries );
});

// The Classes Bindings
App::bind('HugoKalidas\FlexCms\ElementClasses\ElementClassesInterface', function(){
    return new HugoKalidas\FlexCms\ElementClasses\ElementClassesRepository( new HugoKalidas\FlexCms\ElementClasses\ElementClasses );
});
