<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .card-icon {
            font-size: 2rem;
        }
        .table thead {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h2 class="text-center mb-4">E-Shop</h2>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="#" class="nav-link"><i class="fa fa-home me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link"><i class="fa fa-shopping-cart me-2"></i> Orders</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link"><i class="fa fa-user me-2"></i> Profile</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link"><i class="fa fa-heart me-2"></i> Wishlist</a>
            </li>
            <li class="nav-item mb-2">
                <form action="{{ route('logout') }}" method="POST">
							    		@csrf
                <button type="submit" class="nav-link"><i class="fa fa-sign-out-alt me-2"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 rounded">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Customer Dashboard</span>
                <div class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search orders" aria-label="Search">
                    <button class="btn btn-outline-success">Search</button>
                </div>
            </div>
        </nav>

        <!-- Dashboard Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text fs-4">25</p>
                        </div>
                        <i class="fa fa-shopping-cart card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text fs-4">5</p>
                        </div>
                        <i class="fa fa-clock card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Completed Orders</h5>
                            <p class="card-text fs-4">20</p>
                        </div>
                        <i class="fa fa-check card-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Canceled Orders</h5>
                            <p class="card-text fs-4">2</p>
                        </div>
                        <i class="fa fa-times card-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="card">
            <div class="card-header bg-dark text-white">
                Recent Orders
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td>2025-12-01</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>$120.00</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                        <tr>
                            <td>#1000</td>
                            <td>2025-11-28</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>$250.00</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                        <tr>
                            <td>#999</td>
                            <td>2025-11-25</td>
                            <td><span class="badge bg-danger">Canceled</span></td>
                            <td>$75.00</td>
                            <td><button class="btn btn-sm btn-primary">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
