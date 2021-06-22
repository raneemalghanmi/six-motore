<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname="rebortdata";

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);
// Check connection
if (mysqli_connect_errno()) {
   printf("Connection failed: %s\n " ,mysqli_connect_errno());
}

//  echo"<pre>";
//  print_r($_POST) ;
//  echo"</pre>";


if(isset($_POST['save'])){
   $v1 = $_POST['m1'];
   $v2 = $_POST['m2'];
   $v3 = $_POST['m3'];
   $v4 = $_POST['m4'];
   $v5 = $_POST['m5'];
   $v6 = $_POST['m6'];

 //   $sql= "select * from motors_value WHERE 1 ";
 //   $result = mysqli_query($conn, $sql );
    	

    $sql= "INSERT INTO motors_value (op_id,motor1,motor2,motor3,motor4,motor5,motor6) VALUES (NULL,'$v1', '$v2', '$v3', '$v4', '$v5', $v6)";
    $result = @mysqli_query($conn, $sql );
	if ($result) {
        echo "New added successfully !";
      } else {
         echo "Error: " . $sql . ":-" . mysqli_error($conn);
      }
      
   }elseif(isset($_GET['Running'])){
       $result = mysqli_query($conn,"SELECT * FROM motors_value   order by op_id DESC limit 1" );
      $data= @mysqli_fetch_assoc($result);
       if( @$data['op_id']>0)
         {
echo json_encode($data) ;

        }else {
        
    
    
      }
    }

 
?>
