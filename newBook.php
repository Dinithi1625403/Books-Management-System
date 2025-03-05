
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
                    <td colspan="2"><input type="submit" value="submit" name="sub"</td>
                </tr>  
            </table>
        </fieldset>

    </form>
</body>
</html>

<?php
    if(isset($_POST['sub'])){
        $book_index=$_POST['book-index'];
        $book_title=$_POST['book-title'];
        $version=$_POST['version'];
        $author=$_POST['author'];
        $availability=$_POST['availability'];
        $book_type=$_POST['book-type'];
        echo $book_index;
        echo $book_title;
        echo $version;
        echo $author;
        foreach ($availability as $available) {
            $all_availability=$all_availability.""<div class="1available"></div>
            echo $all_availability;
            
        }
        echo $book_type;   
    } 

?>