<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an online store where you can find all your football needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SLFootball | Catelogue</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="style.css">

    <style>

    .top-buffer {
      margin-top: -20px;
    }

    a{
      text-decoration: none;
      color:  black;
    }

    .card-img-top {
      width: 100%;
      height: 30vw;
      object-fit: cover;
    }

    .content-area{
      width: 100%;
      position: relative;
      top: 100px;
      background: #ddd;
      height: fit-content;

      display: flex;
    	flex-wrap: wrap;
    	justify-content: center;
    	align-items: center;
      text-align: center;
    }

    .card:hover{
    box-shadow: 4px 4px 4px 4px black;
    transform: scale(1.05);

    }




</style>

  </head>

  <body>

    <div class="navbar top-buffer">
        <div class="logo">
          <a href="index.php"><img src="images/logo.jpg" width="400px" >
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


      <div class="content-area">

        <?php

        print "<section id=\"products\" class=\"products py-5\">\n";
        print "<div class=\"container\">\n";
        print "<div class=\"row\">";
        print "<div class=\"col-10 mx-auto col-sm-6 text-center\">";
        print "<h1 class=\"text-capitalize product-title\">".$HTTP_GET_VARS["category"]." <hr></h1>";
        print "</div>\n";
        print "</div>\n";
        print "<div class=\"row product-items\" id=\"product-items\">\n";

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
            print "<div class=\"col-10 col-sm-8 col-lg-4 mx-auto my-3\">\n";
            print "<div class=\"card single-item\">\n";
            print "<div class=\"img-container\">\n";
            print "<a  href=".$url." style=\"text-decoration: none;color:black;\">\n";
            print "<img src=\"images/catelogue/".$row["id"]."_1.jpg\" class=\"card-img-top product-img\">\n";
            print "</div>\n";
            print "<div class=\"card-body\">\n";
            print "<div class=\"card-text d-flex justify-content-between text-capitalize\">\n";
            print "<div class=\"rating\">\n";
            print "<i class=\"fa fa-star\"></i>\n";
            print "<i class=\"fa fa-star\"></i>\n";
            print "<i class=\"fa fa-star\"></i>\n";
            print "<i class=\"fa fa-star\"></i>\n";
            print "<i class=\"fa fa-star\"></i>\n";
            print "</div>\n";
            print "<h5 id=\"item-name\">".$row["name"]."</h5>\n";
            print "<span style=\"font-weight:bold;font-size:50px;\" >R".$row["price"]."</span></a>\n";
            print "</div>\n";
            print "</div>\n";
            print "</div>\n";
            print "</div>\n";
          }
        }


                      //get categories out of database
                      $user = "SLFootball";
                      $pass = "zinqa-zn";
                      $db = "SLFootball";
                      $link = mysql_connect( "mars", $user, $pass );

                      if ( ! $link )
                          die( "Couldn't connect to MySQL" );
                      mysql_select_db( $db, $link )
                          or die ( "Couldn't open $db: ".mysql_error() );

                      $rowsPerPage = 6;

                      $pageNum = 1;

                      if (isset($_GET['page'])) {
                        $pageNum = $_GET['page'];
                      }

                      $offset = ($pageNum - 1) * $rowsPerPage;

                      $result = mysql_query( "SELECT id, name, price FROM catalogue where category='".$HTTP_GET_VARS["category"]."' order by id limit ".$offset.",".$rowsPerPage);
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

                      print "</section>\n";

                      print "</div>\n";

                      print "<div class=\"content-area\" style=\"text-align:center\">";






                      $query = "SELECT COUNT(id) AS numrows FROM catalogue where category='".$HTTP_GET_VARS["category"]."'";

                      $result = mysql_query($query) or die('Error 1, query failed');
                      $row = mysql_fetch_array($result);
                      $numrows = $row['numrows'];

                      $maxPage = ceil($numrows/$rowsPerPage);

                      $self = $_SERVER['PHP_SELF'];

                      $nav = '';
                      for($page = 1; $page <= $maxPage; $page++){
                        if ($page == $pageNum){
                          $nav .= "&nbsp;<b>".$page."</b>&nbsp;";
                        }
                        else{
                          $nav .= "&nbsp; <a href=\"$self?category=".$HTTP_GET_VARS["category"]."&page=$page\" style=\"text-decoration: none;color:black;\">$page </a> &nbsp;";
                        }
                      }

                      echo "<br><br>";

                      if ($pageNum > 1){
                        $page = $pageNum - 1;
                        $prev = "&nbsp; <a href=\"$self?category=".$HTTP_GET_VARS["category"]."&page=$page\" style=\"text-decoration: none;color:black;\">Prev</a> &nbsp;";
                        $first = "&nbsp; <a href=\"$self?category=".$HTTP_GET_VARS["category"]."&page=1\" style=\"text-decoration: none;color:black;\">First Page</a> &nbsp;";
                        }
                      else{
                        $prev = '&nbsp;';
                        $first = '&nbsp;';
                        }
                      if ($pageNum < $maxPage){
                        $page = $pageNum + 1;
                        $next = "&nbsp; <a href=\"$self?category=".$HTTP_GET_VARS["category"]."&page=$page\" style=\"text-decoration: none;color:black;\">Next</a> &nbsp;";
                        $last = "&nbsp; <a href=\"$self?category=".$HTTP_GET_VARS["category"]."&page=$maxPage\" style=\"text-decoration: none;color:black;\">Last Page</a> &nbsp;";
                      }
                      else{
                        $next = '&nbsp;';
                        $last = '&nbsp;';
                        }

                      echo "<p style=\"font-size: 25px\">".$first."&nbsp;".$prev."&nbsp;".$nav."&nbsp;".$next."&nbsp;".$last."</p>";
                      mysql_close( $link );

                    ?>

                </div>

  </body>

</html>
