// Laragile cms


//Ckeditor call
//  admin/posts(blocks)/edit/{id}
$(document).ready(function () {
    var taggables = $('input[name="tags"]');
    var richText = $('textarea.rich');



    if (taggables.length)
        $(taggables).tagsInput({});
    console.log(richText.length);
    if (richText.length) {

        $.each( richText, function( key, value ) {
            value.id='editor'+key;
            CKEDITOR.replace('editor'+key);
            CKEDITOR.config.allowedContent = true;

        });



    }
    if ($(".chosen-select").length)
        $(".chosen-select").chosen({width: "100%"});
});


//  admin/assets/edit/{id}
$(document).ready(function () {
    saveFile = function () {
        var contents = editor.getSession().getValue();
        $.post("/admin/saveAsset",
            {contents: contents, filepath: filePath}, function () {
                // todo add error checking
                alert('successful save');
            }
        );
    };

    $("#saveFile").click(function (event) {
        event.preventDefault();
        saveFile();
    });
});


function alertPrepend(alertClass, message) {
    $(".loadable").load(window.location.href +" .loadable");
    var alertDiv = '<div id="alertDiv" class="alert ' + alertClass + '">' + message + '</div>';
    $("#formContainer").append(alertDiv);
    $("#alertDiv").fadeOut(2000, function (event) {
        $("#alertDiv").remove();
    });
}

function alertSuccess() {
    alertPrepend("alert-success", "Success")
}

function alertDanger() {
    alertPrepend("alert-danger", "Something Went Wrong")

}


function ajaxRelate(elementClass, url) {
    $(document).on("click", elementClass, function () {

        var postData = { "postData": $(this).data()
        };


        $.ajax({
            type: 'POST',
            url: url,
            data: postData,
            cache: false,
            success: function (data) {
                alertSuccess();

            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log('error...', xhr);
                alertDanger()
            },
            complete: function () {
                //todo fix post-ajax event binding
                window.location.reload();
            }
        });
    });
}

$(document).ready(function() {
    if ($(".attacher").length) {
        ajaxRelate(".attacher",'/attach-model');



    }
    if ($(".detacher").length) {ajaxRelate(".detacher",'/detach-column')}

});


$(document).ready(function () {
    $(".attacher").data("related", $('.chosenDataTrigger').val());



    $(document).on('change','.chosenDataTrigger', function (event, params) {

        $(".attacher").data("related", $(this).val());

    });


});


$(document).ready(function() {
    $(".showNewClass").click(function (event) {

        event.preventDefault();
        $(".newClassGroup").toggle();

    });

    $(".classSubmit").click(function (event) {

        event.preventDefault();

        classToAdd = $('.addClassInput').val();
        data = {classtoadd:classToAdd};
        $.ajax({
            type: 'POST',
            url: '/addClass',
            //data: JSON.stringify(parameters),
            data: JSON.stringify(data),
            contentType: 'application/json;',
            dataType: 'json',
            cache: false,
            success: function(data) {
                window.location.reload();

            },
            error:function (xhr, ajaxOptions, thrownError){

                //error logging
            },
            complete: function(){
                //afer ajax call is completed
            }
        });

    });

    //todo get loadable by ajax


});


$(document).on('click','.toggler',function (event) {
    console.log('fdjos');

    $(this).closest("tr").next().find('.toggled').toggle("slow", function() {
       console.log('bar;')
    });
});
