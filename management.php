<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Search book</legend>
            <table>
                <tr>
                    <td><input type="text" size="30" name="keyword" /></td>
                    <td><select name="search_type">
                        <option value="book_title">Book Title</option>
                        <option value="author">Author</option>
                        <option value="availability">Availability</option>
                    </select>
                    <input type="submit" value="Search" name="search" />
                    <a href="bookNumber.php">Add New</a>
                    </td>  
                </tr>
            </table>
        </fieldset>
        </form>
</body>
</html>


<?php
    if(isset($_POST['search'])){
        $keyword=$_POST['keyword'];
        $search_type=$_POST['search_type'];

        echo $keyword."".$search_type;
        include "connection.php";
        if($keyword="")
            $sql_select="SELECT * FROM book";
        else{
            $sql_select="SELECT*FROM book WHERE $serch_type LIKE '%$keyword%' ";
            $result=mysqli_query($con,$sql_select);
        }
            
        
        ?>
        
        <table border="1">
            <caption>Book Details</caption>
        <tr><th>Book Number</th><th>Title</th><th>Author</th></tr>
        <?php
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['book_index']."</td><td>".$row['book_title']."</td><td>".$row['author']."</td></tr>";
            echo "Book Number: ".$row['book_index'];
            echo "Book Title:".$row['book_title'];
            echo "Version:".$row['version'];
            echo "Author:".$row['author'];
            echo "<br/>";
        }
        ?>
        </table>
        <?php
    }
?>