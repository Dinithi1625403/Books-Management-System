<?php
if(isset($_GET['book_index_edit'])){
    $book_index=$_GET['book_index_edit'];
    echo $book_index;
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new book</title>
</head>
<body>
    <form method="post"action="">
        <fieldset>
            <legend>Book Data</legend>
            <table>
                <tr>
                    <td>BooK Number:</td>
                    <td><input type="number" maxlength="4" name="book-index"/></td>
                </tr> 
                <tr>
                    <td>BooK Title:</td>
                    <td><input type="text"size="30"  name="book-title"/></td>
                </tr> 
                <tr>
                    <td>Version:</td>
                    <td><input type="number"  name="version"/></td>
                </tr>
                <tr>
                    <td>Author:</td>
                    <td><input type="text" size="30" name="author"/></td>
                </tr>  
                <tr>
                    <td>Availability:</td>
                    <td><input type="checkbox" value="Lending" checked name="availability[]"/>Lending</td>
                    <td><input type="checkbox" value="Reference"  name="availability[]"/>Rferencing</td>
                </tr> 
                <tr>
                    <td>Book Type:</td>
                    <td><input type="radio" value="ICT" checked name="book-type"/>ICT</td>
                    <td><input type="radio" value="None ICT"  name="book-type"/>None ICT</td>
                </tr> 
                <tr>
                    <td colspan="2"><input type="submit" value="submit" name="sub"/></td>
                </tr>  
            </table>
        </fieldset>

    </form>
</body>
</html>

<?php
    if(isset($_POST['sub'])){
        include "connection.php";
        if (!isset($con) || !$con) {
            die("Database connection not established! Check connection.php.");
        }
        $book_index = mysqli_real_escape_string($con, $_POST['book-index']);
        $book_title = mysqli_real_escape_string($con, $_POST['book-title']);
        $version = mysqli_real_escape_string($con, $_POST['version']);
        $author = mysqli_real_escape_string($con, $_POST['author']);
        $book_type = mysqli_real_escape_string($con, $_POST['book-type']);
    
        echo $book_index;
        echo $book_title;
        echo $version;
        echo $author;
        if (isset($_POST['availability'])) {
            $availability = implode(", ", $_POST['availability']); // Convert array to a string
        } else {
            $availability = "None"; // Default value if no checkbox is selected
        }
        echo $availability;
        echo $book_type; 
        
        
        $sql_insert="INSERT INTO book  (`book_index`,`book_title`,`version`,`author`,`availability`,`book_type`)
                     VALUES('$book_index','$book_title','$version','$author','$availability','$book_type')";
        if($result=mysqli_query($con,$sql_insert)){
            echo "Data successfully submited";
        }
        else{
            echo "Sorry. Data not submitted: " . mysqli_error($con);
          
        }
    } 

?>