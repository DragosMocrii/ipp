<?php

class post_model extends rs_model {

    function add_post($user_id, $title, $summary) {
        $pdo = &get_pdo();
        $stat = $pdo->prepare('INSERT INTO redsky.posts(user_id,title,summary) VALUES (:user_id,:title,:summary)');
        $stat->execute(array(':user_id' => $user_id, ':title' => $title, ':summary' => $summary));
        return $pdo->lastInsertId();
    }

    function delete_post($id) {
        $pdo = &get_pdo();
        $stat = $pdo->prepare('DELETE FROM redsky.posts WHERE id=:id');
        $stat->execute(array(':id' => $id));
    }

    function get_post($id) {
        $pdo = &get_pdo();
        $stat = $pdo->prepare('SELECT * FROM redsky.posts WHERE id=:id');
        $stat->execute(array(':id' => $id));
        return $stat->fetch(PDO::FETCH_ASSOC);
    }

    function get_posts() {
        $pdo = &get_pdo();
        $stat = $pdo->prepare('SELECT * FROM redsky.posts');
        $stat->execute();
        return $stat->fetchAll(PDO::FETCH_ASSOC);
    }

}