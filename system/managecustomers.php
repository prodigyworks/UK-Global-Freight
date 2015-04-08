<?php
	require_once("crud.php");
	
	class CustomerCrud extends Crud {
		
		/* Post header event. */
		public function postHeaderEvent() {
			createDocumentLink();
		}
		
		public function postScriptEvent() {
?>
			function editDocuments(node) {
				viewDocument(node, "addcustomerdocument.php", node, "customerdocs", "customerid");
			}
	
			/* Derived invoice address callback. */
			function fullInvoiceAddress(node) {
				var address = "";
				
				if ((node.invoiceaddress1) != "") {
					address = address + node.invoiceaddress1;
				} 
				
				if ((node.invoiceaddress2) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.invoiceaddress2;
				} 
				
				if ((node.invoiceaddress3) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.invoiceaddress3;
				} 
				
				if ((node.invoicecity) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.invoicecity;
				} 
				
				if ((node.invoicepostcode) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.invoicepostcode;
				} 
				
				if ((node.invoicecountry) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.invoicecountry;
				} 
				
				return address;
			}
	
			/* Derived delivery address callback. */
			function fullDeliveryAddress(node) {
				var address = "";
				
				if ((node.deliveryaddress1) != "") {
					address = address + node.deliveryaddress1;
				} 
				
				if ((node.deliveryaddress2) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.deliveryaddress2;
				} 
				
				if ((node.deliveryaddress3) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.deliveryaddress3;
				} 
				
				if ((node.deliverycity) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.deliverycity;
				} 
				
				if ((node.deliverypostcode) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.deliverypostcode;
				} 
				
				if ((node.deliverycountry) != "") {
					if (address != "") {
						address = address + ", ";
					}
					
					address = address + node.deliverycountry;
				} 
				
				return address;
			}
<?php			
		}
	}
	
	$crud = new CustomerCrud();
	$crud->dialogwidth = 650;
	$crud->title = "Customers";
	$crud->table = "{$_SESSION['DB_PREFIX']}customer";
	$crud->sql = "SELECT A.*, B.name AS deliverymethodname, C.name AS customerteamname, D.name AS discountbandname
				  FROM  {$_SESSION['DB_PREFIX']}customer A
				  LEFT OUTER JOIN  {$_SESSION['DB_PREFIX']}deliverymethod B
				  ON B.id = A.deliverymethodid
				  LEFT OUTER JOIN  {$_SESSION['DB_PREFIX']}customerteam C
				  ON C.id = A.customerteamid
				  LEFT OUTER JOIN  {$_SESSION['DB_PREFIX']}discountband D
				  ON D.id = A.discountbandid
				  ORDER BY A.name";
	$crud->columns = array(
			array(
				'name'       => 'id',
				'viewname'   => 'uniqueid',
				'length' 	 => 6,
				'showInView' => false,
				'filter'	 => false,
				'bind' 	 	 => false,
				'editable' 	 => false,
				'pk'		 => true,
				'label' 	 => 'ID'
			),
			array(
				'name'       => 'accountnumber',
				'length' 	 => 17,
				'label' 	 => 'Account Number'
			),			
			array(
				'name'       => 'name',
				'length' 	 => 70,
				'label' 	 => 'Name'
			),
			array(
				'name'       => 'firstname',
				'length' 	 => 15,
				'label' 	 => 'First Name'
			),			
			array(
				'name'       => 'lastname',
				'length' 	 => 15,
				'label' 	 => 'Last Name'
			),			
			array(
				'name'       => 'owner',
				'length' 	 => 25,
				'label' 	 => 'Owner'
			),			
			array(
				'name'       => 'customerteamid',
				'type'       => 'DATACOMBO',
				'length' 	 => 10,
				'label' 	 => 'Customer Team',
				'table'		 => 'customerteam',
				'required'	 => true,
				'table_id'	 => 'id',
				'alias'		 => 'customerteamname',
				'table_name' => 'name'
			),
			array(
				'name'       => 'discountbandid',
				'type'       => 'DATACOMBO',
				'length' 	 => 14,
				'required'	 => false,
				'label' 	 => 'Discount Band',
				'table'		 => 'discountband',
				'table_id'	 => 'id',
				'alias'		 => 'discountbandname',
				'table_name' => 'name'
			),
			array(
				'name'       => 'invoiceaddress1',
				'length' 	 => 60,
				'showInView' => false,
				'label' 	 => 'Invoice Address 1'
			),
			array(
				'name'       => 'invoiceaddress2',
				'length' 	 => 60,
				'showInView' => false,
				'label' 	 => 'Invoice Address 2'
			),
			array(
				'name'       => 'invoiceaddress3',
				'length' 	 => 60,
				'showInView' => false,
				'required'	 => false,
				'label' 	 => 'Invoice Address 3'
			),
			array(
				'name'       => 'invoicecity',
				'length' 	 => 30,
				'showInView' => false,
				'label' 	 => 'Invoice City'
			),
			array(
				'name'       => 'invoicepostcode',
				'length' 	 => 10,
				'showInView' => false,
				'label' 	 => 'Invoice Post Code'
			),
			array(
				'name'       => 'invoicecountry',
				'length' 	 => 30,
				'showInView' => false,
				'label' 	 => 'Invoice Country'
			),
			array(
				'name'       => 'invoiceaddress',
				'length' 	 => 90,
				'editable'   => false,
				'bind'		 => false,
				'type'		 => 'DERIVED',
				'function'	 => 'fullInvoiceAddress',
				'label' 	 => 'Invoice Address'
			),
			array(
				'name'       => 'email1',
				'length' 	 => 40,
				'label' 	 => 'Invoice Email'
			),
			array(
				'name'       => 'telephone1',
				'length' 	 => 12,
				'label' 	 => 'Invoice Telephone'
			),
			array(
				'name'       => 'fax1',
				'length' 	 => 12,
				'required' 	 => false,
				'label' 	 => 'Invoice Fax'
			),
			array(
				'name'       => 'deliveryaddress1',
				'length' 	 => 60,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery Address 1'
			),
			array(
				'name'       => 'deliveryaddress2',
				'length' 	 => 60,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery Address 2'
			),
			array(
				'name'       => 'deliveryaddress3',
				'length' 	 => 60,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery Address 3'
			),
			array(
				'name'       => 'deliverycity',
				'length' 	 => 30,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery City'
			),
			array(
				'name'       => 'deliverypostcode',
				'length' 	 => 10,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery Post Code'
			),
			array(
				'name'       => 'deliverycountry',
				'length' 	 => 30,
				'showInView' => false,
				'required' 	 => false,
				'label' 	 => 'Delivery Country'
			),
			array(
				'name'       => 'deliveryaddress',
				'length' 	 => 90,
				'editable'   => false,
				'bind'		 => false,
				'type'		 => 'DERIVED',
				'function'	 => 'fullDeliveryAddress',
				'label' 	 => 'Delivery Address'
			),
			array(
				'name'       => 'email2',
				'length' 	 => 40,
				'required' 	 => false,
				'label' 	 => 'Delivery Email'
			),
			array(
				'name'       => 'telephone2',
				'length' 	 => 12,
				'required'	 => false,
				'label' 	 => 'Delivery Telephone'
			),
			array(
				'name'       => 'deliverymethodid',
				'type'       => 'DATACOMBO',
				'length' 	 => 10,
				'label' 	 => 'Delivery Method',
				'table'		 => 'deliverymethod',
				'required'	 => false,
				'table_id'	 => 'id',
				'alias'		 => 'deliverymethodname',
				'table_name' => 'name'
			)
		);

	$crud->subapplications = array(
			array(
				'title'		  => 'Documents',
				'imageurl'	  => 'images/document.gif',
				'script' 	  => 'editDocuments'
			)
		);
		
	$crud->run();
?>
