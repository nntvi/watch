$(document).ready(function() {
    $("#parent_id").change(function() { // khi click chọn danh mục cha
        var id = $(this).val(); // ta lấy được id của chính danh mục cha đó
        if (id == -1) return;
        var data = { id: id }; // lấy id bỏ qua mảng data

        $.ajax({
            url: '?mod=product&action=getSubCat&id=' + id, 
            method: 'GET',
            dataType: 'JSON', // kiểu dữ liệu 
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