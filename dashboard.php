    <?php
    session_start();

    $timeout_duration = 5;

    if (!isset($_SESSION['loggedin'])) {
        echo "<script>alert('Anda belum login.'); window.location.href='login.php';</script>";
        exit();
    }

    if (isset($_SESSION['time']) && (time() - $_SESSION['time']) > $timeout_duration) {
        session_unset();
        session_destroy();
        echo "<script>
                alert('Sesi Anda telah berakhir.');
                window.open('login.php?timeout=1', '_self');
                setTimeout(() => window.close(), 1000);
            </script>";
        exit();
    }

    $_SESSION['time'] = time();
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard Admin - Rumah Baru</title>
        <link rel="stylesheet" href="css/dashboardstyle.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="sidebar">
            <div class="brand">
                <img style="width: 30px; height: 30px;" src="assets/img/Logo Rumah Impian.png" alt="Logo">
                <h2>Rumah Impian</h2>
            </div>
            <ul>
                <li><a href="#"><span class="icon">🏠</span> Dashboard</a></li>
                <li><a href="#"><span class="icon">📋</span> Daftar Properti</a></li>
                <li><a href="#"><span class="icon">➕</span> Tambah Properti</a></li>
                <li><a href="#"><span class="icon">💼</span> Transaksi</a></li>
                <li><a href="#"><span class="icon">👥</span> Pengguna</a></li>
                <li><a href="index.html"><span class="icon">↩️</span> Kembali ke Beranda</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="topbar">
                <button class="hamburger" id="toggleSidebar">☰</button>
                <h1>Dashboard Admin</h1>
                <div class="profile">
                    <img src="assets/img/profile.png" alt="Foto Profil">
                    <span>Admin</span>
                </div>
            </div>

            <div class="cards">
                <div class="card">
                    <h3>120 Properti</h3>
                    <p>Terdaftar</p>
                </div>
                <div class="card">
                    <h3>80 Disewa</h3>
                    <p>Status Sewa</p>
                </div>
                <div class="card">
                    <h3>40 Terjual</h3>
                    <p>Status Jual</p>
                </div>
                <div class="card">
                    <h3>Rp 2.4M</h3>
                    <p>Total Transaksi</p>
                </div>
            </div>

            <div class="client-info">
                <h2>Info Klien</h2>
                <div class="client-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Andi Putra</td>
                                <td>andi@email.com</td>
                                <td>081234567890</td>
                                <td>Sewa</td>
                            </tr>
                            <tr>
                                <td>Sita Dewi</td>
                                <td>sita@email.com</td>
                                <td>089876543210</td>
                                <td>Beli</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="profit-chart-container">
                <h2>Diagram Keuntungan</h2>
                <canvas id="profitChart" width="400" height="150"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('profitChart').getContext('2d');
            const profitChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                        label: 'Keuntungan (juta)',
                        data: [5, 7, 6.5, 9, 8.2, 10],
                        fill: false,
                        borderColor: '#00985b',
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Toggle sidebar
            const toggleBtn = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });

            let afkTimeout;

            function resetAfkTimer() {
                clearTimeout(afkTimeout);
                afkTimeout = setTimeout(() => {
                    alert("Anda tidak aktif selama 5 detik. Mengalihkan ke halaman beranda.");
                    window.location.href = "index.html";
                }, 5000);
            }
            ['mousemove', 'keydown', 'mousedown', 'touchstart'].forEach(event => {
                document.addEventListener(event, resetAfkTimer);
            });
            resetAfkTimer();
        </script>
    </body>
    </html>
