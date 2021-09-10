<?php session_start();
   if(!isset($_SESSION['manager'])){
       header("Location: admin_login.php");
       exit();
   }
   $admin_id = preg_replace('#[^0-9]#i', '', $_SESSION["id"]);
   $admin_name = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
   $password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 

    //database connection
    
  $user = "SLFootball";
  $pass = "zinqa-zn";
  $db = "SLFootball";
  $link = mysql_connect( "mars", $user, $pass );

  if ( ! $link )
     die( "Couldn't connect to MySQL" );
  mysql_select_db( $db, $link )
     or die ( "Couldn't open $db: ".mysql_error() );

  /*$sql = mysql_query("SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_name='$admin_name' AND password='$password' LIMIT 1");
 $existCount = mysql_num_rows($sql);//extra security 
  if ($existCount == 0) { 
	 echo "Your login session data is not on record in the database.";
     exit();
}*/
    
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['name'])) {
	
	$pid = mysql_real_escape_string($_POST['thisID']);
    $product_name = mysql_real_escape_string($_POST['name']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$description = mysql_real_escape_string($_POST['description']);
	$qty = mysql_real_escape_string($_POST['qty']);
    $brand = mysql_real_escape_string($_POST['brand']);
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("UPDATE catalogue SET name='$product_name', price='$price',category='$category', description='$description', qty='$qty' WHERE id='$pid'");
	
	header("location: inventoryManager.php"); 
    exit();
}
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM catalogue WHERE id='$targetID' LIMIT 1");
    $productCount =mysql_query("SELECT COUNT (*) FROM catalogue WHERE id='$targetID' LIMIT 1"); // count the output amount
    if ($productCount > "0") {
	    while($row = mysql_fetch_array($sql)){ 
             
			 $product_name = $row["name"];
			 $price = $row["price"];
			 $category = $row["category"];
			 $description = $row["description"];
			 $qty = $row["qty"];
			 $brand = $row["brand"];
        }
    } else {
	    echo "Sorry this file does not exist.";
		exit();
    }
}
?>
<?php 
// This block grabs the whole list for viewing
function db_result_to_array($result)
{
  $res_array=array();
  for ($count=0; $row=@mysql_fetch_array($result); $count++)
    $res_array[$count]=$row;
  return $res_array;	
}
$query = "SELECT id,name,price,qty FROM catalogue";
$result = mysql_query($query);
$res_array = db_result_to_array($result);
$product_list = "";


if (sizeof($res_array) > 0) {
	
    foreach($res_array as $namer){
        $product_list = $product_list . $namer["id"].".". "\t". $namer["name"]."\t"."______PRICE:". $namer["price"]."\t"."______QTY:"."\t".$namer["qty"]. "<br>"."<br>";
    }
    unset($namer); 
    
     
}

 else{
     $product_list = "oops, the database is empty";
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLF Inventory Edit</title>
    <link rel="stylesheet" href="stylea.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
>
<body>
<div align="center" id="mainWrapper">
    <div class="header">
    
    <div class="container">
         <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo.jpg" width="400px"></a>
        </div>
             <nav>
            
             
            <div class = "menu" id = "MenuItems">
              <ul >   
                <li><a href="index.php">Home</a></li>
                <li><a href="fanZone.html">Customer Service</a></li>
                <li><a href="inventoryList.php">Reports</a></li>
              </ul>
            </div> 
            </nav>
         </div>
       </div>
     </div>
  
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="inventoryManager.php#inventoryForm">+ Update Inventory Item</a></div>
<div align="left" style="margin-left:24px;">
      <h2>Inventory List</h2>
      <?php echo $product_list; ?>
    </div>
    <hr />
    <a name="inventoryForm" id="inventoryForm"></a>
    <h3>
    &darr; Update Inventory Item  &darr;
    </h3>
    <form action="inventoryManager.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Product Name</td>
        <td width="80%"><label>
          <input name="name" type="text" id="name" size="64" />
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Price</td>
        <td><label>
          R
          <input name="price" type="text" id="price" size="12" />
        </label></td>
      </tr>
      
      <tr>
        <td align="right">Category</td>
        <td><select name="category" id="category">
        <option value=""></option>
          <option value="kits">Kits</option>
          <option value="equipment">Equipment</option>
          </select></td>
      </tr>
      <tr>
        <td align="right">Product Description</td>
        <td><label>
          <textarea name="description" id="description" cols="64" rows="5"></textarea>
        </label></td>
      </tr>
        <tr>
        <td width="20%" align="right">Quantity</td>
        <td width="80%"><label>
          <input name="qty" type="text" id="qty" size="6" />
        </label></td>
      </tr>
        <tr>
        <td width="20%" align="right">Brand</td>
        <td width="80%"><label>
          <input name="brand" type="text" id="brand" size="64" />
        </label></td>
      </tr>
           
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" />
        </label></td>
      </tr>
    </table>
    </form>
    <br />
  <br />
  </div>
</div>
</body>
</html>  