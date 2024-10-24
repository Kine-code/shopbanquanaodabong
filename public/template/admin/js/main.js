$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id, url) {
    if (confirm("Bạn có chắc chắn xóa không?")) {
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            data:{id},
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        });
    }
    return false;
}