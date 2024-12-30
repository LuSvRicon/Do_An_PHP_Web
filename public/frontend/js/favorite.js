$(document).ready(function () {
    // Xử lý sự kiện bấm vào nút yêu thích
    $('.favorite-icon').click(function (e) {
        e.preventDefault();

        // Lấy thông tin sản phẩm và URL
        let productId = $(this).data('product-id');
        let url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                product_id: productId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Hiển thị thông báo thành công
                Swal.fire({
                    title: "Thành công!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK"
                });
            },
            error: function (error) {
                // Hiển thị thông báo lỗi
                let errorMessage = error.responseJSON?.message || "Không thể thêm sản phẩm vào danh sách yêu thích.";
                let errorTitle = (error.status === 401) ? "Bạn chưa đăng nhập!" : "Lỗi!";

                Swal.fire({
                    title: errorTitle,
                    text: errorMessage,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });
    });
});
