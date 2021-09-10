<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an online store where you can find all your football needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SLFootball | Football Kits</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"

    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

  </head>

  <body>

      <div class="navbar">
          <div class="logo">
             <a href="index.html"><img src="images/logo2.png" width="100px">
             </a>
          </div>
          <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Account</a></li>
          </ul>

        </nav>

      </div>

      <div class="banner">

        <!--

        <h1>SLFootball</h1>

        -->

      </div>

      <div class="kit-area">

              <section id="products" class="products py-5">
                <div class="container">
                  <div class="row">
                    <div class="col-10 mx-auto col-sm-6 text-center">
                      <h1 class="text-capitalize product-title">Football Equipment</h1>
                    </div>
                  </div>

                  <div class="row product-items" id="product-items">

                    <?php
                    function db_result_to_array($result)
                    {
                      $res_array=array();
                      for ($count=0; $row=@mysql_fetch_array($result); $count++)
                        $res_array[$count]=$row;
                      return $res_array;
                    }

                    function display_equipment($equipment_array)
                    {
                      foreach ($equipment_array as $row) {
                        $url="kit.php?kitid=".($row["id"]);
                        print "<div class=\"col-10 col-sm-8 col-lg-4 mx-auto my-3\">\n";
                        print "<div class=\"card single-item\">\n";
                        print "<div class=\"img-container\">\n";
                        print "<a  href=".$url.">\n";
                        print "<img src=\"images/equipment/".$row["id"]."_2.jpg\" class=\"card-img-top product-img\"></a>\n";
                        print "</div>\n";
                        print "<div class=\"card-body\">\n";
                        print "<div class=\"card-text d-flex justify-content-between text-capitalize\">\n";
                        print "<h5 id=\"item-name\">".$row["name"]."</h5>\n";
                        print "<span>R".$row["price"]."</span>\n";
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
                      $result = mysql_query( "SELECT id, name, price FROM equipment_catalogue order by id" );
                      $num_rows = mysql_num_rows( $result );
                      if ($num_rows == 0)
                        print "Sorry there is no equipment in the equipment catalogue";
                      else
                      {
                        $result=db_result_to_array($result);
                        display_equipment($result);
                      }
                      mysql_close( $link );

                    ?>

                  </div>

                </div>

              </section>

      </div>

  </body>

</html>
