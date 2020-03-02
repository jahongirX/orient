(function($) {

    'use strict';

    $(document).ready(function() {

        $(".fileinput").change(function () {
            readURL(this);
        });

        $('.panel-collapse label').on('click', function(e){
            e.stopPropagation();
        })

        $('.tagsinput').tagsinput();

        $('.postImage').on('click', function() {
            var modal = $('#postImageModal');
            modal.modal('show');
            modal.find('.postTitle').text( $(this).data('title') );
            modal.find('.postImageBox').attr('src', $(this).data('img') );
        });

        $('.postRemove').on('click', function() {
            var id    = $(this).data('postid'),
                type  = $(this).data('posttype'),
                modal = $('#postRemoveModal');

            modal.find('.postID').val(id);
            modal.find('.postType').val(type);

            modal.modal('show');
        });

        $('.rmSubmit').on('click', function(){
            var modal = $('#postRemoveModal'),
                id    = $(this).parent().find('.postID').val(),
                type  = $(this).parent().find('.postType').val();

            if( id != 0 && type != '') {
                $.post('/' + type + '/delete/' + id, { id: id });
                //$('#post' + id).closest('tr').hide();
                location.reload();
            }

            modal.modal('hide');

        })

        $('.table input[type=checkbox]').click(function() {
            if ( $(this).is(':checked') ) {
                $(this).closest('tr').addClass('selected');
            } else {
                $(this).closest('tr').removeClass('selected');
            }

        });

        $("table.gridview-table thead tr").children(":first").html("<div class=\"checkbox check-success\"><input type=\"checkbox\" name=\"check-all\" id=\"check-all\"><label for=\"check-all\"></label></div>");

        $("#check-all").on('click', function(){
            if(this.checked == false){
                $(".post-check").removeAttr("checked");
                $("#rm-checked-btn").prop("disabled", "true").removeClass("btn-success");
            } else{
                $(".post-check").prop("checked", "true");
                $("#rm-checked-btn").removeAttr("disabled").addClass("btn-success");
            }
        });

        $(".post-check").on('click', function(){
            $("#rm-checked-btn").removeAttr("disabled").addClass("btn-success");

            var checked = false;
            $(".post-check").each(function(i,elem) {
                if( $(this).prop("checked") == true) {
                    checked = true;
                }
            });

            if(checked == false) {
                $("#rm-checked-btn").prop("disabled", "true").removeClass("btn-success");
            }
        });

        $("#rm-checked-btn").on('click', function(){

            var values = "";

            $(".post-check").each(function(i) {
                if( $(this).prop("checked") == true) {
                    values = values + $(this).attr("name") + ",";
                }
                $("#rm-input").val(values);
            });

        });

        new Clipboard('.clipboard');

        if($.fn.select2){
            $(".multi").select2();
        }


        $("#dropzone").dropzone({
            url: "/uploads/albums"
        });
        
    });

})(window.jQuery);


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).parent().parent().find('.image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
