<?php
/*
//  print_r ($array);
*/
  require ('include/fpdf17/fpdf.php');
  class PDF extends FPDF {
    // Page header
    function Header() {
      // Logo
      $this -> Image("codici/".$_GET["file"].".png",10,6);
      // Arial bold 15
      $this -> SetFont('Arial','B',15);
      // Con primo parametro larghezza 0, prende in automatico la larghezza della pagina
      $this -> Cell(0,10,'Ecco il codice',0,0,'C');
      // Line break
      $this -> Ln(20);
    }

    // Page footer
    function Footer() {
      // Position at 1.5 cm from bottom
      $this -> SetY(-15);
      // Arial italic 8
      $this -> SetFont('Arial','I',8);
      // Page number
      $this -> Cell(0,10,'Pagina '.$this -> PageNo().'/{nb}',0,0,'C');
    }
  }

  // Instanciation of inherited class
  $pdf = new PDF();
  $pdf -> AliasNbPages();
  $pdf -> AddPage();
  $pdf -> SetFont('Times','',12);

/*
  for($i=1;$i<=40;$i++) {
      $pdf -> Cell(0,10,'Printing line number '.$i,1,1);
  }
*/
  $pdf -> Output("codici/".$_GET["file"].".pdf", "F");
?>
