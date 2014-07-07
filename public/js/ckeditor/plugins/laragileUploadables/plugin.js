CKEDITOR.plugins.add( 'laragileUploadables', {
    icons: 'laragileUploadables',
    init: function( editor ) {
        editor.addCommand( 'laragileDialog', new CKEDITOR.dialogCommand( 'laragileDialog' ) );
        editor.ui.addButton( 'laragileUploadables', {
            label: 'Insert Image',
            command: 'laragileDialog',
            toolbar: 'insert'
        });

        CKEDITOR.dialog.add( 'laragileDialog', this.path + 'dialogs/laragileUploadables.js' );
    }
});


