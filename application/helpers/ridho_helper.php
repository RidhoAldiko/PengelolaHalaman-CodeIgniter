<?php

function check_is_publish($is_publish){
    $rdh = get_instance();
    if ($is_publish == 1) {
        return "checked='checked'";
    }
}

?>