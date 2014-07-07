<?php

// The Posts Bindings
App::bind('HugoKalidas\LaravelFlexCms\Posts\PostsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Posts\PostsRepository( new HugoKalidas\LaravelFlexCms\Posts\Posts );
});

// The Users Bindings
App::bind('HugoKalidas\LaravelFlexCms\Accounts\UserInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Accounts\UserRepository( new HugoKalidas\LaravelFlexCms\Accounts\User );
});

// The Settings Bindings
App::bind('HugoKalidas\LaravelFlexCms\Settings\SettingsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Settings\SettingsRepository( new HugoKalidas\LaravelFlexCms\Settings\Settings );
});

// The Newletters Bindings
App::bind('HugoKalidas\LaravelFlexCms\Newsletters\NewslettersInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Newsletters\NewslettersRepository( new HugoKalidas\LaravelFlexCms\Newsletters\Newsletters );
});


// The Blocks Bindings
App::bind('HugoKalidas\LaravelFlexCms\Blocks\BlocksInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Blocks\BlocksRepository( new HugoKalidas\LaravelFlexCms\Blocks\Blocks );
});

//todo refactor to blocks namespace
// The BlocksTypes Bindings
App::bind('HugoKalidas\LaravelFlexCms\BlocksTypes\BlocksTypesInterface', function(){
    return new HugoKalidas\LaravelFlexCms\BlocksTypes\BlocksTypesRepository( new HugoKalidas\LaravelFlexCms\BlocksTypes\BlocksTypes );
});

// The Assets Bindings
App::bind('HugoKalidas\LaravelFlexCms\Assets\AssetsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Assets\AssetsRepository( new HugoKalidas\LaravelFlexCms\Assets\Assets );
});

// The Pages Bindings
App::bind('HugoKalidas\LaravelFlexCms\Pages\PagesInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Pages\PagesRepository( new HugoKalidas\LaravelFlexCms\Pages\Pages );
});

// The globals Bindings
App::bind('HugoKalidas\LaravelFlexCms\Globals\GlobalsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Globals\GlobalsRepository( new HugoKalidas\LaravelFlexCms\Globals\Globals );
});

// The Layouts Bindings
App::bind('HugoKalidas\LaravelFlexCms\Layouts\LayoutsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Layouts\LayoutsRepository( new HugoKalidas\LaravelFlexCms\Layouts\Layouts );
});

// The Containers Bindings
App::bind('HugoKalidas\LaravelFlexCms\Containers\ContainersInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Containers\ContainersRepository( new HugoKalidas\LaravelFlexCms\Containers\Containers );
});


// The Menus Bindings
App::bind('HugoKalidas\LaravelFlexCms\Menus\MenusInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Menus\MenusRepository( new HugoKalidas\LaravelFlexCms\Menus\Menus );
});

// The Tags Bindings
App::bind('HugoKalidas\LaravelFlexCms\Tags\TagsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Tags\TagsRepository( new HugoKalidas\LaravelFlexCms\Tags\Tags );
});

// The Uploads Bindings
App::bind('HugoKalidas\LaravelFlexCms\Uploads\UploadsInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Uploads\UploadsRepository( new HugoKalidas\LaravelFlexCms\Uploads\Uploads );
});

// The Galleries Bindings
App::bind('HugoKalidas\LaravelFlexCms\Galleries\GalleriesInterface', function(){
    return new HugoKalidas\LaravelFlexCms\Galleries\GalleriesRepository( new HugoKalidas\LaravelFlexCms\Galleries\Galleries );
});

// The Classes Bindings
App::bind('HugoKalidas\LaravelFlexCms\ElementClasses\ElementClassesInterface', function(){
    return new HugoKalidas\LaravelFlexCms\ElementClasses\ElementClassesRepository( new HugoKalidas\LaravelFlexCms\ElementClasses\ElementClasses );
});
