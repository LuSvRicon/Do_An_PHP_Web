$(document).ready(function() {
    $('.btn-delete').click(function(e) {
        e.preventDefault(); // Ngừng việc gửi form mặc định

        var button = $(this);
        var favoriteId = button.data('id');
        var form = button.closest('form'); // Tìm form chứa nút xóa

        // Hiển thị hộp thoại xác nhận trước khi xóa
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
            text: "Hành động này không thể hoàn tác!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng xác nhận, thực hiện yêu cầu AJAX để xóa
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: {
                        _token: csrfToken,
                        _method: 'DELETE' // Laravel sử dụng _method để mô phỏng DELETE
                    },
                    success: function(response) {
                        button.closest('li').remove();
                        Swal.fire(
                            'Đã xóa!',
                            response.message,
                            'success'
                        );
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Lỗi!',
                            xhr.responseJSON.message || 'Có lỗi xảy ra, không thể xóa sản phẩm.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
