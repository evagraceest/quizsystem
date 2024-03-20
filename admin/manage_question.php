<?php
include('../auth_session.php');
include('../function/functions.php');

if (isset($_GET['quiz_id'])) {
    $quiz_id = $_GET['quiz_id'];

    $query = "SELECT * FROM tb_quiz WHERE quiz_id = '$quiz_id'";

    $quiz_result = mysqli_query($conn, $query);

    if ($quiz_result && mysqli_num_rows($quiz_result) > 0) {
        $quiz_data = mysqli_fetch_assoc($quiz_result);
    } else {
        $error_message = "Error: Unable to retrieve quiz data.";
    }
} else {
    $error_message = "Error: Missing quiz_id parameter.";
}
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
                <button class="btn addbtn float-end" data-bs-toggle="modal" data-bs-target="#addQuestionModal">Add Question</button>

                <div class="responsive">
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
                                $choices = getChoices($conn, $item['question_id']);
                            ?>
                                    <tr>
                                        <td><?= $item['question_id']; ?></td>
                                        <td><?= $item['question']; ?></td>
                                        <td> <button type="button" class="updatebtn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $item['question_id']; ?>">Update</button>
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
                                                        <input type="hidden" class="form-control" name="quiz_id" value="<?= $quiz_data['quiz_id']; ?>">
                                                        <input type="hidden" class="form-control" name="question_id" value="<?= $item['question_id']; ?>">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" id="floatingTextarea2" name="questions" style="height: 100px"><?= $item['question']; ?></textarea>
                                                            <label for="floatingTextarea2">Question</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <?php 
                                                            foreach ($choices as $key => $choice) : ?>
                                                                <span>
                                                                    <label><input type="radio" name="is_right" class="is_right" value="<?= $key; ?>" <?= $choice['is_right'] ? 'checked' : ''; ?>><small>Correct</small></label>
                                                                </span>
                                                                <textarea rows="2" name="choices[]" class="form-control" placeholder="Choice <?= $key + 1; ?>" required><?= $choice['choice']; ?></textarea>
                                                                <br>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_question" class="btn btn-primary">Save changes</button>
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

                    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="questionLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="questionLabel">Add Question</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="crud.php" method="POST" onsubmit="return validateForm();">
                                        <input type="hidden" class="form-control" name="quiz_id" value="<?= $quiz_data['quiz_id']; ?>" readonly>
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingTextarea2" name="question" style="height: 100px" required></textarea>
                                            <label for="floatingTextarea2">Question</label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <?php for ($i = 0; $i < 4; $i++) : ?>
                                                <span>
                                                    <label><input type="radio" name="is_right[<?= $i; ?>]" class="is_right" value="1"><small>Correct</small></label>
                                                </span>
                                                <textarea rows="2" name="choices[]" class="form-control" placeholder="Choice <?= $i + 1; ?>" required></textarea>
                                                <br>
                                            <?php endfor; ?>
                                        </div>
                                        <hr>
                                        <div class="form-group pull-right">
                                            <button class="btn addbtn float-end" type="submit" name="add_question">Submit</button>
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
        <!-- sidebar JS-->
        <script src="assets/js/sidebar.js"></script>

        <!-- bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


        <script>
            function validateForm() {
                // Get all radio buttons with the class 'is_right'
                var radioButtons = document.getElementsByClassName('is_right');

                // Initialize a counter for selected correct choices
                var selectedCount = 0;

                // Loop through each radio button
                for (var i = 0; i < radioButtons.length; i++) {
                    // If the current radio button is checked
                    if (radioButtons[i].checked) {
                        // Increment the counter
                        selectedCount++;
                    }
                }

                // If exactly one correct choice is selected, return true (form submission allowed)
                if (selectedCount === 1) {
                    return true;
                } else {
                    // Otherwise, display an alert and prevent form submission
                    alert('Please select exactly one correct choice.');
                    return false;
                }
            }
        </script>
</body>

</html>