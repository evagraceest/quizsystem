<?php
include('../auth_session.php');
include('../function/functions.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question List</title>
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
            <div class="text-center">
                <div id="page-content-wrapper">
                    <header>
                        <h1> Question List</h1>
                    </header>
                    <div class="center">

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Question ID</th>
                                    <th scope="col">Questions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $questions = getAll("tb_question");

                                if (mysqli_num_rows($questions) > 0) {
                                    foreach ($questions as $item) {
                                ?>
                                        <tr>
                                            <td><?= $item['question_id']; ?></td>
                                            <td><?= $item['questions']; ?></td>
                                            <td>
                                                <!-- Button modal -->
                                                <button type="button" class="updatebtn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $item['question_id']; ?>">Update</button>
                                                <button type="button" class="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['question_id']; ?>">Delete</button>

                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="updateModal<?= $item['question_id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $item['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="updateModalLabel">Edit Question</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action='crud.php' method='post'>
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="question_id" value="<?= $item['question_id']; ?>" readonly>
                                                                <label for="floatingInput">Question ID</label>
                                                            </div>
                                                            <div class="form-floating">
                                                                <textarea class="form-control" id="floatingTextarea2" name="questions" style="height: 100px"><?= $item['questions']; ?></textarea>
                                                                <label for="floatingTextarea2">Question</label>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="btn_question" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal<?= $item['question_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $item['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="updateModalLabel">Delete Question</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action='crud.php' method='post'>
                                                        <input type="hidden" name="question_id" value="<?= $item['question_id']; ?>">
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this question?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="btn_delete_question" class="btn btn-primary">Save changes</button>
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