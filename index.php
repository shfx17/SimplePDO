<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/crudPDO.php');

$object = new DBConnect();

if(isset($_POST['selectTable'])){
	$object->select("SELECT * FROM users");
}

if(isset($_POST['insertTable'])){
	$object->insert("INSERT INTO users (name, city) VALUES (:name, :city)", $_POST['recordOne'], $_POST['recordTwo']);
}

if(isset($_POST['updateTable'])){
	$object->update("UPDATE users SET name = :name  WHERE id = :id", $_POST['recordUpdateOne'], $_POST['recordUpdateTwo']);
}

if(isset($_POST['deleteTable'])){
	$object->delete("DELETE FROM users WHERE name = :name", $_POST['recordDelete']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>PDO Script</title>
  </head>
  <body>
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Databases Service - Insert</h4>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="recordOne"class="form-control" placeholder="Name record" required="required">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="recordTwo"class="form-control" placeholder="Name record" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="insertTable" class="btn btn-primary btn-block btn-lg" value="Insert">
					</div>
				</form>		
			</div>
		</div>
	</div>
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Databases Service - Select</h4>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<div class="form-group">
						<input type="submit" name="selectTable" class="btn btn-primary btn-block btn-lg" value="Select">
					</div>
				</form>		
			</div>
		</div>
	</div>
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Databases Service - Update</h4>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="recordUpdateOne"class="form-control" placeholder="Name record" required="required">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="recordUpdateTwo"class="form-control" placeholder="ID record" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="updateTable" class="btn btn-primary btn-block btn-lg" value="Select">
					</div>
				</form>		
			</div>
		</div>
	</div>
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Databases Service - Delete</h4>
			</div>
			<div class="modal-body">
				<form action="#" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="recordDelete"class="form-control" placeholder="Name record" required="required">
					</div>
					<div class="form-group">
						<input type="submit" name="deleteTable" class="btn btn-primary btn-block btn-lg" value="Select">
					</div>
				</form>		
			</div>
		</div>
	</div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>