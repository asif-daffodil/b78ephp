<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Bootstrap</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "b78e");

    if (isset($_GET['update'])) {
        $updateId = $_GET['update'];
        $getUPData = $conn->query("SELECT * FROM `students` WHERE `id` = $updateId");
        if ($getUPData->num_rows == 0) {
            header("location: ./");
        }
        $preData = $getUPData->fetch_object();
    }

    $selectStudents;

    function selectStudents()
    {
        $GLOBALS['selectStudents'] = $GLOBALS['conn']->query("SELECT * FROM `students` ORDER BY `id` DESC");
    }
    selectStudents();

    function safuda($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
    ?>

    <div class="container">
        <?php
        if (isset($_POST['sub123'])) {
            $sname = safuda($_POST['sname']);
            $gender = safuda($_POST['gender'] ?? null);
            $city = safuda($_POST['city']);
            $phone = safuda($_POST['phone']);

            $insert = $conn->query("INSERT INTO `students` (`name`, `city`, `gender`, `phone`, `subject_id`) VALUES ('$sname', '$city', '$gender', '$phone', 1)");

            if ($insert) {
                selectStudents();
                echo "<script>toastr.success('Success!', 'Student added successfully')</script>";
            }
        }
        if (isset($_POST['up123'])) {
            $sname = safuda($_POST['sname']);
            $gender = safuda($_POST['gender'] ?? null);
            $city = safuda($_POST['city']);
            $phone = safuda($_POST['phone']);

            $update = $conn->query("UPDATE `students` SET `name` = '$sname', `city` = '$city', `gender` = '$gender', `phone` = '$phone' WHERE `id` = $updateId");

            if ($update) {
                selectStudents();
                echo "<script>toastr.success('Success!', 'Student updated successfully');SetTimeout(()=>{location.href='./index.php'},2000)</script>";
            }
        }

        if (isset($_GET['delete'])) {
            $delId = $_GET['delete'];
            $delQuery = $conn->query("DELETE FROM `students` WHERE `id` = $delId");
            if ($delQuery) {
                echo "<script>toastr.success('Success!', 'Student deleted successfully');SetTimeout(()=>{location.href='./index.php'},2000)</script>";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-12 text-center display-5 py-4">
                Student Management System
            </div>
            <div class="col-md-4">
                <h2 class="mb-4"><?= !isset($updateId) ? "Add Student" : "Update Student" ?></h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student Name" name="sname" required value="<?= $preData->name ?? $sname ?? null  ?>">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label for="" class="from-check-label">Gender :</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" required value="Male" <?= isset($preData) && $preData->gender === "Male" ? "checked" : null ?> <?= isset($gender) && $gender === "Male" ? "checked" : null ?>>
                            <label for="" class="from-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" required value="Female" <?= isset($preData) && $preData->gender === "Female" ? "checked" : null ?> <?= isset($gender) && $gender === "Female" ? "checked" : null ?>>
                            <label for="" class="from-check-label">Female</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select name="city" id="" class="form-select" required>
                            <option value="">--Select City--</option>
                            <option value="Dhaka" <?= isset($preData) && $preData->city === "Dhaka" ? "selected" : null ?> <?= isset($city) && $city === "Dhaka" ? "selected" : null ?>>Dhaka</option>
                            <option value="Rajshahi" <?= isset($preData) && $preData->city === "Rajshahi" ? "selected" : null ?> <?= isset($city) && $city === "Rajshahi" ? "selected" : null ?>>Rajshahi</option>
                            <option value="Khulna" <?= isset($preData) && $preData->city === "Khulna" ? "selected" : null ?> <?= isset($city) && $city === "Khulna" ? "selected" : null ?>>Khulna</option>
                            <option value="Rongpur" <?= isset($preData) && $preData->city === "Rongpur" ? "selected" : null ?> <?= isset($city) && $city === "Rongpur" ? "selected" : null ?>>Rongpur</option>
                            <option value="Bogura" <?= isset($preData) && $preData->city === "Bogura" ? "selected" : null ?> <?= isset($city) && $city === "Bogura" ? "selected" : null ?>>Bogura</option>
                            <option value="Others" <?= isset($preData) && $preData->city === "Others" ? "selected" : null ?> <?= isset($city) && $city === "Others" ? "selected" : null ?>>Others</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Phone Number" name="phone" required value="<?= $preData->phone ?? $phone ?? null  ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm" name="<?= !isset($updateId) ? "sub123" : "up123" ?>">
                            <?= !isset($updateId) ? "Add Student" : "Update Student" ?>
                        </button>
                        <a class="btn btn-success btn-sm" href="./">Cancel</a>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <?php if ($selectStudents->num_rows > 0) { ?>
                    <table class="display" id="myTable" data-page-length='5'>
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Student Name</th>
                                <th>Student Gender</th>
                                <th>Student City</th>
                                <th>Student Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sn = 1;
                            while ($data = $selectStudents->fetch_object()) {
                            ?>
                                <tr>
                                    <td><?= $sn; ?></td>
                                    <td><?= $data->name; ?></td>
                                    <td><?= $data->gender; ?></td>
                                    <td><?= $data->city; ?></td>
                                    <td><?= $data->phone; ?></td>
                                    <td style="width: max-content;">
                                        <div class="d-flex">
                                            <a href="./index.php?update=<?= $data->id ?>" class="btn btn-warning btn-sm me-2">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a href="./index.php?delete=<?= $data->id ?>" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $sn++;
                            } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h2 class="alert alert-danger">No Data Found</h2>
                <?php } ?>
            </div>
        </div>

    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, 'All'],
                ],
            });
        });
    </script>
</body>

</html>