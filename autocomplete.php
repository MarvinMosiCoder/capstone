<?php  

/*include "connection/config.php";

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $query = "SELECT * FROM users WHERE name like'%".$search."%'";
    $result = mysqli_query($conn,$query);
    
    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['id'],"label"=>$row['name']);
    }

    echo json_encode($response);
}

exit;*/


$db = new PDO('mysql:host=localhost;dbname=bms','root','');
$return_arr = array();


if (isset($_POST['search'])){

try {
    $search = $_POST['search'];
    $stmt = $db->prepare("SELECT residenceID,FirstName,MiddleName,LastName FROM residences WHERE FirstName LIKE :autocomplete or MiddleName LIKE :autocomplete or LastName LIKE :autocomplete");
    $stmt->execute(array('autocomplete' => '%'.$_POST['search'].'%'));

    while($row = $stmt->fetch()) {
             $return_arr[] = array("label" => $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'],
                           "value" =>  $row['residenceID']);

    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
echo json_encode($return_arr);

 }
 ?>  
