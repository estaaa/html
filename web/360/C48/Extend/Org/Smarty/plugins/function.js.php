<?php

function smarty_function_js($params, &$smarty)
{
   return "<script type='text/javascript' src='./js/{$params['file']}'></script>";
}

/* vim: set expandtab: */

?>
