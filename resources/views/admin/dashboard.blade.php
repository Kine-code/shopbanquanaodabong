<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Dashboard</h1>
        <div class="row">
            <!-- Phân loại sản phẩm -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Phân loại sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Tỷ lệ đơn hàng -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Tỷ lệ đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="orderChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Doanh thu theo tháng/quý -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Doanh thu theo tháng/quý</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Biểu đồ phân loại sản phẩm
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'pie',
            data: {
                labels: ['Áo Đội tuyển quốc gia', 'Áo câu lạc bộ', 'Áo không logo'],
                datasets: [{
                    data: [40, 30, 30],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56']
                }]
            }
        });

        // Biểu đồ tỷ lệ đơn hàng
        const orderCtx = document.getElementById('orderChart').getContext('2d');
        new Chart(orderCtx, {
            type: 'pie',
            data: {
                labels: ['Đã giao', 'Đang xử lý', 'Bị hủy'],
                datasets: [{
                    data: [40, 50, 10],
                    backgroundColor: ['#4bc0c0', '#ff9f40', '#ff6384']
                }]
            }
        });

        // Biểu đồ doanh thu theo tháng/quý
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4'],
                datasets: [{
                    label: 'Doanh thu (triệu VND)',
                    data: [50, 70, 80, 100],
                    borderColor: '#36a2eb',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true
                }]
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
