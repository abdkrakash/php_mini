<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Corner - Admin Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <img src="../Pic/logo-removebg-preview.png" width="170px" height="100px" >

                <h1>Juice Corner</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../home_page/imdex.html">Home</a></li>
                    <li><a href="#">Users</a></li>
                    <li><a href="../PHP/index.html">Categories</a></li>
                    <li><a href="">Products</a></li>
                </ul>
            </nav>
        </div>

        <div class="main-content">
            <header>
                <h2>Dashboard</h2>
                <p class="toggle-btn">
            </header>

            <div class="cards">
            </div>

            <div class="charts">
                <div class="chart">
                    <h3>Sales Statistics</h3>
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="chart">
                    <h3>User Statistics</h3>
                    <canvas id="usersChart"></canvas>
                </div>
            </div>

            <div class="tables">
                <div class="table">
                    <h3>Users</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>