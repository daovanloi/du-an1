<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>
<?php

if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}
    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>
<div>
    
    <?php
        $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
    ?>
        <?php echo $fetch['title']?>
        <p><?php echo substr($fetch['content'], 0, 100)?>...</p>
    <?php
        }
    ?>
</div>
<?php
    }
?>