<html>
<head>
    <title>Book Shop</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: zhfst
 * Date: 2018/7/7
 * Time: 11:04
 */
$db = new mysqli('localhost','fan','@asd5211314','bookshop');
if (mysqli_connect_errno()){
    echo '<p>Error: Counld not connect to database.<br/>
    Please try again.</p>';
    exit;
}
$query = "SELECT * FROM book";
$stmt = $db->prepare($query);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$name,$description,$imgUrl);

while ($stmt->fetch()){
    echo "<div id='comment'>";
    echo "<table width='100%'><tr><td align='center'>";
    echo "<img src = 'images/".$imgUrl.".png'>";
    echo "</td></tr></table>";
    echo "<p><strong>Book Name: ".$name."</strong></p>";
    $description = $description.substr(0,60);
    echo "<p><strong>Description: ".$description."</strong></p>";

    $query1 = "select * from bookcomment where bookId = ?";
    $stmt1 = $db->prepare($query1);
    $stmt1->bind_param("i",$id);
    $stmt1->execute();
    $stmt1->bind_result($bookId,$customerName,$customerComment);
    echo "<p><strong>Comment </strong><br />";
    while ($stmt1->fetch()){
        echo "<hr />";
        echo "<strong>".$customerName."</strong><br/>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$customerComment."<br />";
    }
    echo "</div>";
}


$stmt1->free_result();
$stmt->free_result();
$db->close();

?>
<!--<img src="images/1503504179.png" style="margin: 0 auto;>-->
</body>
</html>
