<?php
/* Smarty version 3.1.30, created on 2017-09-01 13:38:18
  from "/Applications/MAMP/htdocs/booked/tpl/Admin/Import/quartzy_import.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a946aa758452_33642437',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c122389171ba68bf783c75836aed013d27d445d' => 
    array (
      0 => '/Applications/MAMP/htdocs/booked/tpl/Admin/Import/quartzy_import.tpl',
      1 => 1499885328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:globalheader.tpl' => 1,
    'file:globalfooter.tpl' => 1,
  ),
),false)) {
function content_59a946aa758452_33642437 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php $_smarty_tpl->_subTemplateRender("file:globalheader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div id="page-import-ics" class="admin-page">
    <h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'ImportQuartzy'),$_smarty_tpl);?>
</h1>

    <div class="margin-bottom-25">

        <div id="importErrors" class="error hidden"></div>
        <div id="importResult" class="hidden">
            <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RowsImported'),$_smarty_tpl);?>
</span>

            <div id="importCount" class="inline bold"></div>
            <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'RowsSkipped'),$_smarty_tpl);?>
</span>

            <div id="importSkipped" class="inline bold"></div>
            <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Done'),$_smarty_tpl);?>
</a>
        </div>

        <form id="quartzyImportForm" method="post" enctype="multipart/form-data" ajaxAction="importQuartzy">
            <div class="validationSummary alert alert-danger no-show">
                <ul>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"fileExtensionValidator",'key'=>''),$_smarty_tpl);?>

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['async_validator'][0][0]->AsyncValidator(array('id'=>"importQuartzyValidator",'key'=>''),$_smarty_tpl);?>

                </ul>
            </div>

            <div>
                <input type="file" name="quartzyFile"/>
            </div>

            <div>
                <label for="includeBookings">Include Bookings</label>
                <input type="checkbox" id="includeBookings" name="includeBookings"/>
                <span>(this can take up to 20 minutes)</span>
            </div>

            <div class="admin-update-buttons">
                <button id="btnUpload" type="button"
                        class="btn btn-success save"><i class="fa fa fa-upload"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0][0]->SmartyTranslate(array('key'=>'Import'),$_smarty_tpl);?>
</button>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['indicator'][0][0]->DisplayIndicator(array(),$_smarty_tpl);?>

            </div>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf_token'][0][0]->CSRFToken(array(),$_smarty_tpl);?>

        </form>
    </div>
    <div>
        <div class="alert alert-info">
            <div class="note">Export your Quartzy data <a href="https://support.quartzy.com/hc/en-us/articles/214823208"
                                                          target="_new">following these instructions</a></div>
            <div class="note">Users will imported with the password <strong>p@ssw0rd!</strong></div>
        </div>
        <div class="alert alert-warning">Please do not make any changes to the Quartzy export file. Your data cannot be
            imported if this file is altered in any way.
        </div>
    </div>
</div>



<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"ajax-helpers.js"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['jsfile'][0][0]->IncludeJavascriptFile(array('src'=>"js/jquery.form-3.09.min.js"),$_smarty_tpl);?>


<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {

        var importForm = $('#quartzyImportForm');

        var defaultSubmitCallback = function (form) {
            return function () {
                return '<?php echo $_SERVER['SCRIPT_NAME'];?>
?action=' + form.attr('ajaxAction');
            };
        };

        var importHandler = function (responseText, form) {
            if (!responseText) {
                return;
            }

            $('#importCount').text(responseText.importCount);
            $('#importSkipped').text(responseText.skippedRows.length > 0 ? responseText.skippedRows.join(',') : '-');
            $('#importResult').show();

            var errors = $('#importErrors');
            errors.empty();
            if (responseText.messages && responseText.messages.length > 0) {
                var messages = responseText.messages.join('</li><li>');
                errors.html('<div>' + messages + '</div>').show();
            }
        };

        $('#btnUpload').click(function (e) {
            e.preventDefault();
            importForm.submit();
        });

        ConfigureAsyncForm(importForm, defaultSubmitCallback(importForm), importHandler);
    });
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:globalfooter.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
