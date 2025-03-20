<?php
if(isset($_GET['book_index_edit'])){
    $book_index=$_GET['book_index_edit'];
    echo $book_index;
    include "connection.php";
    $sql_select="SELECT * FROM book WHERE `book_index`='$book_index'";
    $result=mysqil_query($con,$sql_select);

    if(mysqli_num_rows($result>0)){
        while($row=mysqli_fetch_assoc($result)){
            $book_index=$row['book_index'];
            $book_title=$row['book_title'];
            $version=$row['version'];
            $author=$row['author'];
            $availability=$row['availability'];
            $book_type=$row['book_type'];

    
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
                    <td><input type="number" maxlength="4" name="book-index" value="<?php echo $book_index?>"/></td>
                </tr> 
                <tr>
                    <td>BooK Title:</td>
                    <td><input type="text"size="30"  name="book-title" value="<?php echo $book_title?>"/></td>
                </tr> 
                <tr>
                    <td>Version:</td>
                    <td><input type="number"  name="version"  value="<?php echo $version?>"/></td>
                </tr>
                <tr>
                    <td>Author:</td>
                    <td><input type="text" size="30" name="author"  value="<?php echo $author?>"/></td>
                </tr>  
                <tr>
                    <td>Availability:</td>
                    <td><input type="checkbox" value="Lending"
                    <?php
                        if(strops($availability,"Lending"){
                            echo "checked";
                        })
                    ?>
                    name="availability[]"/>Lending</td>
                    <td><input type="checkbox" value="Reference"  
                    <?php
                        if(strops($availability,"Reference"){
                            echo "checked";
                        })
                        ?>
                    name="availability[]"/>Rferencing</td>
                </tr> 
                <tr>
                    <td>Book Type:</td>
                    <td><input type="radio" value="ICT" 
                    <?php
                       if($book_type='ICT'){
                          echo "checked";
                       }
                    ?>
                    name="book-type"/>ICT</td>
                    <td><input type="radio" value="None ICT" 
                    <?php
                       if($book_type='None ICT'){
                          echo "checked";
                       }
                    ?>
                    name="book-type"/>None ICT</td>
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
        }
    }
?>

<?php
    if(isset($_POST['sub'])){
        include "connection.php";
        if (!isset($con) || !$con) {
            die("Database connection not established! Check connection.php.");
        }
        //$book_index = mysqli_real_escape_string($con, $_POST['book-index']);
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
        
        
        $sql_update="UPDATE SET book 
                    '$book_title','$version','$author','$availability','$book_type'";
        if($result=mysqli_query($con,$sql_insert)){
            echo "Data successfully submited";
        }
        else{
            echo "Sorry. Data not submitted: " . mysqli_error($con);
          
        }
    } 

?>