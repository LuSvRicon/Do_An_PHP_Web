<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Mobile Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling for navbar */
        .navbar {
            background-color: #0d6efd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-size: 16px;
            padding: 8px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background-color: #004085;
            color: #ffffff !important;
        }

        .nav-item .logout-link {
            font-weight: bold;
            color: #f8d7da;
        }

        /* Main container styling */
        .container {
            max-width: 1200px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Footer styling */
        footer {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users') }}">Người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feedback.index') }}">Phản hồi</a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link logout-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <div class="card p-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 Admin Mobile Store. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
