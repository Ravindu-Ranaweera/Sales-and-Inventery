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
		$this->cell(180,4,$_GET['date'].' to '.$Due.' Sales Report',0,1,'C');
		
	
		
		
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
		
		$sql1=$db->query('SELECT * FROM  products');
		
			while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
				// var_dump($product);exit;
				if($product->product_catogery == "Accessories"){
					$this->Ln();
					$this->cell(30,10,$product->product_id,1,0,'C');
					$this->cell(70,10,$product->product_name,1,0,'C');
					
					date_default_timezone_set("Asia/Kolkata"); 
        			$Due = date("Y-m-d");
					$pre = $_GET['date'];
					// echo $Due; exit;
					$sql3=$db->query('SELECT sum(qty) as Qty, sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE product_id = '.$product->product_id.' AND order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
					// var_dump($sql3);exit;
					
					$order =$sql3->fetch(PDO :: FETCH_OBJ);
					// var_dump($order);exit;	
					// echo $order->Qty;exit;
					$this->cell(40,10,$order->Qty,1,0,'C');

					$this->cell(40,10,$order->Profit,1,0,'C');
				}
			}
			
			$sql1=$db->query('SELECT * FROM  products');
			while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
				// var_dump($product);exit;
				if($product->product_catogery == "Gang Switches"){
					$this->Ln();
					$this->cell(30,10,$product->product_id,1,0,'C');
					$this->cell(70,10,$product->product_name,1,0,'C');
					
					date_default_timezone_set("Asia/Kolkata"); 
        			$Due = date("Y-m-d");
					$pre = $_GET['date'];
					// echo $Due; exit;
					$sql3=$db->query('SELECT sum(qty) as Qty, sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE product_id = '.$product->product_id.' AND order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
					// var_dump($sql3);exit;
					
					$order =$sql3->fetch(PDO :: FETCH_OBJ);
					// var_dump($order);exit;	
					// echo $order->Qty;exit;
					$this->cell(40,10,$order->Qty,1,0,'C');

					$this->cell(40,10,$order->Profit,1,0,'C');
				}
			}
			$sql1=$db->query('SELECT * FROM  products');
			while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
				// var_dump($product);exit;
				if($product->product_catogery == "Other switches"){
					$this->Ln();
					$this->cell(30,10,$product->product_id,1,0,'C');
					$this->cell(70,10,$product->product_name,1,0,'C');
					
					date_default_timezone_set("Asia/Kolkata"); 
        			$Due = date("Y-m-d");
					$pre = $_GET['date'];
					// echo $Due; exit;
					$sql3=$db->query('SELECT sum(qty) as Qty, sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE product_id = '.$product->product_id.' AND order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
					// var_dump($sql3);exit;
					
					$order =$sql3->fetch(PDO :: FETCH_OBJ);
					// var_dump($order);exit;	
					// echo $order->Qty;exit;
					$this->cell(40,10,$order->Qty,1,0,'C');

					$this->cell(40,10,$order->Profit,1,0,'C');
				}
			}

			$sql1=$db->query('SELECT * FROM  products');
			while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
				// var_dump($product);exit;
				if($product->product_catogery == "Sockets"){
					$this->Ln();
					$this->cell(30,10,$product->product_id,1,0,'C');
					$this->cell(70,10,$product->product_name,1,0,'C');
					
					date_default_timezone_set("Asia/Kolkata"); 
        			$Due = date("Y-m-d");
					$pre = $_GET['date'];
					// echo $Due; exit;
					$sql3=$db->query('SELECT sum(qty) as Qty, sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE product_id = '.$product->product_id.' AND order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
					// var_dump($sql3);exit;
					
					$order =$sql3->fetch(PDO :: FETCH_OBJ);
					// var_dump($order);exit;	
					// echo $order->Qty;exit;
					$this->cell(40,10,$order->Qty,1,0,'C');

					$this->cell(40,10,$order->Profit,1,0,'C');
				}
			}
			
			$sql1=$db->query('SELECT * FROM  products');
			while($product =$sql1->fetch(PDO :: FETCH_OBJ)){
				// var_dump($product);exit;
				if($product->product_catogery == "Switch Gears"){
					$this->Ln();
					$this->cell(30,10,$product->product_id,1,0,'C');
					$this->cell(70,10,$product->product_name,1,0,'C');
					
					date_default_timezone_set("Asia/Kolkata"); 
        			$Due = date("Y-m-d");
					$pre = $_GET['date'];
					// echo $Due; exit;
					$sql3=$db->query('SELECT sum(qty) as Qty, sum(profit) as Profit FROM place_order INNER JOIN order_item  ON  place_order.order_id=order_item.order_id WHERE product_id = '.$product->product_id.' AND order_date BETWEEN '."'".$pre."'".' AND '."'".$Due."'");
					// var_dump($sql3);exit;
					
					$order =$sql3->fetch(PDO :: FETCH_OBJ);
					// var_dump($order);exit;	
					// echo $order->Qty;exit;
					$this->cell(40,10,$order->Qty,1,0,'C');

					$this->cell(40,10,$order->Profit,1,0,'C');
				}
			}
			
		
		
		
// 		while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {
// 			// echo $data->product_id;
// 			// $a = $data->product_id;
// 			// exit;
// 			$this->Ln();
// 			$stmtt=$db->query('SELECT * FROM  products WHERE product_id ='.$data->product_id.'  LIMIT 1');
// 			$datat =$stmtt->fetch(PDO :: FETCH_OBJ);
// 				$this->cell(70,10,$datat->product_name,1,0,'C');
//          		$this->cell(40,10, $datat->sell_unit_price.' LKR',1,0,'C');
//          		$this->cell(30,10,$data->qty,1,0,'C');
//          		$this->cell(40,10,$data->qty*$datat->sell_unit_price.' LKR',1,0,'R');
			
			
		 
// 		}
// 		//  exit;
// 		   $this->Ln();

// 		   $this->cell(140,10,'Sub Total'	,0,0,'R');
// 		   $this->cell(40,10,$dataOrder->total_amount.' LKR',0,0,'R');

// 		   $this->Ln();

// 		   $sql=$db->query('SELECT * FROM  return_product WHERE order_id = '.$_GET['order_id'].' LIMIT 1');
// 		   $row2 =$sql->fetch(PDO :: FETCH_OBJ);
// 		   $ret=0;
		   

// 		   if( $row2 != NULL){
			  
// 			   $ret =$row2->return_value;
// 		   }
			
// 		   if($row2 != NULL){
// // 			   echo $row2->return_id;
// // exit;
// 				$sql1=$db->query('SELECT * FROM  return_item WHERE return_id ='.$row2->return_id);
// 				while ($row3 =$sql1->fetch(PDO :: FETCH_OBJ)) {
// // var_dump($row3);
// // exit;
// 					$sql=$db->query('SELECT * FROM  products WHERE product_id = '.$row3->product_id.' LIMIT 1');
// 					$row4 =$sql->fetch(PDO :: FETCH_OBJ);
// 						$this->cell(70,10,$row4->product_name,1,0,'C');
// 						$this->cell(40,10, $row4->sell_unit_price.' LKR',1,0,'R');
// 						$this->cell(30,10,$row3->qty,1,0,'C');
// 						$this->cell(40,10,"-".$row3->qty*$row4->sell_unit_price.' LKR',1,0,'R');
// 						$this->Ln();	
		   
// 				}
// 			}
			
// 			$this->cell(140,10,'Return Total'	,0,0,'R');
// 			$this->cell(40,10,"-".$ret.' LKR',0,0,'R');

// 			$this->Ln();	

// 			$this->cell(140,10,'Total Bill Amount'	,0,0,'L');
// 			$this->cell(40,10,$dataOrder->total_amount-$ret.' LKR',0,0,'R');

// 			$this->Ln();	

// 			$this->cell(140,10,'Payment Recived',0,0,'L');

// 			$this->Ln();	
// 			$sql=$db->query('SELECT * FROM payment WHERE order_id = '.$_GET['order_id'].' ORDER BY payment_id DESC LIMIT 1');
// 			$row5 =$sql->fetch(PDO :: FETCH_OBJ);
// 			$this->cell(140,10,'Cash',0,0,'L');
// 			$this->cell(40,10,$row5->cash_amount.' LKR',0,0,'R');

// 			$this->Ln();
// 			$this->cell(140,10,'Check',0,0,'L');
// 			if($row5->cheque_id == 0) {
// 				$this->cell(40,10,"0.00 LKR",0,0,'R');
// 			}else{
// 				$sql2=$db->query('SELECT * FROM cheque WHERE cheque_id = '.$row5->cheque_id.' LIMIT 1');
// 				$row6 =$sql2->fetch(PDO :: FETCH_OBJ);
// 				$this->cell(40,10,$row6->sub_total.' LKR',0,0,'R');
// 				// echo $row4['sub_total'];;
// 			}
			
// 			$this->Ln();	

// 			$this->cell(140,10,'Full Payment Recived'	,0,0,'L');
// 			$this->cell(40,10,$dataOrder->paid_amount.' LKR',0,0,'R');

// 			$this->Ln();	

// 			$this->cell(140,10,'Payment Arrears'	,0,0,'L');
// 			$this->cell(40,10,($dataOrder->total_amount-$ret)-$dataOrder->paid_amount.' LKR',0,0,'R');

// 			$this->Ln(20);	

// 			$this->cell(140,10,'Signature: ',0,0,'R');
// 			$this->cell(40,10,".............................................",0,0,'c');
			
	 }
}


$pdf = new mypdf();

$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Ln();
$pdf->output();


?>
