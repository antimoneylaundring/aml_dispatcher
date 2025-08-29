<?php
include 'includes/db.php';

// Pagination setup
$limit = 20;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// Count total rows
$count_sql = "SELECT COUNT(*) as total FROM website_searching"; // <-- Replace with correct table name
$count_result = $conn->query($count_sql);
$total = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

// Fetch data
$sql = "SELECT * FROM website_searching ORDER BY Date DESC LIMIT $offset, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Website Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        table {
            font-size: 14px;
        }

        th,
        td {
            white-space: nowrap;
            padding: 6px 10px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .home-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 12px;
            text-decoration: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .home-btn:hover {
            background: #0056b3;
        }

        .table-responsive {
            overflow-x: auto;
            max-height: 70vh;
            /* vertical scroll bhi add ho jaayega */
        }

        .table thead th {
            position: sticky;
            top: 0;
            background: #212529;
            /* dark header */
            color: #fff;
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.php'; ?>

        <div class="main-content flex-grow-1">
            <div>
                <h3 class="mb-3">All Website Data</h3>
                <div class="card mt-4 w-100">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead class="table-dark">
                                <tr>
                                    <th>Database</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Code</th>
                                    <th>Search For</th>
                                    <th>Group Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Login ID</th>
                                    <th>Password</th>
                                    <th>Multiple UPI</th>
                                    <th>Phone No</th>
                                    <th>Remark 3</th>
                                    <th>Website Status</th>
                                    <th>Website Redirection</th>
                                    <th>UPI</th>
                                    <th>Bank</th>
                                    <th>Wallet</th>
                                    <th>Net Banking</th>
                                    <th>Card</th>
                                    <th>Rupay</th>
                                    <th>Not Found</th>
                                    <th>Crypto</th>
                                    <th>Origin</th>
                                    <th>Category</th>
                                    <th>Automated</th>
                                    <th>Cred Name</th>
                                    <th>Cred Date</th>
                                    <th>Colour Prediction</th>
                                    <th>Mobile Interface</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['Database']) ?></td>
                                        <td><?= htmlspecialchars($row['Date']) ?></td>
                                        <td><?= htmlspecialchars($row['Name']) ?></td>
                                        <td><?= htmlspecialchars($row['Url']) ?></td>
                                        <td><?= htmlspecialchars($row['Code']) ?></td>
                                        <td><?= htmlspecialchars($row['Search_for']) ?></td>
                                        <td><?= htmlspecialchars($row['Group_name']) ?></td>
                                        <td><?= htmlspecialchars($row['Mobile']) ?></td>
                                        <td><?= htmlspecialchars($row['Email']) ?></td>
                                        <td><?= htmlspecialchars($row['Login_id']) ?></td>
                                        <td><?= htmlspecialchars($row['Password']) ?></td>
                                        <td><?= htmlspecialchars($row['Multiple_upi']) ?></td>
                                        <td><?= htmlspecialchars($row['Phone_no']) ?></td>
                                        <td><?= htmlspecialchars($row['Remark_3']) ?></td>
                                        <td><?= htmlspecialchars($row['Website_status']) ?></td>
                                        <td><?= htmlspecialchars($row['Website_Redirection']) ?></td>
                                        <td><?= htmlspecialchars($row['UPI']) ?></td>
                                        <td><?= htmlspecialchars($row['Bank']) ?></td>
                                        <td><?= htmlspecialchars($row['Wallet']) ?></td>
                                        <td><?= htmlspecialchars($row['Net_banking']) ?></td>
                                        <td><?= htmlspecialchars($row['Card']) ?></td>
                                        <td><?= htmlspecialchars($row['Rupay']) ?></td>
                                        <td><?= htmlspecialchars($row['Not_Found']) ?></td>
                                        <td><?= htmlspecialchars($row['Crypto']) ?></td>
                                        <td><?= htmlspecialchars($row['Origin']) ?></td>
                                        <td><?= htmlspecialchars($row['Category']) ?></td>
                                        <td><?= htmlspecialchars($row['Automated']) ?></td>
                                        <td><?= htmlspecialchars($row['Cred_name']) ?></td>
                                        <td><?= htmlspecialchars($row['Cred_date']) ?></td>
                                        <td><?= htmlspecialchars($row['Colour_prediction']) ?></td>
                                        <td><?= htmlspecialchars($row['Mobile_interface']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>

</html>