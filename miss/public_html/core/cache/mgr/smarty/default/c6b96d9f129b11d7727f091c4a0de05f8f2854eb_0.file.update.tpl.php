<?php
/* Smarty version 3.1.33, created on 2020-07-02 17:10:56
  from '/home/n/nikidem/wda/public_html/manager/templates/default/resource/weblink/update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efdeaf0d58901_03541002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6b96d9f129b11d7727f091c4a0de05f8f2854eb' => 
    array (
      0 => '/home/n/nikidem/wda/public_html/manager/templates/default/resource/weblink/update.tpl',
      1 => 1593687307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efdeaf0d58901_03541002 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modx-panel-weblink-div"></div>
<div id="modx-resource-tvs-div" class="modx-resource-tab x-form-label-left x-panel"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tvOutput']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['onDocFormPrerender']->value;?>

<?php if ($_smarty_tpl->tpl_vars['resource']->value->richtext && $_smarty_tpl->tpl_vars['_config']->value['use_editor']) {?>
    <?php echo $_smarty_tpl->tpl_vars['onRichTextEditorInit']->value;?>

<?php }
}
}
