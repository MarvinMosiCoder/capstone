<?php  //export.php  
$connect = mysqli_connect("localhost", "root", "", "bms");
$output = '';
if(isset($_POST["export"])){ 
   $process_name = $_POST['process_name'];
   $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Downloaded excel for Residence Information')";
   $proc_result = mysqli_query($connect,$proc_sql); 


 $query = "SELECT * FROM residences";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0) {  
$output .= '   <table class="table" bordered="1" cellpading="5">
<h3 class="text-center">Barangay Management System Records</h3>                      
<tr>                           
<th>Name</th>
<th>MiddleName</th>
<th>LastName</th>                          
<th>Address</th>                           
<th>Area</th>         
<th>Registered Voter</th>                          
</tr>  ';  
while($row = mysqli_fetch_array($result))  {  
 $output .= '    <tr>                           
<td>'.$row["FirstName"].'</td> 
<td>'.$row["MiddleName"].'</td>  
<td>'.$row["LastName"].'</td>                          
<td>'.$row["Address"].'</td>                          
 <td>'.$row["area"].'</td>         
<td>'.$row["VoterStatus"].'</td>                             
</tr>   ';  }  
$output .= '</table>';  
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment; filename=download.xls');  
echo $output; 
}
}

//GENERATE PDF
// create new PDF document
$conn = new PDO('mysql:host=localhost;dbname=bms','root','');
require "fpdf/fpdf.php";
if (isset($_POST['generate_pdf'])) {

   $process_name = $_POST['process_name'];
   $proc_sql = "INSERT INTO activity_log (process_name, process_type) VALUES ('$process_name','Generated PDF for Residence Information')";
   $proc_result = mysqli_query($connect,$proc_sql); 

   class myPDF extends FPDF {
    function header(){
    
      $this -> setFont('Arial', 'B',14);
      $this -> Cell(280,5,'RESIDENCE DOCUMENTS', 0,0,'C');
      $this -> Ln();
      $this -> setFont('Times', '',12);
      $this -> Cell(276,10,'Street Address of bBrngay Office', 0,0,'C');
      $this -> Ln();
    }
    function footer(){
      $this -> SetY(-15);
      $this -> setFont('Arial', '',8);
      $this -> Cell(0,10,'Page'.$this->PageNo().'/{nb}', 0,0,'C');
    }
    function headerTable()  {
      $this -> setFont('Times', 'B',12);
      $this -> Cell(10,10,'ID', 1,0,'C');
      $this -> Cell(30,10,'FirstName', 1,0,'C');
      $this -> Cell(30,10,'MiddleName', 1,0,'C');
      $this -> Cell(30,10,'LastName', 1,0,'C');
      
      $this -> Cell(40,10,'BirthPlace', 1,0,'C');
      $this -> Cell(60,10,'Address', 1,0,'C');
      $this -> Cell(30,10,'area', 1,0,'C');
      $this -> Cell(30,10,'VoterStatus', 1,0,'C');
      $this -> Ln();
    }
    function viewTable($conn) {
      $this -> setFont('Times', '',12);
      $query = $conn->query('SELECT * FROM residences');
      while($data = $query->fetch(PDO::FETCH_OBJ)){
        $this->Cell(10,10,$data->residenceID,1,0,'C');
        $this->Cell(30,10,$data->FirstName,1,0,'C');
        $this->Cell(30,10,$data->MiddleName,1,0,'C');
        $this->Cell(30,10,$data->LastName,1,0,'C');
        
        $this->Cell(40,10,$data->BirthPlace,1,0,'C');
        $this->Cell(60,10,$data->Address,1,0,'C');
        $this->Cell(30,10,$data->area,1,0,'C');
        $this->Cell(30,10,$data->VoterStatus,1,0,'C');
        $this -> Ln();

      }
    }

  }



$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Output();
}
?>