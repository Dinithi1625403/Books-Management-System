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
        if($keyword=="")
            $sql_select="SELECT * FROM book";
        else{
            $sql_select="SELECT*FROM book WHERE $search_type LIKE '%$keyword%' ";
            $result=mysqli_query($con,$sql_select);
        }
            
        
        ?>
        
        <table border="1">
            <caption>Book Details</caption>
        <tr><th>Book Number</th><th>Title</th><th>Author</th></tr>
        <?php
        if (isset($result) && $result) {
            while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['book_index']."</td><td>".$row['book_title']."</td><td>".$row['author']."</td>";
            ?>
            <td><a href="management.php?book_index_edit=<?php echo $row['book_index'];?>" >Edit</a></td>
            <td><a href="management.php?book_index_delete=<?php echo $row['book_index'];?>" onclick="return confirm('Are you sure?');">Delete</a></td></tr>
            <?php
            }
        } else {
            $sql_select = "SELECT * FROM book";
            $result = mysqli_query($con, $sql_select);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row['book_index']."</td><td>".$row['book_title']."</td><td>".$row['author']."</td>";
                    ?>
                    <td><a href="management.php?book_index_edit=<?php echo $row['book_index'];?>" >Edit</a></td>
                    <td><a href="management.php?book_index_delete=<?php echo $row['book_index'];?>" onclick="return confirm('Are you sure?');">Delete</a></td></tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No books found</td></tr>";
            }
        }
        ?>
        </table>
        <?php
    }
    elseif(isset($_GET['book_index_delete']) && isset($_GET['book_index_delete']))
    {
        $book_index=$_GET['book_index_delete'];
        //echo $book_index;
        include "connection.php";
        $sql_delete="DELETE FROM book WHERE book_index='$book_index'";
        $result=mysqli_query($con,$sql_delete);
        if($result){
            echo "The book data deleted...";
        
        }
        else{
            echo "Data is not deleted...".mysqli_error($con);
        }
    }
    elseif((isset($_POST['book_index_edit'])==true) && (isset($_GET['book_index_edit'])<>null))
    {   
        $book_index=$_GET['book_index_edit'];
        echo "you can edit";}
    
?>