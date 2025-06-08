 <?php
		  
		  //include 'dbconnect.php';
		  $servername = "localhost";
$username = "root";
$password = "";
$database = "mascotsb";

$conn = mysqli_connect($servername , $username ,$password ,$database);

		  
		  if($_SERVER['REQUEST_METHOD'] === 'POST'){
		  
		  $name = $_POST['name'];
		  $surname = $_POST['surname'];
		  $email = $_POST['email'];
		  $message =$_POST['message'];
		  
		  $sql = "INSERT INTO `inquiry` (`name`, `surname`, `email`, `message`, `date`) VALUES ('$name', '$surname', 
		  '$email', '$message', current_timestamp())";
		  
		  $result = mysqli_query($conn , $sql);
		  
		  if($result){
		  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> Your messge has been successfully uploaded!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'; 
		  }
		  }
		  ?>