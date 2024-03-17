<?php
include('../auth_session.php');
include('../function/functions.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz List</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/sidebar.css" />
    <!-- Databale CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
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
                    <h1>Quiz List</h1>
                </header>
                <br>
                <button class="btn addbtn float-end" data-bs-toggle="modal" data-bs-target="#addQuizModal">Add Quiz</button>

                <div class="responsive">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>Quiz Name</th>
                                <th>Quiz Points</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $quiz = getAll("tb_quiz");

                            if (mysqli_num_rows($quiz) > 0) {
                                foreach ($quiz as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['quiz_name']; ?></td>
                                        <td><?= $item['points']; ?></td>
                                        <td>
                                            <!-- Button modal -->
                                            <button type="button" class="updatebtn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $item['quiz_id']; ?>">Update</button>
                                            <button type="button" class="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['quiz_id']; ?>">Delete</button>

                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="updateModal<?= $item['quiz_id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $item['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="updateModalLabel">Edit Quiz</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action='crud.php' method='post'>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="quiz_id" value="<?= $item['quiz_id']; ?>" readonly>
                                                            <label for="floatingInput">Quiz ID</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="quiz_name" value="<?= $item['quiz_name']; ?>">
                                                            <label for="floatingInput">Quiz Name</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" name="points" value="<?= $item['points']; ?>">
                                                            <label for="floatingInput">Points</label>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_quiz" class="btn addbtn">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?= $item['quiz_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $item['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="updateModalLabel">Delete Quiz</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action='crud.php' method='post'>
                                                    <input type="hidden" name="quiz_id" value="<?= $item['quiz_id']; ?>">
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this quiz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="btn_delete_quiz" class="btn deletebtn">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }
                            }
                            ?>
                        </tbody>

                    </table>

                    <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="quizLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="quizLabel">Add Quiz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="crud.php" method="POST">

                                        <div class="col-md-12 mt-3">
                                            <label for=""><i class="fas fa-building"></i>Quiz Name</label>
                                            <input type="text" name="quiz_name" placeholder="Enter Quiz Name" class="form-control" required>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <label for=""><i class="fa-solid fa-location-dot"></i>Quiz Points</label>
                                            <input type="number" name="points" placeholder="Enter how many points" class="form-control" required>
                                        </div>

                                        <hr>
                                        <div class="form-group pull-right">
                                            <button class="btn addbtn float-end" type="submit" name="add_quiz">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Databale Script -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="assets/js/table.js"></script>
        <script src="assets/js/sidebar.js"></script>

        <!-- bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>