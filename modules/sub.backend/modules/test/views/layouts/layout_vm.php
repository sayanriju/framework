<?php echo doctype('xhtml11')."\n"; ?>
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" >
    
<head>
<?php
echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
echo meta('description', '');
echo meta('author', '');
?>
<?php echo view_var('meta'); ?>

<title><?php echo view_var('title'); ?></title>

<?php echo view_var('head'); ?>

</head>

<body>

<?php echo view_var('body'); ?>

</body>
</html>