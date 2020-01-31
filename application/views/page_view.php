<?php include_once 'header.php'; ?>

<?php if($page_content->num_rows() > 0) { $page = $page_content->result(); ?>
    <?php if($mode == 'edit') { ?>
        <form action="<?php echo "/index.php/$page_name/update/"; ?>" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $page[0]->title; ?>" />
            </div>  
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control editor" name="content" id="content" value="<?php echo $page[0]->content; ?>"></textarea>
            </div>  
            <input type="hidden" name="id" value="<?php echo $page[0]->id ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } else { ?>
        <?php if($this->session->flashdata('msg_succ')) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('msg_succ');?>
            </div>   
        <?php } elseif($this->session->flashdata('msg_failed')) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('msg_failed');?>
            </div>   
        <?php } ?>
        <h1><?php echo $page[0]->title; ?></h1>
        <p><?php echo $page[0]->content; ?></p>
    <?php } if($mode != 'edit') { ?>
    <div class="mt-3">
        <a href=<?php echo "/index.php/$page_name/edit/$page_id"; ?> class="btn btn-primary">Edit Page</a>
    </div>
    <?php } 
} ?>
<?php include_once 'footer.php';