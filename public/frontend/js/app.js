$(document).ready(function () {
    // Xử lý sự kiện bấm "Thêm vào giỏ hàng"
    $('.add-to-cart').click(function (e) {
        e.preventDefault();

        // Lấy thông tin sản phẩm
        let productId = $(this).data('product-id');
        let url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                product_id: productId,
                quantity: 1, // Số lượng mặc định
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

                // Cập nhật số lượng sản phẩm trong giỏ hàng
                $('.cart-quantity').text(response.cartQuantity);
            },
            error: function (error) {
                // Hiển thị thông báo lỗi
                let errorMessage = error.responseJSON?.message || "Không thể thêm sản phẩm vào giỏ hàng.";
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
