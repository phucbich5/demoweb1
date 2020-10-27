<?php
session_start();
include('functions.php');

// $id = isset($_GET['id']) ? $_GET['id'] : '';
// $result = getUserById($id);

$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
$listsearch = searchUser($keyword);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Result</h2>
        </div>
        <form>
            <?php echo display_error(); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">AVT</th>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listsearch as $item) {
                    ?>
                        <tr scope="row">
                            <td><?php if ($item['user_type'] === "admin") { ?>
                                    <img src="./public/images/admin_profile.png" class="img-fluid" alt="" style="width:50px;height:50px;">
                                <?php } else { ?>
                                    <img src="./public/images/user_profile.png" class="img-fluid" alt="" style="width:50px;height:50px;">
                                <?php } ?></td>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['username']; ?></td>
                            <td><?php echo $item['fullname']; ?></td>
                            <td><?php echo $item['email']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
        <div class="back" style="text-align: center">
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
        </div>
    </div>
</body>

</html>