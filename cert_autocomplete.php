<?php 

$db = new PDO('mysql:host=localhost;dbname=bms','root','');
$return_arr = array();


if (isset($_POST['search'])){

try {
    $search = $_POST['search'];
    $stmt = $db->prepare("SELECT residences.residenceID, residences.FirstName,  residences.MiddleName ,residences.LastName, residences.Year, residences.Address,  blotter_records.status
    FROM residences 
    LEFT JOIN blotter_records ON residences.residenceID = blotter_records.residence_id 

        WHERE FirstName LIKE :cert_autocomplete or MiddleName LIKE :cert_autocomplete or LastName LIKE :cert_autocomplete");
    $stmt->execute(array('cert_autocomplete' => '%'.$_POST['search'].'%'));

    while($row = $stmt->fetch()) {
             $return_arr[] = array("label" => $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName'],
                           "value" =>  intval(date("Y"))-intval(substr($row['Year'], 0,4)),
                            "add" => $row['Address'],
                            "stats" => $row['status'],
                             "id" => $row['residenceID']);

    }

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
echo json_encode($return_arr);

 }

 ?>