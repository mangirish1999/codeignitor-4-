<?php

function display_error($validation, $feild)
{
    if ($validation->hasError($feild)) {
        return $validation->getError($feild);
    } else {
        return false;
    }
}