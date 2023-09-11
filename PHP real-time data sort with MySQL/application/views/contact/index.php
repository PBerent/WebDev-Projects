<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Phonebook</title>
        <link rel="stylesheet" type="text/css">
        <style>
            th, td{
                border:1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Contacts</h2>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
<?php
        $results = $this->contact->get_all_contacts();
        foreach($results as $result){
?>
                <tr>
                    <td><?=$result['name']?></td>
                    <td><?=$result['contact']?></td>
                    <td>
                        <a href="contacts/show/<?=$result['id']?>">Show</a>
                        <a href="contacts/edit/<?=$result['id']?>">Edit</a>
                        <form action="contacts/destroy/<?=$result['id']?>" method=POST>
                            <input type="hidden" name="id" value=<?=$result['id']?>>
                            <input type="hidden" name="name" value=<?=$result['name']?>>
                            <input type="hidden" name="contact" value=<?=$result['contact']?>>
                            <input type="submit" value="Remove">
                        </form>
                    </td>
                <tr>
<?php
            }
?>
            </table>

            <a href = "contacts/new">Add new contact</a>
    </body>
</html>
