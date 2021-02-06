<?php
require('../fpdf182/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=sales','root','');

class mypdf extends FPDF
{
	
	function header()
	{
		$db = new PDO('mysql:host=localhost;dbname=sales','root','');
		$this->Image('../assets/img/brand/dashboard.png',10,10,75);
		$this->setfont('arial', 'B', 13);
		$this->cell(180,4,'CHENITH ENTERPRISES (DISTRIBUTOR)',0,1,'R');
		$this->Ln();
		$this->cell(180,4,'Paragahathota, Wathugedara',0,1,'R');							
		$this->Ln();
		$this->cell(180,4,'Tel: 0773103577',0,1,'R');
		$this->Ln();
		$this->cell(180,4,'E-mail: nshardware@kryptonelectric',0,1,'R');
		$this->Ln(10);
		$this->Line(10, 45, 210-20, 45);
		date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
		$this->cell(180,4,'Sales Inventory Report',0,1,'C');
		$this->Ln();
		$this->cell(180,4,'From '.$_GET['date'].' To '.$Due,0,1,'C');
		
		$this->Ln(10);
	}
	function footer()
	{
		$this-> setY(-15);
		$this->setfont('arial', '', 8);
		$this->cell(0,10,'page' .$this->PageNo().'/{nb}',0,0,'c');
	}
	function headerTable(){
         $this->setfont('Times', 'B', 9);
         $this->cell(22	,10,'PRODUCT ID',1,0,'C');
         $this->cell(55,10,'PRODUCT NAME',1,0,'C');
         $this->cell(35,10,'RECIEVED QUANTITY',1,0,'C');
         $this->cell(35,10,'SOLD QUANTITY',1,0,'C');
         $this->cell(35,10,'QUANTITY ON HAND',1,0,'C');
		 $this->Ln();

	}
	function viewTable($db)
	{
		date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
        $pre = $_GET['date'];
		
		$sql1=$db->query('SELECT * FROM  products ORDER BY  product_id ASC');
		while ($product =$sql1->fetch(PDO :: FETCH_OBJ)) {
			$this->cell(22,10, $product->product_id,1,0,'C');
			$this->cell(55,10, $product->product_name,1,0,'L');
			
			$sql2=$db->query('SELECT product_id, sum(qty) as Qty FROM supplier_stock INNER JOIN supply_item  ON  supplier_stock.stock_id=supply_item.supply_id WHERE recived_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'".' GROUP BY  product_id ORDER BY  product_id ASC');
			// var_dump($sql3);exit;
			
			$flag=0;
			while($sup =$sql2->fetch(PDO :: FETCH_OBJ)){
				if ($product->product_id == $sup->product_id) {
					$this->cell(35,10, $sup->Qty,1,0,'C');
					$flag++;
				}
			}
			if ($flag==0) {
				$this->cell(35,10, "0",1,0,'C');
			}
			$sql3=$db->query('SELECT product_id, sum(qty) as Qty FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'".' GROUP BY  product_id ORDER BY  product_id ASC');
			// var_dump($sql3);exit;
			
			$flag=0;
			while($order =$sql3->fetch(PDO :: FETCH_OBJ)){
				if ($product->product_id == $order->product_id) {
					$this->cell(35,10, $order->Qty,1,0,'C');
					$flag++;
				}
			}
			if ($flag==0) {
				$this->cell(35,10, "0",1,0,'C');
			}
			
			$this->cell(35,10, $product->available_qty,1,0,'C');
				
			
		
		$this->Ln();
		}
		$this->Ln(20);
		$this->setfont('Times', 'B', 12);
		$this->cell(180,10, "Signature: ................................................",0,0,'R');
	}
}


$pdf = new mypdf();

$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Ln();
$pdf->output();


?>
