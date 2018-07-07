<html>
<head>
    <title>db test</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: zhfst
 * Date: 2018/7/7
 * Time: 9:55
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
echo "<p> book num is : ".$stmt->num_rows."</p>";
while ($stmt->fetch()){
    echo "<img src = 'images/".$imgUrl.".png'>";
    echo "<p><strong>Book Name: ".$name."</strong></p>";
    echo "<p><strong>Description: ".$description."</strong></p>";
    echo "<p><strong>imgUrl: ".$imgUrl."</strong></p>";

    $query1 = "select * from bookcomment where bookId = ?";
    $stmt1 = $db->prepare($query1);
    $stmt1->bind_param("i",$id);
    $stmt1->execute();
    $stmt1->bind_result($bookId,$bookcomment);
    echo "<p><strong>Comment: </strong><br />";
    while ($stmt1->fetch()){
        echo "    ".$bookcomment."<br />";
    }
}
$stmt1->free_result();
$stmt->free_result();
$db->close();
?>
</body>
</html>
