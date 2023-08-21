<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>

</head>
<?php
include_once('connection.php');
session_start();
if (empty($_SESSION['username'])) {
	header('location:dashboardlogin.php');
}
$sql = "SELECT*FROM user";
$result = mysqli_query($connection, $sql);
$row = mysqli_num_rows($result);
if ($row) {

	?>

	<body>
		<header>
			<img id="logo" src="admin.png" alt="" srcset="" width="100px" height="80px">
			<ul>
				<li><a href="producttable.php">Products Table</a></li>
				<li><a href="index.php">Product Page</a></li>
				<li><a style="color: red;" href="logoutadmin.php">Log Out</a></li>

			</ul>
			<div class="user">
				<img id="user" src="rabil.png" alt="" srcset="" width="">&NonBreakingSpace;
				<h2 style="color:darkblue;">Admin</h2>
			</div>
		</header>
		<br>


		<div class="container">
			<h1>USER TABLE</h1><br>
			<table>
				<thead>
					<tr>
						<th>USER ID</th>
						<th>USER NAME</th>
						<th>EMAIL</th>
						<th>PHONE NUMBER</th>
						<th>USER PASSWORD</th>
						<th>ADDRESS</th>
						<th colspan="2">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($data = mysqli_fetch_array($result)) {

						?>
						<tr>
							<td>
								<?php echo $data['id'] ?>
							</td>
							<td>
								<?php echo $data['uname'] ?>
							</td>
							<td>
								<?php echo $data['email'] ?>
							</td>
							<td>
								<?php echo $data['unumber'] ?>
							</td>
							<td>
								<?php echo $data['pass'] ?>
							</td>
							<td>
								<?php echo $data['uaddress'] ?>
							</td>
							<td><a style="color: blue;text-decoration: none;"
									href="edit.php?id=<?php echo $data['id']; ?>">EDIT</a></td>
							<td style="background-color: ;"><a style="text-decoration: none;color: red;"
									onclick="return confirm('are u sure,you want to delete it')"
									href="delete.php ? id=<?php echo $data['id']; ?>">DELETE</a></td>
						</tr>
					</tbody>
					<br>
					<?php
					}
} else {
	echo "no record";
}
?>
			<style>
				html,
				body {
					height: 100%;
				}

				body {
					margin: 0;
					background: linear-gradient(45deg, #49a09d, #5f2c82);
					font-family: sans-serif;
					font-weight: 100;
				}

				.container {
					position: absolute;
					top: 50%;
					left: 50%;
					transform: translate(-50%, -50%);
				}

				table {
					width: fit-content;
					border-collapse: collapse;
					overflow: hidden;
					box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
				}

				th,
				td {
					padding: 15px;
					background-color: rgba(255, 255, 255, 0.2);
					color: #fff;
				}

				th {
					text-align: left;
				}

				thead {
					th {
						background-color: #55608f;
					}
				}

				tbody {
					tr {
						&:hover {
							background-color: rgba(255, 255, 255, 0.3);
						}
					}

					td {
						position: relative;

						&:hover {
							&:before {
								content: "";
								position: absolute;
								left: 0;
								right: 0;
								top: -9999px;
								bottom: -9999px;
								background-color: rgba(255, 255, 255, 0.2);
								z-index: -1;
							}
						}
					}
				}

				header {
					background-color: cadetblue;
					height: 100px;
					display: flex;
					justify-content: center;
					text-align: center;
					height: 60px;
					padding: 0px 15px;

				}

				#logo {
					position: relative;
					bottom: 14px;
				}

				.user {
					display: flex;
					margin-left: auto;
					justify-content: center;
					align-items: center;
				}

				#user {
					width: 50px;
					height: 50px;
				}

				header ul {
					display: flex;

				}

				header ul li {
					margin: 16px 13px;
					list-style: none;
				}

				header ul li a {
					color: black;
					text-decoration: none;
					font-size: 20px;
					font-family: 'Courier New', Courier, monospace;
					font-weight: 800;
				}

				* {
					margin: 0;
					padding: 0;
					font-family: 'Courier New', Courier, monospace;

				}

				.container2 {

					position: absolute;
					top: 30%;
					left: 50%;
					transform: translate(-50%, -50%);
				}

				h1 {
					text-align: center;
				}
			</style>

</body>

</html>