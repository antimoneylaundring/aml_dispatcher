<?php include 'includes/db.php'; ?>
<?php
$where = [];

if (!empty($_GET['group_name'])) {
    $group_name = $conn->real_escape_string($_GET['group_name']);
    $where[] = "group_name COLLATE utf8mb4_general_ci LIKE '%$group_name%'";
}

if (!empty($_GET['url'])) {
    $url = $conn->real_escape_string($_GET['url']);
    $where[] = "url COLLATE utf8mb4_general_ci LIKE '%$url%'";
}

$where_sql = "";
if (!empty($where)) {
    $where_sql = "WHERE " . implode(" AND ", $where);
}

$limit = 20;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $limit;

// Count query
$count_sql = "SELECT COUNT(*) as total FROM all_credentials $where_sql";
$count_result = $conn->query($count_sql);
$total = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total / $limit);

// Data query
$sql = "SELECT * FROM all_credentials $where_sql LIMIT $offset, $limit";

$result = $conn->query($sql);

if (isset($_GET['export'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=filtered_credentials.csv');

    $group_url = isset($_GET['group_name']) ? $_GET['group_name'] : '';
    $url = isset($_GET['url']) ? $_GET['url'] : '';

    $query = "SELECT * FROM all_credentials WHERE 1=1";
    if (!empty($group_url)) {
        $query .= " AND group_name COLLATE utf8mb4_general_ci LIKE '%$group_url%'";
    }
    if (!empty($url)) {
        $query .= " AND url COLLATE utf8mb4_general_ci LIKE '%$url%'";
    }

    $result = $conn->query($query);

    $output = fopen("php://output", "w");

    // Optional: customize header row
    fputcsv($output, ['Date', 'Name', 'Group Name', 'URL', 'Id', 'Password', 'Phone No.', 'Email']);

    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [$row['date'], $row['name'], $row['group_name'], $row['url'], $row['id'], $row['password'], $row['phone_no'], $row['mail_id']]);
    }

    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Credentials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
            white-space: nowrap;
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .pagination {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 5px;
        }

        .pagination a {
            padding: 6px 12px;
            margin: 2px;
            border: 1px solid #ddd;
            color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }

        .pagination .disabled {
            pointer-events: none;
            color: #ccc;
            border-color: #eee;
        }

        .pagination .dots {
            padding: 6px 10px;
            color: #aaa;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <!-- <?php include 'includes/topbar.php'; ?> -->

            <div class="container">
                <h3>All Credentials</h3>
                <form method="GET" style="margin-bottom: 20px;">
                    <input type="text" name="group_name" placeholder="Filter by Group URL" value="<?php echo isset($_GET['group_name']) ? htmlspecialchars($_GET['group_name']) : ''; ?>">
                    <input type="text" name="url" placeholder="Filter by URL" value="<?php echo isset($_GET['url']) ? htmlspecialchars($_GET['url']) : ''; ?>">
                    <button type="submit" style="display: inline-block; padding: 6px 12px; background-color: #1e52fcff; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px; border:none;">Filter</button>
                    <a href="all_credential.php" style="display: inline-block; padding: 6px 12px; background-color: #f44336; color: white; text-decoration: none; border-radius: 4px; margin-left: 10px;">
                        Clear
                    </a>
                    <button type="submit" name="export" value="1" onclick="exportFiltered()" style="margin-left: 10px; padding: 6px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;">
                        Export CSV
                    </button>
                    <button type="submit" name="import" value="1" onclick="importFiltered()" style="margin-left: 10px; padding: 6px 12px; background-color: #7f83de; color: white; border: none; border-radius: 4px;">
                        Import
                    </button>

                </form>

                <div class="card mt-4">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 15px;">Date</th>
                                    <th style="width: 15px;">Name</th>
                                    <th style="width: 15px;">Group Name</th>
                                    <th>Url</th>
                                    <th style="width: 30px;">Id</th>
                                    <th style="width: 15px;">Password</th>
                                    <th style="width: 30px;">Phone No.</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['date']) ?></td>
                                        <td><?= htmlspecialchars($row['name']) ?></td>
                                        <td><?= htmlspecialchars($row['group_name']) ?></td>
                                        <td class="truncate" title="<?= htmlspecialchars($row['url']) ?>">
                                            <?= htmlspecialchars($row['url']) ?>
                                        </td>
                                        <td><?= htmlspecialchars($row['id']) ?></td>
                                        <td><?= htmlspecialchars($row['password']) ?></td>
                                        <td><?= htmlspecialchars($row['phone_no']) ?></td>
                                        <td><?= htmlspecialchars($row['mail_id']) ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1 ?>&<?= $query_string ?>">&laquo; Prev</a>
                            <?php endif; ?>

                            <?php
                            $visible_pages = [];

                            // Always show first 3
                            for ($i = 1; $i <= 3; $i++) {
                                $visible_pages[] = $i;
                            }

                            // Show 3 before and after current page
                            for ($i = $page - 2; $i <= $page + 2; $i++) {
                                if ($i > 0 && $i <= $total_pages) {
                                    $visible_pages[] = $i;
                                }
                            }

                            // Always show last 3
                            for ($i = $total_pages - 2; $i <= $total_pages; $i++) {
                                if ($i > 0) {
                                    $visible_pages[] = $i;
                                }
                            }

                            // Remove duplicates and sort
                            $visible_pages = array_unique($visible_pages);
                            sort($visible_pages);

                            $prev = 0;
                            foreach ($visible_pages as $page):
                                if ($prev != 0 && $page != $prev + 1) {
                                    echo "<span class='dots'>...</span>";
                                }

                                if ($page == $page) {
                                    $query_string = http_build_query([
                                        'group_name' => $_GET['group_name'] ?? '',
                                        'url' => $_GET['url'] ?? ''
                                    ]);
                                    echo "<a class='active' href='?page=$page&$query_string'>$page</a>";
                                } else {
                                    echo "<a href='?page=$page&$query_string'>$page</a>";
                                }

                                $prev = $page;
                            endforeach;
                            ?>

                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?= $page + 1 ?>&<?= $query_string ?>">Next &raquo;</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function exportFiltered() {
            const groupUrl = encodeURIComponent(document.querySelector('input[name="group_name"]').value);
            const url = encodeURIComponent(document.querySelector('input[name="url"]').value);
            let query = `?export=1`;

            if (groupUrl) query += `&group_name=${groupUrl}`;
            if (url) query += `&url=${url}`;

            window.location.href = 'all_credential.php' + query;
        }
    </script>

</body>

</html>