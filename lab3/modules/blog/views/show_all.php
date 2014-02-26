<?php
if (count($posts) > 0)
    foreach ($posts as $post) {
        ?>
        <div style="border:1px solid #000; padding:4px;margin-bottom:4px;">
            <?php echo $post['title']; ?> @ (<?php echo date("g:i a F j, Y ", strtotime($post['date'])); ?>)<br/><br/>
            <?php echo $post['summary']; ?><br/>
            <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/blog/post/show/id/<?php echo $post['id']; ?>">Read Post</a>
        </div>
        <?php
    }
else
    echo 'No posts available';