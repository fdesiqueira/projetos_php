<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    
    <head>
            <title>DSW3 Imóveis - Administração</title>
            <?php
            $meta = array(
                    array('name' => 'robots', 'content' => 'NOINDEX, NOFOLLOW'),
                    array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
            );
            echo meta($meta);
            echo link_tag('assets/imgs/casinha.png', 'shortcut icon', 'image/ico');
            echo link_tag('assets/css/bootstrap.min.css', 'stylesheet');
            echo link_tag('assets/css/shop-homepage.css', 'stylesheet');
            echo link_tag('assets/css/admin.css', 'stylesheet');
            ?>
            <!-- jQuery -->
            <script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js" ></script>
            <script src="<?php echo base_url();?>assets/js/jquery.mask.js" ></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
    </head>
<body>