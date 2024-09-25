
<?php
define("FPDF_FONTPATH", __DIR__.'/font');
require( __DIR__.'/fpdf.php');


class PDF extends FPDF
{

function __construct(){
    parent::__construct();
}


function createTablePDF($Config){
	
	$this->SetFont('Arial','',7);
	$this->AddPage();
	$this->FancyTable($Config["CellWeight"],$Config["Title"],$Config["Header"],$Config["Data"]);
	$this->Output('F',$Config["Dest"]);
    $this->Close();
}



// Colored table
function FancyTable($w, $title, $header, $data)
{
    // $this->Cell(array_sum($w),6,strtoupper($title),'LR',0,'C');
    // $this->Ln();
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    
     
    // Header
   // $w = array(20, 20);
    $this->Cell(array_sum($w),7,strtoupper($title),1,0,'C',true);
    $this->Ln();

    $this->Ln();
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,strtoupper($header[$i]),1,0,'L',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        //$this->Cell(20,6,$row[0],'LR',0,'L',$fill);
        //$this->Cell(20,6,$row[1],'LR',0,'L',$fill);
        // $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        // $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $i=0;
        foreach($row as $value){
             $this->Cell($w[$i],6,strtoupper($value),'LR',0,'L',$fill);
             $i++;
        }
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}


function createSummaryDataPDF($config){
        // $this->Cell(array_sum($w),6,strtoupper($title),'LR',0,'C');
        // $this->Ln();
        // Colors, line width and bold font
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
         
        // Header
       // $w = array(20, 20);
        $this->Cell(array_sum($Config["CellWeight"]),7,strtoupper($Config["Title"]),1,0,'C',true);
        $this->Ln();

        $this->Ln();
        $this->Cell(40,7,"High Priority",1,0,'L',true);
        $this->Cell(60,7,"High Priority",1,0,'L',true);
        $this->Cell(60,7,"Low Priority",1,0,'L',true);
        $this->Ln();
        $this->Cell(40,7,"High Priority",1,0,'L',true);
        $this->Cell(20,7,"IN TIME",1,0,'L',true);
        $this->Cell(20,7,"TIME OVER",1,0,'L',true);
        $this->Cell(20,7,"TOTAL",1,0,'L',true);
        $this->Cell(20,7,"IN TIME",1,0,'L',true);
        $this->Cell(20,7,"TIME OVER",1,0,'L',true);
        $this->Cell(20,7,"TOTAL",1,0,'L',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        /*foreach($data as $row)
        {
            //$this->Cell(20,6,$row[0],'LR',0,'L',$fill);
            //$this->Cell(20,6,$row[1],'LR',0,'L',$fill);
            // $this->Cell($Config["CellWeight"][2],6,number_format($row[2]),'LR',0,'R',$fill);
            // $this->Cell($Config["CellWeight"][3],6,number_format($row[3]),'LR',0,'R',$fill);
            $i=0;
            foreach($row as $value){
                 $this->Cell($Config["CellWeight"][$i],6,strtoupper($value),'LR',0,'L',$fill);
                 $i++;
            }
            $this->Ln();
            $fill = !$fill;
        }*/
        // Closing line
        $this->Cell(array_sum($Config["CellWeight"]),0,'','T');
}


function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    //$this->Cell(80);
    // Title
    $this->Cell(60,10,PROJECT_NAME/*."".date("d/M/Y")*/."",1,0,'L');
    $this->Cell(60,10,"Date : ".date("d/M/Y"),1,0,'R');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}



}

?>

