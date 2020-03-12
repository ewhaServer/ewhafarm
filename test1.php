
<!DOCTYPE html>

<html>
    <head>
	    <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0,user-scalable=no" />
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
      <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>

      <title>ewhaglobal</title>

      <script type="text/javascript" src="./et0808.js"></script>

    </head>
    <body>

		<div data-role="page">

      <div data-role="header"  data-theme= "d">
            <div style="text-align:right">
                <?php include "header.php" ?>
            	<font color="#353131" size="4em">님 안녕하세요</font>
            </div>
          	<div style="text-align:left">
          		<font color="#828282" size="8em">이화팜</font>
              <font color="#999999" size="5em">EWHAFARM</font>
		        </div>
      </div>

			<div data-role="content">
				<div data-role="fieldcontain" id="main">

          <div id="select">
          </div>

  				<div id="idCtrlButton">
  				</div>

        </div>
			</div>

      <div data-role="footer" data-position="fixed" data-position="fixed">
        <div data-role="navbar">
          <ul>
          <li><a href="./control.php" data-icon="arrow-l">이전화면</a></li>
          <li><a href="./user.php" data-icon="home">메인화면</a></li>
          <li><a href="./logout.php" data-icon="delete">로그아웃</a></li>
          </ul>
        </div>
        <div style="text-align:center">
        <font color="#ffffff" size="3em">EHWA Global EWHAFARM Ver 1.0</font>
        </div>
      </div>

		</div>

	<script type="text/javascript">


  <?php


    $site = $_SESSION['site_name'];



  $mysqli = mysqli_connect("localhost","root","ewha0110","ewhaglobal");
  $check2 = "SELECT device_name FROM device_tbl a
         LEFT JOIN site_tbl b
         ON a.site_link=b.id
         WHERE site_name='$site'
        ";

  $data =array();
  $i=0;
  $result2 = mysqli_query($mysqli, $check2);

  $rows = mysqli_num_rows($result2);
  while($row = mysqli_fetch_row($result2)){
    $data[$i]=$row[0];
    $i = $i +1;
  };

  ?>

var dataAll2 = <?php echo json_encode($data) ?>;
var tmpStr2 = "";
   for (var i=0; i< <?php echo $rows; ?>; i++){
        tmpStr2 +=  "<form method=\"GET\" action=\"test6.php\">"
                    +"<input type=\"submit\" name=\"device\"  value=\""+dataAll2[i]+"\"/>"+"<br>"
                    +"</input>"
                    +"</form>"
      };
  $("#select").html(tmpStr2);



	</script>
    </body>

</html>
