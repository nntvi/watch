$(document).ready(function() {
    $("#parent_upload_id").change(function() {
        var id = $(this).val();
        if (id == -1) return;
        var data = { id: id };

        $.ajax({
            url: '?mod=product&action=getSubCat&id=' + id, //Trang xử lý
            method: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $("#sub-cat").empty();
                data.forEach(function(c) {
                    $('#sub-cat').append($('<option>', { value: c.cat_id, text: c.cat_name }));
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});