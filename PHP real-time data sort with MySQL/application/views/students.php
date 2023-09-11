<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Students</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/style.css')?>">   
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="<?=base_url('assets/app.js')?>"></script>
    </head>
    <body>
        <header>
<?=form_open(base_url('filter'));?>
            <label>
            <input type="checkbox" value="Male" id="options" name="gender[]" class="select-filter">Male
            </label>
            <label>
            <input type="checkbox" value="Female" name="gender[]" class="select-filter">Female
            </label>
            <label>
                <select name="course" class="select-filter">
                        <option value="1">All Students</option>
                        <option value="Biology">Biology</option>
                        <option value="Fine Arts">Fine Arts</option>
                        <option value="Business">Business</option>
                        <option value="Computer Science">Computer Science</option>
                </select>
            </label>
        </header>
    </body>
</html>
