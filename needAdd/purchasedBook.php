<html>
<head>
    <title>
        Book Shop
    </title>
    <link rel="stylesheet" type="text/css" href="layout.css">

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: zhfst
 * Date: 2018/7/7
 * Time: 11:38
 */

$customerName = "fan";
$db = new mysqli('localhost','fan','@asd5211314','bookshop');
if (mysqli_connect_errno()){
    echo '<p>Error: Counld not connect to database.<br/>
    Please try again.</p>';
    exit;
}

$query = "SELECT * FROM purchasedBook where customerName = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s",$customerName);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($buyerName,$bookId);

echo "<div id='purchasedBook'>";
echo "<table>";
while ($stmt->fetch()){
    $query1 = "select * from book where id = ?";
    $stmt1 = $db->prepare($query1);
    $stmt1->bind_param("i",$bookId);
    $stmt1->execute();
    $stmt1->bind_result($id,$name,$description,$imgUrl);
    $stmt1->fetch();
    echo "<tr>";
    echo "<td rowspan='2'>";
    echo "<img src = 'images/".$imgUrl.".png' align = 'middle'>";
    echo "</td><td width='80%'>";
    echo "<strong>Book Name</strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$name;
    echo "</td>";
    echo "<td rowspan='2'>";
    echo "<input type='button' value='comment'></td>";
    echo "</tr>";
    echo "<tr><td>";
    echo "<strong>Description</strong><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$description;
    echo "</tr></td>";
}
echo "</table>";

echo "</div>"
?>

</body>
</html>
