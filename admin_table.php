
<html>
  <head>
    <title> user </title>
    <meta charset="UTF-8">
  </head>
<body bgcolor="aabbcc">

  <h1>가입자 관리</h1>



<?php
	include "dbconnect.php";
// Create connection
    $db = new mysqli($host, $dbid, $dbpw, $dbname);
// Check connection
  if ($db->connect_error)
  {
    die("Connection failed: " . $db->connect_error);
  }
?>

  <div>
   <button onclick="location.href='logout.php'">home</button>
      <button onclick="location.href='registrater.php'">회원가입</button>
      <button onclick="location.href='http://127.0.0.1/phpmyadmin'">phpMyAdmin</button>
      <br><br/>
  </div>

  <table border="1">
    <tr>
    <th> id </th>
    <th> phone </th>
    <th> name </th>
    <th> ADDRESS </th>
    <th> information </th>
    <th> date </th>
    <th> status(1:유지/0:해지)</th>
    <th> pw </th>
<!--    <th> 회원정보 수정/삭제 </th> -->
</tr>

  <?php
    $sql = "SELECT * FROM user_tbl";
    $result = $db->query($sql);

    if ($result->num_rows > 0)
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
  ?>

    <tr>
    <td><?php echo $row["id"];?></td>
    <td><?php echo $row["phone"];?></td>
    <td><?php echo $row["name"];?></td>
    <td><?php echo $row["address"];?></td>
    <td><?php echo $row["information"];?></td>
    <td><?php echo $row["created_at"];?>
    <td><?php echo $row["member_status"];?></td>
    <td><?php echo $row["password"];?></td>
<!--  <td>
      <button onclick="location.href='registrater_site.php'">상세</button>
    	<button onclick="location.href='registrater.php'">수정</button>
    	<button onclick="location.href='delete.php'">삭제</button></td>
-->
    </tr>

  <?php
        }

    }
    else {
        echo "0 results";
    }

    $db->close();
  ?>
  </table>

</html>
