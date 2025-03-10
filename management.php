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
            <legend>Serch book</legend>
            <table>
                <tr>
                    <td><input type="text" size="30" name="keyword" /></td>
                    <td><select name="search_type">
                        <option value="book_title">Book Title</option>
                        <option value="book_author">Author</option>
                        <option value="book_publisher">Availability</option>
                    </select></td>
                    <td><input type="submit" value="Search" name="search" /></td>
                </tr>
            </table>
        </fieldset>
</body>
</html>