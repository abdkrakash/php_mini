<?php
// Include the top section of the page (Head, CSS links, meta tags)
include 'includes/top.php';
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>
        <!-- / Sidebar -->

        <!-- Layout page -->
        <div class="layout-page">
            
            <!-- Navbar -->
            <?php include 'includes/navbar.php'; ?>
            <!-- / Navbar -->
            
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <?php
                // Include the database configuration file
                include 'db_config.php';

                // Fetch all products from the database
                $stmt = $conn->query("SELECT * FROM users");
                $juicecorner = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4">Product List</h4>

                    <!-- Striped Rows Table -->
                    <div class="card">
                        <h5 class="card-header">Users</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php foreach ($juicecorner as $users): ?>
                                        <tr>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong><?php echo $users['name']; ?></strong>
                                            </td>
                                            <td><?php echo $users['Role']; ?></td>
                                            <td>
                                                <p><?php echo $users['phone']; ?></p>
                                            </td>
                                            <td>
                                            <p><?php echo $users['Email']; ?></p>
                                            </td>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong><?php echo $users['Address']; ?></strong>
                                            </td>
                                            
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i class="bx bx-trash me-1"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- / Striped Rows Table -->

                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php include 'includes/footer.php'; ?>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>

            </div>
            <!-- / Content wrapper -->

        </div>
        <!-- / Layout page -->

    </div>

    <!-- Overlay for sidebar toggle -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>

<!-- Include the end section of the page (JS scripts, closing tags) -->
<?php include 'includes/end.php'; ?>