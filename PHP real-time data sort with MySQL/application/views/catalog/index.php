<?php
date_default_timezone_set('Asia/Singapore'); 
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');

$results = $this->product->get_all_products();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Catalog</title>
        <link rel="stylesheet" type="text/css">
        <style>
            form, a, h1{
                display:inline-block;
            }
            img{
                height:150px;
                width:150px;;
            }
            div{
                width:160px;
                margin-right:10px;
            }
            select{
                display:block;
            }
            header a{
                margin-left:300px;
            }
            header{
                background-color:gray;
                width:500px;
            }

        </style>
    </head>
    <body>
        <header>
        <h1>My Store</h1>
        <a href="carts">Cart <?=$cart;?></a>
        </header>
<?php

        foreach($results as $result){
?>
        <?=form_open('catalogs/add');?>
            <div>
            <img src="https://media.istockphoto.com/id/692279886/vector/red-x-mark-icon-cross-symbol.jpg?s=1024x1024&w=is&k=20&c=NEaFRWbaMBkG-uNh_s3GGvgDmFarQZrlunkKGB0LMpo=">
            <label>
                "<?=$result['name']?> $<?=$result['price']?>"
                <select name="qty">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <input type="submit" value="Buy">
                <input type="hidden" name="id" value=<?=$result['id']?>>
            </label>
            </div>
        </form>
<?php
            }
?>
    </body>
</html>
