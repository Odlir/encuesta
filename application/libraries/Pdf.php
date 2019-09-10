<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/tcpdf_min/tcpdf.php';
 
class Pdf extends TCPDF
{

    function __construct()
    {
        parent::__construct();
    }
    
    public function Header() {
		$this->Image("assets/img/logo_upc.png", 20, 10, 0, 0, 'PNG', '', '', false, 150, '', false, false, 0, false, false, false);
	}
	
	function strtolower_utf8($string){ 
	  $convert_to = array( 
	    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", 
	    "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", 
	    "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж", 
	    "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", 
	    "ь", "э", "ю", "я" 
	  ); 
	  $convert_from = array( 
	    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", 
	    "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", 
	    "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", 
	    "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ", 
	    "Ь", "Э", "Ю", "Я" 
	  ); 

	  return str_replace($convert_from, $convert_to, $string); 
	} 
	  
	  //footer personalizado
	  public function Footer() {
		// set style for barcode
		$style = array(
		    'border' => 0,
		    'vpadding' => 'auto',
		    'hpadding' => 'auto',
		    'fgcolor' => array(0,0,0),
		    'bgcolor' => false, //array(255,255,255)
		    'module_width' => 1, // width of a single module in points
		    'module_height' => 1 // height of a single module in points
		);
	    // posicion
	   /* $this->SetY(-25);
	    $this->Rect(15,235,180,20,'FD','',array(255,255,255));
	    $this->SetXY(20, -60);
	    $this->SetFont('helvetica', 'B', 8);
	    $this->Cell(30,5,"OP. GRAVADAS",1,0,'C',0);
	    $this->SetXY(20, -53);
	    $this->Cell(30,5,$this->TotGravadas,0,0,'C',0);
	    $this->SetXY(70, -60);
	    $this->Cell(30,5,"OP. EXONERADAS",1,0,'C',0);
	    $this->SetXY(70, -53);
	    $this->Cell(30,5,$this->TotExoneradas,0,0,'C',0);
	    $this->SetXY(115, -60);
	    $this->Cell(30,5,"OP. INAFECTAS",1,0,'C',0);
	    $this->SetXY(115, -53);
	    $this->Cell(30,5,$this->TotInafectas,0,0,'C',0);
	     $this->SetXY(160, -60);
	    $this->Cell(30,5,"OP. GRATUITAS",1,0,'C',0);
	     $this->SetXY(160, -53);
	    $this->Cell(30,5,$this->TotGratuitas,0,0,'C',0);
	    $this->SetFont('helvetica', '', 8);
	   	$this->SetXY(145, -40);
	  
		$this->MultiCell(50,15,'Representación impresa de la '.ucwords(strtolower($this->strtolower_utf8($this->NomDocumento))).', autorizado mediante Resolución de Intendencia N°. XXXXXXXXXXXXX.',0,'J');					

	    $this->write2DBarcode($this->CodBarras, 'PDF417', 10, 255, 135, 20, $style, 'N');*/
	  
	    
	    // fuente
	    //$this->SetFont('helvetica', 'I', 8);
	    // numero de pagina
	    //$this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	  }
	function SetDash($black=false, $white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d', $black*$this->k, $white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
}

