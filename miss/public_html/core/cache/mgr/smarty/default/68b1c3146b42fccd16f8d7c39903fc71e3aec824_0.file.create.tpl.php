<?php
/* Smarty version 3.1.33, created on 2020-07-02 17:10:29
  from '/home/n/nikidem/wda/public_html/manager/templates/default/resource/weblink/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efdead5211bb3_91263486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68b1c3146b42fccd16f8d7c39903fc71e3aec824' => 
    array (
      0 => '/home/n/nikidem/wda/public_html/manager/templates/default/resource/weblink/create.tpl',
      1 => 1593687307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efdead5211bb3_91263486 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="modx-panel-weblink-div"></div>
<div id="modx-resource-tvs-div" class="modx-resource-tab x-form-label-left x-panel"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tvOutput']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['onDocFormPrerender']->value;?>

<?php if ($_smarty_tpl->tpl_vars['resource']->value->richtext && $_smarty_tpl->tpl_vars['_config']->value['use_editor']) {?>
    <?php echo $_smarty_tpl->tpl_vars['onRichTextEditorInit']->value;?>

<?php }
}
}
