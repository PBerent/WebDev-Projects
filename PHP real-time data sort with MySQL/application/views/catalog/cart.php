<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');
$results = $this->product->get_all_products();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cart</title>
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
        <a href="../">Catalog</a>
        </header>
        <h2>Check out</h2>
        <table>
            <thead>
                <tr>
                    <th>Item name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
<?php
        foreach($results as $result){
?>
                <tr>
                    <td><?=$result['name']?></td>
                    <td><?=$result['qty']?></td>
                    <td>$<?=$result['price']?></td>
                    <td>
                        <?=form_open('carts/destroy');?>
                            <input type="hidden" name="id" value=<?=$result['id']?>>
                            <input type="submit" value="X">
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
