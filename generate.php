<?php
require_once 'connection.php';
 session_start();

 if(isset($_SESSION["uid"]))

{ $id=$_SESSION["uid"];
  $file=$_GET["f"];
  $sql = "SELECT * FROM `visitor` where file='$file'";
  $run_query=mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0 )
{
  while($row = mysqli_fetch_array($run_query)){
       $name=$row["name"];
       $num=$row["number"];
       $city=$row["city"];
       $address=$row["address"];
       $dd=$row["date"];
       $gid=$row["gid"];
       $purpose=$row["purpose"];
       $gate=$row["gate"];
       $fname=$row["fname"];
    }

   }

    $sql = "SELECT * FROM `admin` where id='$gid'";
  $run_query=mysqli_query($con,$sql);

    if(mysqli_num_rows($run_query) > 0 )
    {
        while($row = mysqli_fetch_array($run_query)){
         $first=$row["first"];
         $second=$row["second"];

      }

   }

date_default_timezone_set("Asia/Kolkata");

}
else
header('Location:index.php');

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/gstyle.css">
<link rel="stylesheet" href="font-awesome.min.css">
<script type="text/javascript" src = "./js/jquery.js"></script>

</head>
<body>

<h2 id="hd" style="text-align:center">Visitor Card</h2>

<div class="card" id="crd">

       <img width="60%" height="60%" src="images/gl.png">
       <br><br>

      <?php echo "<img src='photo/$file' style='width:150px;height:150px'/>"; ?>
      <table align=center>
          <tbody style="text-align:left;">
              <tr>
                  <td style="width: 40%;"><b>Student Name </b></td>
                  <td style="width: 80%;align-left: 0px;"><?php echo " : $name"?></td>
              </tr>
              <tr>
                  <td style="width: 40%;"><b>Fathers Name </b></td>
                  <td style="width: 80%;align-left: 0px;"><?php echo " : $fname"?></td>
              </tr>
              <tr>
                  <td style="width: 40%;"><b>Contact </b></td>
                  <td style="width: 80%;"><?php echo " : $num"?></td>
              </tr>
              <tr>
                  <td style="width: 40%;"><b>Address </b></td>
                  <td style="width: 80%;"><?php echo " : $address"?></td>
              </tr>
              <tr>
                  <td style="width: 40%;"><b>Place </b></td>
                  <td style="width: 80%;"><?php echo " : $city"?></td>
              </tr>
              <tr>
                  <td style="width: 40%;"><b>Purpose </b></td>
                  <td style="width: 80%;"><?php echo " : $purpose"?></td>
              </tr>
          </tbody>
      </table>

       <div class="dt">
      <table align=center style="padding-left:0px;">
    <tbody>
    <tr>
    <td style="width: 50%;"><p class="title"><?php echo "Date : " .date("d/m/Y");?></p></td>
    <td style="width: 50%; margin-left:50px;"><p class="title"><?php echo "" .date("h:i A");?></td>
    </tr>
          </tbody>
        </table>
      </div>
      <p style="margin-top:-10px;"><SPAN STYLE="COLOR:Red">NOTE: This pass is valid for 1 Day only!</SPAN></p>
      <div class="details" style= "float:right">

        <p class="title" style="font-size:10px;"><?php echo "Generated by : $first $second";?> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " $gate";?></p>
      </div>


</div>
<div class="last">
    <p><button onclick="print()">Print</button></p>

 <p><a href="register.php"><button>New Visitor</button></a></p>
</div>
</body>
</html>
