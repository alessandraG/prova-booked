<?php
/* Smarty version 3.1.30, created on 2017-09-01 13:05:15
  from "/Applications/MAMP/htdocs/booked/tpl/json_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a93eeb604092_56409533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5ec69c7fe9c21e09852aec666c28cfd5f5f2906' => 
    array (
      0 => '/Applications/MAMP/htdocs/booked/tpl/json_data.tpl',
      1 => 1499885330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a93eeb604092_56409533 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['data']->value != '') {
echo $_smarty_tpl->tpl_vars['data']->value;?>

<?php }
if ($_smarty_tpl->tpl_vars['error']->value != '') {
echo $_smarty_tpl->tpl_vars['error']->value;?>

<?php }
}
}
