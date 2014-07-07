/*add to ckeditor images attached to the element */
CKEDITOR.appendImage=function(element,editor){


    var imgsrc = $(element).prev().attr('src');
    var appendHtml = '<img src="'+appUrl+ imgsrc + '\">';

   CKEDITOR.instances[editor].insertHtml(appendHtml);


};




CKEDITOR.dialog.add( 'laragileDialog', function ( editor ) {

    var imageJ = [];
    instance=editor.name;
    for (upload in itemuploads) {

        imageJ.push ({

            type : 'html',
            html : '<img class=\"postImage\" src=\"'+itemuploads[upload]+'\"> <a onclick=\"CKEDITOR.appendImage(this,instance)\" style=\"background: #3f8edf \" class=\"cke_dialog_ui_button cke_dialog_ui_button_ok\">Add to document</a>'

        });
    }


    return {
        title: 'Insert Post Images',
        minWidth: 400,
        minHeight: 200,

        //json imageList
        contents: [
            {
                id: 'tab-basic',
                label: 'Images',

                elements: imageJ,
                buttons: [ CKEDITOR.dialog.cancelButton, CKEDITOR.dialog.okButton ]
            }
        ]
    };
});