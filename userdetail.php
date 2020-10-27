<?php 
session_start();
include('functions.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

$result = getUserById($id);

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
            <h2>Thông tin Chi tiết</h2>
        </div>
        <form >
            <?php echo display_error(); ?>	
            <table class="table">
                <thead>
					<tr>
                        <th scope="col">images</th>
						<th scope="col">ID</th>
						<th scope="col">Username</th>
						<th scope="col">Full name</th>
                        <th scope="col">User type</th>
						<th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                    <td><?php if ($result['user_type'] === "admin") { ?>
                                    <img src="./public/images/admin_profile.png" class="img-fluid" alt="" style="width:50px;height:50px;">
                                <?php } else { ?>
                                    <img src="./public/images/user_profile.png" class="img-fluid" alt="" style="width:50px;height:50px;">
                                <?php } ?></td>
                        <td><?php echo $result['id']; ?></td>   
                        <td><?php echo $result['username']; ?></td>   
                        <td><?php echo $result['fullname']; ?></td> 
                        <td><?php echo $result['user_type']; ?></td>     
                        <td><?php echo $result['email']; ?></td> 	
                        <td>
                            <a href='./edit.php?id=<?php echo $result['id'] ?>'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>				
                    </tr>          
                </tbody>
            </table>
        </form>
        <div class="back" style="text-align: center">
		<button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
          
        </div>
        </div>
</body>
</html>