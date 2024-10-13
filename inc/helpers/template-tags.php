<?php
/**
 * All Necessery Functions Here
 * @package SimpleCharm
 * @since 1.3
 */
function simplecharm_sanitize_checkbox($checked) {
    // Boolean check.
    return (isset($checked) && true == $checked);
}