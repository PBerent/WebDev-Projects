<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bookmark</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Add a Bookmark</h2>
        <form action="add" method=POST>
            <label>
                Name: <input type="text" name="name">
            </label>
            <label>
                URL: <input type="text" name="url">
            </label>
            <label>
                Folder: 
                <select name="folder">
                    <option value="Favorites">Favorites</option>
                    <option value="To read">To read</option>
                    <option value="Others">Others</option>
                </select>
            </label>
            <input type="submit" value="Add">
        </form>

        <h1>Bookmarks</h1>
        <table>
            <thead>
                <tr>
                    <th>Folder</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php
        $results = $this->bookmark->get_all_bookmarks();
        foreach($results as $result){
?>
                <tr>
                    <td><?=$result['folder']?></td>
                    <td><?=$result['name']?></td>
                    <td><?=$result['url']?></td>
                    <td>
                        <form action="bookmarks/destroy/<?=$result['id']?>" method=POST>
                            <input type="hidden" name="id" value=<?=$result['id']?>>
                            <input type="hidden" name="folder" value=<?=$result['folder']?>>
                            <input type="hidden" name="name" value=<?=$result['name']?>>
                            <input type="hidden" name="url" value=<?=$result['url']?>>
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                <tr>
<?php
            }
?>
            </table>
        <p>Total: $<?=$total?></p>
    </body>
</html>
