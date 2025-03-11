<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<form, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form method="post" action="">
    <fieldset>
        <legend>Add new book</legend>
        <table>
            <tr>
                <td>Book Number:</td>
                <td><input type="number" maxlength="4" name="book_index"/></td>
                <td><input type="submit" value="submit" name="sub"/></td>
                <a href="management.php">Back to List</a>
            </tr>
            
              
    </fieldset>
    </form>
</body>
</html>

<?php
     if(isset($_POST['sub'])){
        include "connection.php";
        if(!isset($con)||!$con){
            die("Database connection not established! Check connection.php.");

        }
        $book_index = mysqli_real_escape_string($con, $_POST['book_index']);
        include "connection.php";
        $sql_select="SELECT * FROM book WHERE `book_index`='$book_index'";
        $result=mysqli_query($con,$sql_select);
        if(mysqli_num_rows($result)>0){
            echo "The book data is available in the database";
        }
        else{
            echo "The book data is not available in the database";
        }

     }
?>