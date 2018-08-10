function fun_edit($id)
{
    var view_url = $("#hidden_view").val();
    $.ajax({
        url: view_url,
        type: "GET",
        data: {"id": $id},
        success: function(result){

            $("#edit_id").val(result.id);
            $("#edit_comment").val(result.comment);
        }
    });
}
