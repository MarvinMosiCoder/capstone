<?php
  $conn = mysqli_connect('localhost','root','');
  mysqli_select_db($conn,'bms');
// Include the main TCPDF library (search for installation path).

// create new PDF document
require "fpdf/fpdf.php";
if (isset($_POST['generate_pdf'])) {

   class myPDF extends FPDF {
    function header(){
      $this -> Image('logo.jpg', 10,6);
      $this -> setFont('Arial', 'B',14);
      $this -> Cell(246,5,'RESIDENCE DOCUMENTS', 0,0,'C');
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
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Cell(20,10,'ID', 1,0,'C');
      $this -> Ln();
    }
    function viewTbales($conn) {
      $this -> setFont('Times', '',12);
      $query = mysqli_query('SELECT * FROM residences');
    }

  }



$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->Output();
}
		?>
