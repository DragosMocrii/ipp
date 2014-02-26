<?php
if (isset($post_added) && $post_added === TRUE) {
    ?>
    <div style="color:green">
        Post added successfully
    </div>
<?php } ?>
<form action="" method="post">
    Title: <input type="text" name="post_title" /><br/>
    Summary: <textarea cols="35" rows="20" name="post_summary"></textarea><br/>
    <input type="submit" value="Add Post" name="submit"/>
</form>