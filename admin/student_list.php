<?php
include('../function/functions.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <!-- Databale CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
</head>

<header>
    <h1>STUDENT INFORMATION LIST</h1>
</header>

<body>
    <div class="center">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">FULLNAME</th>
                    <th scope="col">COURSE</th>
                    <th scope="col">YEAR LEVEL</th>
                    <th scope="col">SUBJECT</th>
                    <th scope="col">SECTION</th>
                    <th scope="col">EMAIL ADDRESS</th>
                    <th scope="col">CONTACT NO.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $students = getAll("tb_users");

                if (mysqli_num_rows($students) > 0) {
                    foreach ($students as $item) {
                ?>
                        <tr>
                            <td><?= $item['firstName'] . ' ' . $item['middleName'] . ' ' . $item['lastName']; ?></td>
                            <td><?= $item['course']; ?></td>
                            <td><?= $item['year_level']; ?></td>
                            <td><?= $item['subject']; ?></td>
                            <td><?= $item['section']; ?></td>
                            <td><?= $item['email']; ?></td>
                            <td><?= $item['contact']; ?></td>
                            <td>
                                <!-- Button modal -->
                                <button type="button" class="updatebtn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $item['user_id']; ?>">Update</button>
                                <button type="button" class="deletebtn" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['user_id']; ?>">Delete</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="updateModal<?= $item['user_id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $item['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="updateModalLabel">Edit Student Information</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action='crud.php' method='post'>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['lastName']; ?>" name="lastName">
                                                <label for="floatingInput">Last Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['firstName']; ?>" name="firstName">
                                                <label for="floatingInput">First Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['middleName']; ?>" name="middleName">
                                                <label for="floatingInput">Middle Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['course']; ?>" name="course">
                                                <label for="floatingInput">Course</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['year_level']; ?>" name="year_level">
                                                <label for="floatingInput">Year Level</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['subject']; ?>" name="subject">
                                                <label for="floatingInput">Subject</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['section']; ?>" name="section">
                                                <label for="floatingInput">Section</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" value="<?= $item['email']; ?>" name="email">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" value="<?= $item['contact']; ?>" name="contact">
                                                <label for="floatingInput">Contact No.</label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="btn_update" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal<?= $item['user_id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $item['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="updateModalLabel">Delete Student Information</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action='crud.php' method='post'>
                                        <input type="hidden" name="user_id" value="<?= $item['user_id']; ?>">
                                        <div class="modal-body">
                                            Are you sure you want to delete this student?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="btn_delete" class="btn btn-primary">Save changes</button>
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

        <button class="dashbtn" onclick="document.location='admin_dashboard.php'">BACK TO ADMIN DASHBOARD</button>


    </div>
    <!-- Databale Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="assets/js/table.js"></script>
    <!-- bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>