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
		$this->cell(180,4,'Financial Report',0,1,'C');
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
         $this->setfont('Times', 'B', 10);
         $this->cell(30,10,'PRODUCT ID',1,0,'C');
         $this->cell(70,10,'PRODUCT NAME',1,0,'C');
         $this->cell(40,10,'SELL QUANTITY',1,0,'C');
         $this->cell(40,10,'PROFIT',1,0,'C');

	}
	function viewTable($db)
	{
		
		
		
		$this->cell(70,10,'Item Purches Value: ',0,0,'L');
		date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
        $pre = $_GET['date'];
		$sql2=$db->query('SELECT sum(billing_price) as billing FROM supplier_stock WHERE recived_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
		// var_dump($sql2); exit;
        $total1 =$sql2->fetch(PDO :: FETCH_OBJ);
		// var_dump($total); exit;
		$this->cell(70,10,$total1->billing." LKR",0,0,'L');

		$this->Ln(10);
		$this->cell(70,10,'Complete Order Value: ',0,0,'L');
		date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
        $pre = $_GET['date'];
		$sql2=$db->query('SELECT sum(total_amount) as totalAmount FROM place_order WHERE order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
		// var_dump($sql2); exit;
        $total =$sql2->fetch(PDO :: FETCH_OBJ);
		// var_dump($total); exit;
		$this->cell(70,10,$total->totalAmount." LKR",0,0,'L');

		$this->Ln(10);
		$sql3=$db->query('SELECT sum(total_amount) as t FROM payment WHERE payment_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
		// var_dump($sql2); exit;
        $total2 =$sql3->fetch(PDO :: FETCH_OBJ);
		$this->cell(70,10,'Recieved Order Value: ',0,0,'L');
		$this->cell(70,10,$total2->t." LKR",0,0,'L');

		$this->Ln(10);
		$sql3=$db->query('SELECT sum(return_value) as ret FROM return_product WHERE return_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
		$total3 =$sql3->fetch(PDO :: FETCH_OBJ);
		$this->cell(70,10,'Return Item Value: ',0,0,'L');
		$this->cell(70,10,$total3->ret." LKR",0,0,'L');

		$this->Ln(10);
		$sql4 =$db->query('SELECT  sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
		$total4 =$sql4->fetch(PDO :: FETCH_OBJ);
		// var_dump($total4);
		// exit;
		$this->cell(70,10,'Expected Income: ',0,0,'L');
		$this->cell(70,10,$total4->Profit." LKR",0,0,'L');

		$this->Ln(10);
		$this->cell(70,10,'Most Sold Item: ',0,0,'L');
		date_default_timezone_set("Asia/Kolkata"); 
		$Due = date("Y-m-d");
		$pre = $_GET['date'];
		// echo $Due; exit;
		$sql3=$db->query('SELECT product_id, sum(qty) FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'".' GROUP BY  product_id ORDER BY SUM(qty) Desc LIMIT 1');
		// var_dump($sql3);exit;
				
		$order =$sql3->fetch(PDO :: FETCH_OBJ);
		// var_dump($order);exit;
		$sql1=$db->query('SELECT * FROM  products');	
		while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
			if ($product->product_id == $order->product_id) {
				$this->cell(70,10, $product->product_name,0,0,'L');
			}
		}
		

		$this->Ln(10);
		$this->cell(70,10,'Least Sold Item: ',0,0,'L');
		date_default_timezone_set("Asia/Kolkata"); 
		$Due = date("Y-m-d");
		$pre = $_GET['date'];
		// echo $Due; exit;
		$sql4=$db->query('SELECT product_id, sum(qty) FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'".' GROUP BY  product_id ORDER BY SUM(qty) asc LIMIT 1');
		// var_dump($sql3);exit;
				
		$order2 =$sql4->fetch(PDO :: FETCH_OBJ);
		// var_dump($order);exit;	
		$sql1=$db->query('SELECT * FROM  products');
		while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
			if ($product->product_id == $order2->product_id) {
				$this->cell(70,10, $product->product_name,0,0,'L');
			}
		}
		$this->Ln(30);
		$this->setfont('Times', 'B', 12);
		$this->cell(180,10, "Signature: ................................................",0,0,'R');

	}
}


$pdf = new mypdf();

$pdf->AddPage();
// $pdf->headerTable();
$pdf->viewTable($db);
$pdf->Ln();
$pdf->output();


?>
