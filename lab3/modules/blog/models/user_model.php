<?php

class user_model extends rs_model {

    function get_user_name($id) {
        $pdo = &get_pdo();
        $stat = $pdo->prepare('SELECT * FROM redsky.users WHERE id=:id');
        $stat->execute(array(':id' => $id));
        $row = $stat->fetch(PDO::FETCH_ASSOC);
        return $row['name'];
    }

}
