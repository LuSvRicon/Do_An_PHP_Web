
@extends('admin_layout')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Trang chủ Admin</h1>
    <div class="row">
        <!-- Card Người Dùng -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body bg-primary text-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Người dùng</h5>
                            <p class="card-text">Có <strong>{{ $userCount }}</strong> người dùng đã đăng ký.</p>
                        </div>
                        <i class="bi bi-people-fill fs-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Sản Phẩm -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body bg-success text-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Sản phẩm</h5>
                            <p class="card-text">Có <strong>{{ $productCount }}</strong> sản phẩm hiện tại.</p>
                        </div>
                        <i class="bi bi-box-seam fs-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Bài Viết -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body bg-warning text-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Bài viết</h5>
                            <p class="card-text">Có <strong>{{ $postCount }}</strong> bài viết đã xuất bản.</p>
                        </div>
                        <i class="bi bi-file-earmark-text-fill fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card phan hoi -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body bg-warning text-white rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Phản hồi</h5>
                            <p class="card-text">Có <strong>{{ $feedbacksCount }}</strong> phản hồi.</p>
                        </div>
                        <i class="bi bi-file-earmark-text-fill fs-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thống Kê -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Thống kê nhanh</h5>
                </div>
                <div class="card-body">
                    <canvas id="adminChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Dữ liệu tĩnh
        const data = [50, 120, 30, 15]; // Thay giá trị theo ý bạn

        const ctx = document.getElementById('adminChart').getContext('2d');
        const adminChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Người dùng', 'Sản phẩm', 'Bài viết', 'Phản hồi'], // Nhãn
                datasets: [{
                    label: 'Số lượng',
                    data: data, // Dùng dữ liệu tĩnh
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'], // Màu sắc
                    borderColor: ['#0056b3', '#1e7e34', '#d39e00', '#bd2130'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Danh mục'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Số lượng'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
