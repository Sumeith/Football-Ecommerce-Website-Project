<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an online store where you can find all your football needs.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SLFootball | Product Details</title>

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

<style>

.top-buffer {
  margin-top: -20px;
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

}
.content-area img{
  overflow: hidden;
}

.column{
	width: 600px;
	padding: 10px;
}

#slider{
	width: 350px;
	display: flex;
	flex-wrap: nowrap;
	overflow-x: auto;
}



#featured{
      max-width: 500px;
      max-height: 600px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid black;

    }

.thumbnail{
  object-fit: cover;
  max-width: 180px;
  max-height: 100px;
  cursor: pointer;
  opacity: 0.5;
  margin: 5px;
  border: 2px solid black;

}



.thumbnail:hover{
  opacity: 1;
}

.active{
  opacity: 1;
}



.slide-wrapper{
  max-width: 500px;
  min-height: 100px;
  display: flex;
  align-items: center;
}

.slider{
  width: 440px;
  display: flex;
  flex-wrap: norow;
  overflow-x: hidden;
  transition: left 2s;
  position: relative;
  -webkit-transition: left 2s;
  -moz-transition: left 2s;
  -o-transition: left 2s;

}

.zoom {
  transition: transform .2s;

  margin: 0 auto;
  object-fit: cover;
  cursor: pointer;
  border: 2px solid black;
}

.zoom:hover {
  transform: scale(1.01);
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

        <?
         //get categories out of database
          $user = "SLFootball";
          $pass = "zinqa-zn";
          $db = "SLFootball";
          $link = mysql_connect( "mars", $user, $pass );

          if ( ! $link )
              die( "Couldn't connect to MySQL" );
          mysql_select_db( $db, $link )
              or die ( "Couldn't open $db: ".mysql_error() );



          $query="SELECT * FROM catalogue where id=".$HTTP_GET_VARS["item_id"];
          $result = mysql_query($query);
          $num_rows = mysql_num_rows( $result );

          if ($num_rows == 0)
            print "Sorry, the item that you have selected cannot be found in our database";
          else
          {
            $row=mysql_fetch_array($result);

            print "<div class=\"column\">\n";
            print "<img id=\"featured\" class=\"zoom\" src=\"images/catelogue/".$row["id"]."_1.jpg\">\n";
            print "<div id=\"slider\">";
            print "<img src=\"images/catelogue/".$row["id"]."_1.jpg\" class=\"thumbnail active\">\n";
            print "<img src=\"images/catelogue/".$row["id"]."_2.jpg\" class=\"thumbnail\">\n";
            //print "<img src=\"images/kits/".$row["id"]."_3.jpg\" class=\"thumbnail\">\n";
            //print "<img src=\"images/kits/".$row["id"]."_4.jpg\" class=\"thumbnail\">\n";

            print "</div>\n";
            print "</div>\n";

            print "<div class=\"column\">\n";
            print "<h1>".$row[name]."</h1>\n";
            print "<hr>\n";
            print "<h3 style=\"font-weight:bold;font-size:50px;\">R".$row[price]."</h3>\n";

            print "<p>".$row[description]."</p>\n";

            print "<form action=\"shoppingCart.php\" method=\"get\">\n";
            if ($HTTP_GET_VARS["item_id"] <= 18) {
              print "<select class=\"\" name=\"size\" required>\n";
              print "<option value=\"\">Select Size</option>\n";
              print "<option value=\"\">XL</option>\n";
              print "<option value=\"\">Large</option>\n";
              print "<option value=\"\">Medium</option>\n";
              print "<option value=\"\">Small</option>\n";
              print "</select>\n";
              print "&nbsp;\n";
            }

              print "<input type=\"number\" name=\"qty\" value=\"1\"min=\"1\" required>\n";
              print "&nbsp;";
              print "<input type=\"submit\" class=\"btn btn-dark\" name=\"\" value=\"Add to Cart\">\n";
              print "<input type=\"hidden\" name=\"name\" value=".urlencode($row["name"]).">\n";
              print "<input type=\"hidden\" name=\"price\" value=".urlencode($row["price"]).">\n";
              print "<input type=\"hidden\" name=\"id\" value=".urlencode($row["id"]).">\n";


            print "</form>\n";
            print "</div>\n";

            print "</div>\n";


          }

          mysql_close( $link );

        ?>



      <script type="text/javascript">

    		let thumbnails = document.getElementsByClassName('thumbnail')

    		let activeImages = document.getElementsByClassName('active')

    		for (var i=0; i < thumbnails.length; i++){

    			thumbnails[i].addEventListener('mouseover', function(){
    				console.log(activeImages)

    				if (activeImages.length > 0){
    					activeImages[0].classList.remove('active')
    				}
    				this.classList.add('active')
    				document.getElementById('featured').src = this.src
    			})
    		}
    	</script>
  </body>

</html>
