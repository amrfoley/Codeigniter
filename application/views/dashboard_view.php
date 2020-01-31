<?php include_once 'header.php'; ?>

<?php if($page_content->num_rows() > 0) { $page = $page_content->result(); ?>
    <h1><?php echo $page[0]->title; ?></h1>
    <p><?php echo $page[0]->content; ?></p>
<?php } ?>

<?php include_once 'footer.php';