<?php
$book_index = $book_title = $version = $author = $availability = $book_type = ""; // Initialize variables with default values
if (isset($_GET['book_index_edit'])) {
    $book_index = $_GET['book_index_edit'];
    echo $book_index;
    include "connection.php";
    $sql_select = "SELECT * FROM book WHERE `book_index`='$book_index'";
    $result = mysqli_query($con, $sql_select);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $book_index = $row['book_index'];
            $book_title = $row['book_title'];
            $version = $row['version'];
            $author = $row['author'];
            $availability = $row['availability'];
            $book_type = $row['book_type'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new book</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="form-container" >
        <h1>Book data</h1>
        <p>Enter the book data in the form below:</p>
           
        <form method="post" action="">
            <fieldset>
                <legend>Book Data</legend>
                <table>
                    <tr>
                        <td>Book Number:</td>
                        <td><input type="number" maxlength="4" name="book-index" value="<?php echo $book_index; ?>"/></td>
                    </tr> 
                    <tr>
                        <td>Book Title:</td>
                        <td><input type="text" size="30" name="book-title" value="<?php echo $book_title; ?>"/></td>
                    </tr> 
                    <tr>
                        <td>Version:</td>
                        <td><input type="number" name="version" value="<?php echo $version; ?>"/></td>
                    </tr>
                    <tr>
                        <td>Author:</td>
                        <td><input type="text" size="30" name="author" value="<?php echo $author; ?>"/></td>
                    </tr>  
                    <tr>
                        <td>Availability:</td>
                        <td><input type="checkbox" value="Lending"
                        <?php
                            if (strpos($availability, "Lending") !== false) {
                                echo "checked";
                            }
                        ?>
                        name="availability[]"/>Lending</td>
                        <td><input type="checkbox" value="Reference"  
                        <?php
                            if (strpos($availability, "Reference") !== false) {
                                echo "checked";
                            }
                        ?>
                        name="availability[]"/>Referencing</td>
                    </tr> 
                    <tr>
                        <td>Book Type:</td>
                        <td><input type="radio" value="ICT" 
                        <?php
                           if ($book_type == 'ICT') {
                              echo "checked";
                           }
                        ?>
                        name="book-type"/>ICT</td>
                        <td><input type="radio" value="None ICT" 
                        <?php
                           if ($book_type == 'None ICT') {
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
    </div>
</body>
</html>

<?php
if (isset($_POST['sub'])) {
    include "connection.php";
    if (!isset($con) || !$con) {
        die("Database connection not established! Check connection.php.");
    }
    $book_index = mysqli_real_escape_string($con, $_POST['book-index']);
    $book_title = mysqli_real_escape_string($con, $_POST['book-title']);
    $version = mysqli_real_escape_string($con, $_POST['version']);
    $author = mysqli_real_escape_string($con, $_POST['author']);
    $book_type = mysqli_real_escape_string($con, $_POST['book-type']);

    if (isset($_POST['availability'])) {
        $availability = implode(", ", $_POST['availability']); // Convert array to a string
    } else {
        $availability = "None"; // Default value if no checkbox is selected
    }

    $sql_update = "UPDATE book SET 
        book_title='$book_title', version='$version', author='$author', availability='$availability', book_type='$book_type'
        WHERE book_index='$book_index'";
    if ($result = mysqli_query($con, $sql_update)) {
        echo "Data successfully updated";
    } else {
        echo "Sorry. Data not updated: " . mysqli_error($con);
    }
}
?>
