<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is an online store where you can find all your football needs.">
    <title>SLFootball | Homepage</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="style.css">

    <style>
    .btn-info {
      color: #fff;
      background-color: #000;
      border-color: #46b8da;
    }

    .content-area{
      width: 100%;
      position: relative;
      top: 480px;
      background: #ddd;
      height: fit-content;
      display: inherit;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .categoty-area{
      width: 100%;
      position: relative;
      top: 480px;
      background: #ddd;
      height: fit-content;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
    }

    .column{
      width: = 50%;
      align-content: center;
      text-align: center;
    }

    .column img{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 80%;
    }

    .top-buffer {
      margin-top: -20px;
    }

    nav ul li{
      display: inline-block;
      margin-top: 40px;
      margin-right: 50px;
    }

    .small-container{
        max-width: 1080px;
        margin:auto;
        padding-left: 20px;
        padding-right: 20px;
    }
    .row{
        width: 80%
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .col4{
        flex-basis: 25%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        transition: transform 0.5s;
    }
    .col4 img{
        width: 50%;
    }

    .col4 p{
        font-size: 14px;
    }
    .col4:hover{
        transform: translateY(-5px);
    }
    #pageFooter {
	border:#999 1px solid;
	background-color:#F4F4F4;
	width:900px;
	
}

    </style>
</head>
<body>

    <div class="navbar top-buffer">
        <div class="logo">
          <a href="index.php"><img src="images/logo.jpg" width="400px" ></a>
        </div>
        <nav>
          <div class = "menu" id = "MenuItems">
            <ul>
              <li><a href="index.php" style="text-decoration: none;color:black;">Home</a></li>
              <li><a href="catelogue.php?category=Football%20Kits" style="text-decoration: none;color:black;">Football Kits</a></li>
              <li><a href="catelogue.php?category=Equipment" style="text-decoration: none;color:black;">Equipment</a></li>
              <li><a href="fanZone.html" style="text-decoration: none;color:black;">Fan Zone</a></li>
              <li><a href="account.html" style="text-decoration: none;color:black;">Account</a></li>
              <li> <a href="shoppingCart.php" style="text-decoration: none;color:black;"><img src="images/Shopping-Cart-icon.png" width="30px" height="30px"></a></li>

                </ul>
            </div>
        </nav>
        </div>

        <div class="banner"> </div>

    <div class="content-area">

      <h1 class= "text-capitalize" style="font-size:50px"> SLFootball</h1>
      <h2>A few clicks is all it takes to find all your football needs</h2>
      <hr>
      <br>
      <br>

    </div>


    <div class="categoty-area">
        <div class="column">
          <h1><hr>Football Kits</h1>
          <p>Represent your team in the with our range of official football kits.
          <br><b>Pick any size, colour and quantity. Delivery is Free! While Stock lasts. </b></p>
          <a href="catelogue.php?category=Football%20Kits" class="btn btn-dark btn-lg btn-block">Explore now</a>
          <h1><hr></h1>

        </div>
        <div class="column">
            <img src="images/kitDisplay.jpg" width="500px">
        </div>

        </div>

        <div class="content-area">
              <h1><br><hr>Featured Football Kits</h1>
              <div class="row">

                <?php


                function db_result_to_array($result)
                {
                  $res_array=array();
                  for ($count=0; $row=@mysql_fetch_array($result); $count++)
                    $res_array[$count]=$row;
                  return $res_array;
                }

                function display_item($item_array)
                {
                  foreach ($item_array as $row) {
                    $url="item.php?item_id=".$row["id"];
                    print "<div class=\"col4\">\n";
                    print "<a  href=".$url." style=\"text-decoration: none;color:black;\">\n";
                    print "<img src=\"images/catelogue/".$row["id"]."_1.jpg\" >\n";
                    print "<h4 id=\"item-name\">".$row["name"]."</h4>\n";
                    print "<div class=\"rating\">\n";
                    print "<i class=\"fa fa-star\"></i>\n";
                    print "<i class=\"fa fa-star\"></i>\n";
                    print "<i class=\"fa fa-star\"></i>\n";
                    print "<i class=\"fa fa-star\"></i>\n";
                    print "<i class=\"fa fa-star\"></i>\n";
                    print "</div>\n";
                    print "<p style=\"font-weight:bold;font-size:20px;\" >R".$row["price"]."</p></a>\n";
                    print "</div>\n";

                  }
                }

                              $user = "SLFootball";
                              $pass = "zinqa-zn";
                              $db = "SLFootball";
                              $link = mysql_connect( "mars", $user, $pass );

                              if ( ! $link )
                                  die( "Couldn't connect to MySQL" );
                              mysql_select_db( $db, $link )
                                  or die ( "Couldn't open $db: ".mysql_error() );

                              $category = "Football Kits";

                              $query = "SELECT id, name, price FROM catalogue where category='".$category."' order by RAND() limit 4";

                              $result = mysql_query($query);
                              $num_rows = mysql_num_rows( $result ) or die('Error 2, query failed');

                              if ($num_rows == 0)
                                print "Sorry there are no items in the catalogue";
                              else
                              {
                                $result=db_result_to_array($result);
                                display_item($result);
                              }

                              print "</div>\n";





                  print "</div>\n";
                  print "</div>\n";




                  print "<div class=\"categoty-area\">";
                  print "<div class=\"column\">";
                  print "<img src=\"images/equipmentDisplay.jpg\" width=\"500px\">";
                  print "</div>\n";

                  print "<div class=\"column\">";

                  print "<h1><hr>Football Equipment</h1>";
                  print "<p>Improve your football skills and impress your friends with our range of football equipment
                  <br><b>Delivery is Free! While Stock lasts. </b></p>";

                  print "<a href=\"catelogue.php?category=Equipment\" class=\"btn btn-dark btn-lg btn-block\">Explore now</a>";
                  print "<h1><hr></h1>";
                  print "</div>\n";
                  print "</div>\n";

                  print "<div class=\"content-area\">";
                  print "<h1><br><hr>Featured Equipment</h1>";
                  print "<div class=\"row\">";

                  $category = "Equipment";

                  $query = "SELECT id, name, price FROM catalogue where category='".$category."' order by RAND() limit 4";

                  $result = mysql_query($query);
                  $num_rows = mysql_num_rows( $result ) or die('Error 2, query failed');

                  if ($num_rows == 0)
                    print "Sorry there are no items in the catalogue";
                  else
                  {
                    $result=db_result_to_array($result);
                    display_item($result);
                  }
                  print "</div>\n";
                  


      print "</div>\n";
      print "</div>\n";
      





                  mysql_close( $link );
                  ?>


                  </body>
                  </html>
