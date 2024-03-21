<?php
include('../auth_session.php');
include('../function/functions.php');

$sql = "SELECT COUNT(*) AS quiz_count FROM tb_quiz";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quiz_count = $row["quiz_count"];
} else {
    $quiz_count = 0;
}

$sql = "SELECT COUNT(*) AS student_count FROM tb_users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $student_count = $row["student_count"];
} else {
    $student_count = 0;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/sidebar.css" />
    <!-- Lineicons CSS -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        include('sidebar.php');
        ?>
        <div class="main p-3">
            <div id="page-content-wrapper">
                <header>
                    <h1>Dashboarddd</h1>
                </header>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card widget-card">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fas fa-info-circle"></i> Total Quiz</h5>
                                    <p><?php echo $quiz_count; ?> Quizzes</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card widget-card">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="fa-solid fa-triangle-exclamation"></i> Total Students</h5>
                                    <p><?php echo $student_count; ?> Students</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Script -->
        <script src="assets/js/sidebar.js"></script>

        <!-- bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>