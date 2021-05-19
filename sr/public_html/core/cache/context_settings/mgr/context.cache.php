<?php  return array (
  'config' => 
  array (
    'allow_tags_in_post' => '1',
    'modRequest.class' => 'modManagerRequest',
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnChunkFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnDocFormPrerender' => 
    array (
      1 => '1',
      5 => '5',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnFileEditFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnFileManagerUpload' => 
    array (
      3 => '3',
    ),
    'OnManagerPageBeforeRender' => 
    array (
      5 => '5',
    ),
    'OnMODXInit' => 
    array (
      4 => '4',
    ),
    'OnPluginFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnPluginSave' => 
    array (
      5 => '5',
    ),
    'OnRichTextBrowserInit' => 
    array (
      6 => '6',
    ),
    'OnRichTextEditorInit' => 
    array (
      6 => '6',
    ),
    'OnRichTextEditorRegister' => 
    array (
      6 => '6',
      5 => '5',
    ),
    'OnSiteRefresh' => 
    array (
      4 => '4',
    ),
    'OnSnipFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnTempFormPrerender' => 
    array (
      5 => '5',
    ),
    'OnTVInputPropertiesList' => 
    array (
      1 => '1',
    ),
    'OnTVInputRenderList' => 
    array (
      1 => '1',
    ),
    'OnWebPagePrerender' => 
    array (
      4 => '4',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => '1',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    3 => 
    array (
      'id' => '3',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'migxResizeOnUpload',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    4 => 
    array (
      'id' => '4',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'pdoTools',
      'description' => '',
      'editor_type' => '0',
      'category' => '2',
      'cache_type' => '0',
      'plugincode' => '/** @var modX $modx */
switch ($modx->event->name) {

    case \'OnMODXInit\':
        $fqn = $modx->getOption(\'pdoTools.class\', null, \'pdotools.pdotools\', true);
        $path = $modx->getOption(\'pdotools_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);

        $fqn = $modx->getOption(\'pdoFetch.class\', null, \'pdotools.pdofetch\', true);
        $path = $modx->getOption(\'pdofetch_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
        $modx->loadClass($fqn, $path, false, true);
        break;

    case \'OnSiteRefresh\':
        /** @var pdoTools $pdoTools */
        if ($pdoTools = $modx->getService(\'pdoTools\')) {
            if ($pdoTools->clearFileCache()) {
                $modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\') . \': pdoTools\');
            }
        }
        break;

    case \'OnWebPagePrerender\':
        $parser = $modx->getParser();
        if ($parser instanceof pdoParser) {
            foreach ($parser->pdoTools->ignores as $key => $val) {
                $modx->resource->_output = str_replace($key, $val, $modx->resource->_output);
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/pdotools/elements/plugins/plugin.pdotools.php',
    ),
    5 => 
    array (
      'id' => '5',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'SimpleAceCodeEditor',
      'description' => 'Ace Code Editor *simple* integration - 1.5.2-pl',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Simple Ace Source Editor Plugin
 * https://github.com/Indigo744/Modx-Revo-Simple-Ace-Code-Editor
 *
 * Create plugin and paste this code or install it from Package Manager
 * Set which_element_editor system option to SimpleAceCodeEditor
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 * and OnPluginSave to force cache refresh
 * 
 * Properties:
 *
 *     AcePath: URL or path to ACE javascript file
 *              default: https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js
 *
 *     Theme: editor theme name (you can test them all here: https://ace.c9.io/build/kitchen-sink.html)
 *            default: monokai
 *
 *     SoftWraps: Set editor soft wraps (either `off`, `free`, `printMargin` or a number of columns)
 *                default: off
 * 
 *     FontSize: Set editor font size (in px, em, rem or %)
 *               default: 12px
 *
 *     SoftTabs: Enable soft tabs (4 spaces) instead of hard tabs (tab character)
 *               default: true
 * 
 *     ReplaceCTRLDKbdShortcut: Replace the CTRL-D (or CMD-D) keyboard shortcut to perform a more sensible action
 *                              duplicate the current line or selection (instead of deleting, which is the default behavior)
 *                              default: true
 *
 *     Autocompletion: Enable Auto-completion: none, basic (show on CTRL-Space) or live (show on typing)
 *                     Note that "ext-language_tools.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-language_tools.js)
 *                     default: basic
 *
 *     SettingsMenu: Add a settings menu accessible with CTR-Q (or CMD-Q)
 *                   Note that "ext-settings_menu.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-settings_menu.js)
 *                   default: false
 *
 *     Spellcheck: Enable spell-check
 *                 Note that "ext-spellcheck.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-spellcheck.js)
 *                 default: false
 *
 *     EmmetPath: URL or path to Emmet js file
 *                For more information, see https://github.com/cloud9ide/emmet-core
 *                default: https://cloud9ide.github.io/emmet-core/emmet.js
 *
 *     Emmet: Enable Emmet
 *            Note that Emmet JS file must be loaded first (see EmmetPath, it must be correctly set)
 *            Note that "ext-emmet.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-emmet.js)
 *            It is recommended to disable ReplaceCTRLDKbdShortcut property when using Emmet (as it replace an Emmet shortcut CTRL-D)
 *            default: false
 *
 *     AcePrintMarginColumn: Print margin column position
 *                           Set the character position of the print margin (for instance useful if you like to code with 80 chars wide max)
 *                           Set to 0 to disable it completely
 *                           default: 0 (disabled)
 *
 *     ChunkDetectMIMEShebang: Enable \'shebang-style\' MIME detection for chunks (in description or in the first line of chunk content)
 *                             This is particularly useful if your chunk contains directly JS, or SASS, or anything different than HTML...
 *                             Supported MIME values are text/x-smarty, text/html, application/xhtml+xml, text/css, text/x-scss, 
 *                                                       text/x-sass, text/x-less, image/svg+xml, application/xml, text/xml, text/javascript, 
 *                                                       application/javascript, application/json, text/x-php, application/x-php, text/x-sql, 
 *                                                       text/x-markdown, text/plain, text/x-twig
 *                             default: true
 *
 *     ToggleFullScreenKeyBinding: Key binding used to toggle editor fullscreen (example: Ctrl-P or F11 or anything you want)
 *                                 default: F11
 *
 *     ToggleFullScreenShowButton: Display the toggle fullscreen button (on top right of the editor)
 *                                 default: true
 *
 *     EditorHeight: Editor height (in px, em, rem or %)
 *                   default: <empty> (uses default editor height)
 *
 *     EditorTVHeight: Editor height for template vars - take precedence over EditorHeight value (in px, em, rem or %)
 *                     default: <empty> (uses default editor height)
 * 
 *
 * If you want to edit a property, create your own property set first.
 * Don\'t forget to associate your new property set to all events in "System Events" tab.
 *
 * Based on Ace Source Editor Plugin by Danil Kostin
 *
 * @package SimpleAceCodeEditor
 *
 * @var array $scriptProperties
 * @var Ace $ace
 */

/** Package information (set at build) **/
$pluginName = \'SimpleAceCodeEditor\';
$pluginVersion = \'1.5.2-pl\';

/** Force mgr refresh on plugin save **/
if ($modx->event->name == \'OnPluginSave\') {
    if ($plugin->get(\'name\') === $pluginName) {
        $modx->cacheManager->refresh(array(
            \'context_settings\' => array(\'contexts\' => array(\'mgr\'))
        ));
    }
    return;
}

/** Register RTE **/
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output($pluginName);
    return;
}

/** Check if RTE (element) setting is set to this **/
if ($modx->getOption(\'which_element_editor\', null) !== $pluginName) {
    return;
}

/** Get properties **/
$AcePath = $modx->getoption(\'AcePath\', $scriptProperties, $modx->getOption($pluginName . \'.AcePath\', null, "https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js"));
$EmmetPath = $modx->getoption(\'EmmetPath\', $scriptProperties, $modx->getOption($pluginName . \'.EmmetPath\', null, "https://cloud9ide.github.io/emmet-core/emmet.js"));
$AceTheme = $modx->getoption(\'Theme\', $scriptProperties, $modx->getOption($pluginName . \'.Theme\', null, \'monokai\'));
$AceSoftWraps = $modx->getoption(\'SoftWraps\', $scriptProperties, $modx->getOption($pluginName . \'.SoftWraps\', null, \'off\'));
$AceFontSize = $modx->getoption(\'FontSize\', $scriptProperties, $modx->getOption($pluginName . \'.FontSize\', null, \'12\'));
$AceSoftTabs = $modx->getoption(\'SoftTabs\', $scriptProperties, $modx->getOption($pluginName . \'.SoftTabs\', null, true));
$AceReplaceCTRLDKbdShortcut = $modx->getoption(\'ReplaceCTRLDKbdShortcut\', $scriptProperties, $modx->getOption($pluginName . \'.ReplaceCTRDKbdShortcut\', null, true));
$AceAutocompletion = $modx->getoption(\'Autocompletion\', $scriptProperties, $modx->getOption($pluginName . \'.Autocompletion\', null, \'basic\'));
$AceSettingsMenu = $modx->getoption(\'SettingsMenu\', $scriptProperties, $modx->getOption($pluginName . \'.SettingsMenu\', null, false));
$AceSpellcheck = $modx->getoption(\'Spellcheck\', $scriptProperties, $modx->getOption($pluginName . \'.Spellcheck\', null, false));
$AceEmmet = $modx->getoption(\'Emmet\', $scriptProperties, $modx->getOption($pluginName . \'.Emmet\', null, false));
$AcePrintMarginColumn = $modx->getoption(\'AcePrintMarginColumn\', $scriptProperties, $modx->getOption($pluginName . \'.AcePrintMarginColumn\', null, 0));
$AceChunkDetectMIMEShebang = $modx->getoption(\'ChunkDetectMIMEShebang\', $scriptProperties, $modx->getOption($pluginName . \'.ChunkDetectMIMEShebang\', null, true));
$AceToggleFullScreenKeyBinding = $modx->getoption(\'ToggleFullScreenKeyBinding\', $scriptProperties, $modx->getOption($pluginName . \'.ToggleFullScreenKeyBinding\', null, "F11"));
$AceToggleFullScreenShowButton = $modx->getoption(\'ToggleFullScreenShowButton\', $scriptProperties, $modx->getOption($pluginName . \'.ToggleFullScreenShowButton\', null, true));
$AceEditorHeight = $modx->getoption(\'EditorHeight\', $scriptProperties, $modx->getOption($pluginName . \'.EditorHeight\', null, null));
$AceEditorTVHeight = $modx->getoption(\'EditorTVHeight\', $scriptProperties, $modx->getOption($pluginName . \'.EditorTVHeight\', null, null));

/** Inits script options **/
$AceAssetsUrl = $modx->getOption(\'assets_url\') . \'components/\' . strtolower($pluginName);
$AceBasePath = dirname($AcePath);
$scriptPaths = array($AcePath, "$AceAssetsUrl/modx_highlight_rules.js");
$editorOptions = array(
    \'wrap\' => $AceSoftWraps,
    \'useSoftTabs\' => $AceSoftTabs,
    \'navigateWithinSoftTabs\' => true
);
$rendererOptions = array(
    \'theme\' => "ace/theme/$AceTheme",
    \'showPrintMargin\' => $AcePrintMarginColumn > 0 ? true : false,
    \'printMarginColumn\' => $AcePrintMarginColumn > 0 ? $AcePrintMarginColumn : 80,
    \'fontSize\' => $AceFontSize
);
$editorAdditionalScript = "\\n";

/** Handle proper CTRL-D **/
if ($AceReplaceCTRLDKbdShortcut == true) {
    $editorAdditionalScript .= <<<JS
        editor.commands.removeCommand(\'del\');
        editor.commands.addCommand({
            name: "del",
            bindKey: {win: "Delete",  mac: "Delete|Shift-Delete"},
            exec: function(editor) { editor.remove("right"); },
            multiSelectAction: "forEach",
            scrollIntoView: "cursor"
        });
        editor.commands.addCommand({
            name: "Duplicate Selection",
            bindKey: {win: "Ctrl-D", mac: "Command-D"},
            exec: function(editor) { editor.duplicateSelection(); },
            scrollIntoView: "cursor",
            multiSelectAction: "forEach"
        });
JS;
}

/** Handle autocompletion extension **/
if ($AceAutocompletion === \'live\' || $AceAutocompletion === \'basic\') {
    $editorOptions[\'enableBasicAutocompletion\'] = true;
    $editorOptions[\'enableLiveAutocompletion\'] = $AceAutocompletion === \'live\';
    array_push($scriptPaths, "$AceBasePath/ext-language_tools.js");
}

/** Handle settings_menu extension **/
if ($AceSettingsMenu == true) {
    $editorAdditionalScript .= <<<JS
        var RequiresettingsMenu = ace.require(\'ace/ext/settings_menu\');
        if (RequiresettingsMenu) {
            // Init with current editor
            RequiresettingsMenu.init(editor);
            // Set CTRL-Q shortcut
        	editor.commands.addCommands([{
        		name: "showSettingsMenu",
        		bindKey: {win: "Ctrl-q", mac: "Ctrl-q"},
        		exec: function(editor) {
        			editor.showSettingsMenu();
        		},
        		readOnly: true
        	}]);
        }
JS;
    array_push($scriptPaths, "$AceBasePath/ext-settings_menu.js");
} 


/** Handle Spellcheck extension **/
if ($AceSpellcheck == true) {
    $editorOptions[\'spellcheck\'] = true;
    array_push($scriptPaths, "$AceBasePath/ext-spellcheck.js");
} 

/** Handle Emmet extension **/
if ($AceEmmet == true) {
    $editorOptions[\'enableEmmet\'] = true;
    array_push($scriptPaths, $EmmetPath);
    array_push($scriptPaths, "$AceBasePath/ext-emmet.js");
}

/** Handle toggle fullscreen button **/
if ($AceToggleFullScreenShowButton == true) {
    $editorAdditionalScript .= <<<JS
        // Create fullscreen toggle button
        var fullscreenButton = createFullScreenButton(editor, aceEditorDiv);
JS;
} else {
    $editorAdditionalScript .= <<<JS
        var fullscreenButton = null;
JS;
}

/** Handle height definition **/
if ($AceEditorHeight !== null && $AceEditorHeight > 0) {
    // Make sure we have a size for TVs
    if (!$AceEditorTVHeight) $AceEditorTVHeight = $AceEditorHeight;

    // Add px unit if no unit was set
    $AceEditorHeight = is_numeric($AceEditorHeight) ? $AceEditorHeight.\'px\' : $AceEditorHeight;
    $AceEditorTVHeight = is_numeric($AceEditorTVHeight) ? $AceEditorTVHeight.\'px\' : $AceEditorTVHeight;

    $editorAdditionalScript .= <<<JS
        // Set text area height
        if (textarea.id.lastIndexOf(\'tv\', 0) === 0) {
            textarea.style.height = \'{$AceEditorTVHeight}\';
        } else {
            textarea.style.height = \'{$AceEditorHeight}\';
        }
JS;
}

/** Corresponding arrays **/
$modeThatShouldNotBeMixed = array(\'php\');

$mimeTypeToMode = array(
    \'text/x-smarty\'                     => \'smarty\',
    \'text/html\'                         => \'html\',
    \'application/xhtml+xml\'             => \'html\',
    \'text/css\'                          => \'css\',
    \'text/x-scss\'                       => \'scss\',
    \'text/x-sass\'                       => \'scss\',
    \'text/x-less\'                       => \'less\',
    \'image/svg+xml\'                     => \'svg\',
    \'application/xml\'                   => \'xml\',
    \'text/xml\'                          => \'xml\',
    \'text/javascript\'                   => \'javascript\',
    \'application/javascript\'            => \'javascript\',
    \'application/json\'                  => \'json\',
    \'text/x-php\'                        => \'php\',
    \'application/x-php\'                 => \'php\',
    \'text/x-sql\'                        => \'sql\',
    \'application/sql\'                   => \'sql\',
    \'text/x-markdown\'                   => \'markdown\',
    \'text/markdown\'                     => \'markdown\',
    \'text/plain\'                        => \'text\',
    \'text/x-twig\'                       => \'twig\',
    \'application/x-extension-htaccess\'  => \'apache_conf\',
    \'application/vnd.coffeescript\'      => \'coffee\',
    \'application/x-typescript\'          => \'typescript\',
    \'text/x-ini\'                        => \'ini\',
    \'text/x-ejs\'                        => \'ejs\',
    \'application/x-perl\'                => \'perl\',
);

$extensionMap = array(
    \'tpl\'       => \'text/html\',
    \'htm\'       => \'text/html\',
    \'html\'      => \'text/html\',
    \'css\'       => \'text/css\',
    \'scss\'      => \'text/x-scss\',
    \'sass\'      => \'text/x-sass\',
    \'less\'      => \'text/x-less\',
    \'svg\'       => \'image/svg+xml\',
    \'xml\'       => \'application/xml\',
    \'xsl\'       => \'application/xml\',
    \'js\'        => \'application/javascript\',
    \'json\'      => \'application/json\',
    \'php\'       => \'application/x-php\',
    \'sql\'       => \'text/x-sql\',
    \'txt\'       => \'text/plain\',
    \'htaccess\'  => \'application/x-extension-htaccess\',
    \'coffee\'    => \'application/vnd.coffeescript\',
    \'litcoffee\' => \'application/vnd.coffeescript\',
    \'ts\'        => \'application/x-typescript\',
    \'ini\'       => \'text/x-ini\',
    \'ejs\'       => \'text/x-ejs\',
    \'md\'        => \'text/markdown\',
    \'pl\'        => \'application/x-perl\',
);


/** Adapt field/mime depending on event type **/
$targetFields = [];
switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        // Snippets are PHP
        $targetFields[\'modx-snippet-snippet\'] = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        // Templates are HTML
        $targetFields[\'modx-template-content\'] = \'text/html\';
        break;
    case \'OnChunkFormPrerender\':
        // Chunks are HTML
        // unless it is static then we look at the file extension
        // unless it a proper mime type is set in description or first line of chunk!
        $targetFields[\'modx-chunk-snippet\'] = null;
        
        if ($modx->controller->chunk) {
            /** Try to detect shebang **/
            if ($AceChunkDetectMIMEShebang) {
                // Retrieve description
                $chunkDescription = $modx->controller->chunk->get(\'description\');
                // Retrieve first line of chunk content
                $chunkContentFirstLine = strtok($modx->controller->chunk->getContent(), "\\n");
                // Loop through known mime
                foreach(array_keys($mimeTypeToMode) as $currMimeType) {
                    if (strpos($chunkDescription, $currMimeType) !== FALSE || 
                        strpos($chunkContentFirstLine, $currMimeType) !== FALSE) 
                    {
                        $targetFields[\'modx-chunk-snippet\'] = $currMimeType;
                        break;
                    }
                }
            }
            
            /** For static file, try to detect through file extension **/
            if (!$targetFields[\'modx-chunk-snippet\'] && $modx->controller->chunk->isStatic()) {
                $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
                $targetFields[\'modx-chunk-snippet\'] = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
            }
        }
        
        /* Default to HTML */
        if (!$targetFields[\'modx-chunk-snippet\']) {
            $targetFields[\'modx-chunk-snippet\'] = \'text/html\';
        }
        
        break;
    case \'OnPluginFormPrerender\':
        // Plugins are PHP
        $targetFields[\'modx-plugin-plugincode\'] = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        // On file creation, use plain text
        $targetFields[\'modx-file-content\'] = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        // For file editing, we look at the file extension
        // Identify mime type according to extension
        $extension = pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION);
        $targetFields[\'modx-file-content\'] = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        break;
    case \'OnDocFormPrerender\':
        // For document, we look at the content type
        // But we wont show anything if another RTE is set (e.g. CKEditor or TinyMCE)
        if ($modx->controller->resourceArray) {
            $useEditor = $modx->getOption(\'use_editor\');
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if (!$useEditor || (!$richText && !in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\')))) {
                $targetFields[\'ta\'] = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');
            }
        }

        // Document can have template variables associated
        $templateId = $modx->controller->resource->get(\'template\');
        if ($templateId) {
            // Try to retrieve the template value (can be null)
            $templateVar = $modx->getObject(\'modTemplate\', $templateId);
            if ($templateVar) {
                // Retrieve all TV\'s
                $templateVarList = $templateVar->getTemplateVarList();
                // Loop through all TV\'s
                foreach ($templateVarList[\'collection\'] as $tv) {
                    $tvDescription = $tv->get(\'description\');
                    // Check if this TV: 
                    //      - is associated to the current template
                    //      - is textarea
                    //      - has the char \'/\' in description which means a mime type is *potentially* set
                    if ($tv->hasTemplate($templateId) && $tv->get(\'type\') === \'textarea\' && strpos($tvDescription, \'/\') !== FALSE) {
                        // Loop through known mime
                        foreach(array_keys($mimeTypeToMode) as $currMimeType) {
                            if (strpos($tvDescription, $currMimeType) !== FALSE) 
                            {
                                $targetFields[\'tv\'.$tv->get(\'id\')] = $currMimeType;
                                break;
                            }
                        }
                    }
                }
            }
        }
        break;
    default:
        return;
}

/** If field found, include the javascript code to load Ace **/
if (!empty($targetFields)) {

    // Convert options to JSON object
    $editorOptions = json_encode($editorOptions, JSON_FORCE_OBJECT);
    $rendererOptions = json_encode($rendererOptions, JSON_FORCE_OBJECT);
    
    // Generate cache busting query string
    // Based on current plugin version + hash of all properties
    $propertiesHash = md5("$AcePath $EmmetPath $AceTheme $AceReplaceCTRLDKbdShortcut $AceAutocompletion $AceSettingsMenu $AceSpellcheck $AceEmmet $AceChunkDetectMIMEShebang");
    $CacheBustingQSValue = "?v=$pluginVersion-$propertiesHash";

    // Generate final script!
    $script = "";
    foreach($scriptPaths as $scriptPath) {
        // Include file
        $script .= "<script src=\'$scriptPath$CacheBustingQSValue\' type=\'text/javascript\' charset=\'utf-8\'></script>\\n";
    }

    $tryToGetTextArea = "";
    $timeout = 0;
    foreach ($targetFields as $targetField => $fieldMimeType) {
        $mode = isset($mimeTypeToMode[$fieldMimeType]) ? $mimeTypeToMode[$fieldMimeType] : \'text\';
        if (!in_array($mode, $modeThatShouldNotBeMixed)) {
            $mode = \'mixed-\' . $mode;
        }
        $tryToGetTextArea .= "setTimeout(function(){ tryToGetTextArea(\'$targetField\', \'$mode\'); }, $timeout);\\n";
        $timeout += 50;
    }

    // The script...
    $script .= <<<HTML
<script type="text/javascript">
    Ext.onReady(function() {
        "use strict";
    
        // Max number of tries
        var MAX_TRIES = 10;
        
        // Time in ms to wait between each tries
        var WAIT_BETWEEN_TRIES_MS = 100;
        
        // Hold the current try number
        var currentTry = 0;
        
        // Useful dom lib
        var dom = ace.require("ace/lib/dom");
        
        /** 
         * Function Init ACE editor
         * Uses textarea variable
         */
        var initAceCodeEditor = function(textarea, mode) {

            // Set parent element to relative position
            // Hence the Ace Editor div absolute positionning will be relative to it
            textarea.parentNode.style.position = \'relative\';
            
            // Create div element for Ace
            var aceEditorDiv = document.createElement("div");
            setEditorSize(aceEditorDiv);
            
            // Append to DOM before the textarea
            textarea.parentNode.insertBefore(aceEditorDiv, textarea);
            
            // Hide textarea
            textarea.style.visibility = \'hidden\';
            
            // Create Ace editor !
            var editor = ace.edit(aceEditorDiv);
            
            // Additional scripts using editor
            {$editorAdditionalScript}
            
            // Fullscreen toggle support
            editor.commands.addCommand({
                name: "Toggle Fullscreen",
                bindKey: "$AceToggleFullScreenKeyBinding",
                exec: function(editor) { handleFullScreen(editor, fullscreenButton); }
            });
            
            // Search while fullscreen support
            editor.commands.addCommand({
                name: \'CustomFind\',
                bindKey: {win: \'Ctrl-F\', mac: \'Command-F\'},
                exec: function(editor) { handleSearchBox(editor); }
            });
            
            // Replace while fullscreen support
            editor.commands.addCommand({
                name: \'CustomReplace\',
                bindKey: {win: \'Ctrl-H\', mac: \'Command-Option-F\'},
                exec: function(editor) { handleSearchBox(editor, true); }
            });
            
            // Additionnal Replace command
            editor.commands.addCommand({
                name: \'additionnalReplace\',
                bindKey: {win: \'Ctrl-R\', mac: \'Command-R\'},
                exec: function(editor) { handleSearchBox(editor, true); }
            });
        
            // Ace Editor settings
            editor.setOptions({$editorOptions});
            editor.renderer.setOptions({$rendererOptions});
            
            // Check if mode starts with mixed-
            // Which indicates that a mixed-type should be used
            if (mode.lastIndexOf(\'mixed-\', 0) === 0) {
                setMixedMode(editor, mode.split(\'-\')[1]);
            } else {
                editor.session.setMode(\'ace/mode/\' + mode);
            }

            var currentSession = editor.getSession();
            
            currentSession.setValue(textarea.value);
            
            // Keep Ace and textarea synchronized
            editor.on("change", function() {
                textarea.value = currentSession.getValue();
            });

            // Run fix
            fixJumpingCursorIssue(editor, currentSession, aceEditorDiv);
            
            // Force a resize once
            editor.resize();
        };

        /** 
         * Function search for the textarea
         * Recursive function
         * If textarea is not found, wait a bit and search again
         */
        var tryToGetTextArea = function(fieldName, mode) {
            // Try to find the textarea
            var textarea = document.getElementById(fieldName);
            
            if (textarea) {
                // Element found, init!
                initAceCodeEditor(textarea, mode);
            } else {
                // Damn, not found. Wait a bit and try again
                setTimeout(function() {
                    currentTry++;
                    if (currentTry <= MAX_TRIES) {
                        tryToGetTextArea(fieldName, mode);
                    }
                }, WAIT_BETWEEN_TRIES_MS);
            }
        };
        
        /** 
         * Function to set editor size between fullscreen or not
         */
        var setEditorSize = function(editorContainer, isFullScreen) {
            if (isFullScreen) {
                editorContainer.style.position = \'fixed\';
                editorContainer.style.top = (window.innerWidth > 640) ? document.getElementById("modx-action-buttons").offsetTop + \'px\' : 0;
                editorContainer.style.bottom = \'0\';
                editorContainer.style.left = \'0\';
                editorContainer.style.right = \'0\';
                editorContainer.style[\'z-index\'] = \'10\'; // Top right menu has z-index of 11
                
                editorContainer.style.width = null;
                editorContainer.style.height = null;
            } else {
                editorContainer.style.position = \'absolute\';
                editorContainer.style.width = \'100%\';
                editorContainer.style.height = \'100%\';
                
                editorContainer.style.top = null;
                editorContainer.style.bottom = null;
                editorContainer.style.left = null;
                editorContainer.style.right = null;
                editorContainer.style[\'z-index\'] = null;
            }
        };

        /** 
         * Function to create the fullscreen button toggle
         */
        var createFullScreenButton = function(editor, aceEditorDiv) {
            var fullscreenButton = document.createElement("button");
            fullscreenButton.innerHTML = "Fullscreen";
            fullscreenButton.id = \'btnSimpleAceCodeEditorToggleFullScreen\';
            fullscreenButton.type = \'button\';
            fullscreenButton.style.height = "24px";
            fullscreenButton.style.border = "0";
            fullscreenButton.style.margin = "0";
            fullscreenButton.style.padding = "0 8px";
            fullscreenButton.style.fontSize = "12px";
            fullscreenButton.style.background = "#099890";
            fullscreenButton.style.color = "white";
            fullscreenButton.style.cursor = "pointer";
            fullscreenButton.title = "Toggle Ace editor fullscreen";

            handleFullScreenButtonPosition(fullscreenButton, false);

            fullscreenButton.onclick = function() { handleFullScreen(editor, fullscreenButton); };

            // Append to DOM before the editor
            aceEditorDiv.parentNode.insertBefore(fullscreenButton, aceEditorDiv);

            return fullscreenButton;
        };
        
        /** 
         * Function to handle fullscreen button position
         */
        var handleFullScreenButtonPosition = function(fullscreenButton, isFullScreen) {
            if (isFullScreen) {
                fullscreenButton.style.position = \'fixed\';
                fullscreenButton.style.right = \'35px\';
                fullscreenButton.style[\'z-index\'] = \'11\';

                fullscreenButton.style.borderTopRightRadius = null;
                fullscreenButton.style.borderTopLeftRadius = null;
                fullscreenButton.style.borderBottomRightRadius = "4px";
                fullscreenButton.style.borderBottomLeftRadius = "4px";

                if (window.innerWidth > 640) {
                    var modxBtnElems = document.getElementById("modx-action-buttons");
                    fullscreenButton.style.top = modxBtnElems.offsetTop + modxBtnElems.offsetHeight + \'px\';
                } else {
                    fullscreenButton.style.top = 0;
                }
            } else {
                fullscreenButton.style.position = "absolute";
                fullscreenButton.style.top = "-24px";
                fullscreenButton.style.right = "0";
                fullscreenButton.style[\'z-index\'] = null;

                fullscreenButton.style.borderTopRightRadius = "4px";
                fullscreenButton.style.borderTopLeftRadius = "4px";
                fullscreenButton.style.borderBottomRightRadius = null;
                fullscreenButton.style.borderBottomLeftRadius = null;
            }
        };
        
        /** 
         * Function to handle fullscreen (toggle)
         */
        var handleFullScreen = function(editor, fullscreenButton) {
            // Toggle class
            dom.toggleCssClass(editor.container, "fullScreen");
            // Get current situation
            var isFullScreen = dom.hasCssClass(editor.container, "fullScreen");
            // Set size and resize as needed
            setEditorSize(editor.container, isFullScreen);
            editor.resize();
            // Handle searchbox position as needed
            handleSearchBoxPosition(editor, isFullScreen);
            if (fullscreenButton) {
                // Handle fullscreen toggle position
                handleFullScreenButtonPosition(fullscreenButton, isFullScreen);
            }
        };
        
        /** 
         * Function to handle searchbox (show/hide)
         */
        var handleSearchBox = function(editor, isReplace) {
            // Load extension
            ace.config.loadModule("ace/ext/searchbox", function(e) {
                // Launch searchbox
                e.Search(editor, isReplace);
                // Handle searchbox position
                handleSearchBoxPosition(editor, dom.hasCssClass(editor.container, "fullScreen"));
            });
        };
        
        /** 
         * Function to handle searchbox position depending on fullscreen or not
         */
        var handleSearchBoxPosition = function(editor, isFullScreen) {
            if (!editor.searchBox) return;
            
            if (isFullScreen) {
                // If fullscreen, put searchbox on bottom
                editor.searchBox.element.style.top = \'auto\';
                editor.searchBox.element.style.bottom = \'0\';
            } else {
                // If not, unset any specific style value previously set
                editor.searchBox.element.style.top = null;
                editor.searchBox.element.style.bottom = null;
            }
        };
    
        /** 
         * Function to create a mixed mode with MODX tags
         * Based on the work of danyaPostfactum, see link below
         * https://github.com/danyaPostfactum/modx-ace/blob/master/assets/components/ace/modx.texteditor.js
         */
        var createModxMixedMode = function(Mode) {
            var oop = ace.require("ace/lib/oop");
            
            /* Create the new mixed mode */
            var ModxMixedMode = function() {
                Mode.call(this);
                
                // Save the parent rules to be able to call them later
                var parentHighlightRules = this.HighlightRules;
                
                /* Create the new mixed rules */
                var mixedHighlightRules = function() {
                    // Set parent rules
                    parentHighlightRules.call(this);
                    
                    // Set modx rules (function available in file modx_highlight_rules.js already loaded)
                    modxCustomHighlightRules.call(this);
                    
                    // Normalized!
                    this.normalizeRules();
                };
                
                // Inherit prototype from parent rules
                oop.inherits(mixedHighlightRules, parentHighlightRules);
                
                // Set mixed highlight rules
                this.HighlightRules = mixedHighlightRules;
            };
            
            // Inherit prototype from parent Mode
            oop.inherits(ModxMixedMode, Mode);
            
            // Handle the case were a worker is defined in parent mode
            if (Mode.prototype.createWorker) {
                ModxMixedMode.prototype.createWorker = function(session) {
                    // Call parent without \'this\'
                    var worker = Mode.prototype.createWorker(session);
                    if (worker) {
                        // Replace onError function to handle modx tag
                        worker.on("error", function(e) {
                            var annotations = [];
                            var idx_max = e.data.length;
                            // Loop through errors, and silence errors when a modx tag [[ exists
                            for(var i = 0 ; i < idx_max ; i++) {
                                // Get line
                                var line = session.getLine(e.data[i].row);
                                if (line.indexOf(\'[[\') === -1) {
                                    // No modx tag, add to annotations
                                    annotations.push(e.data[i]);
                                }
                            }
                            session.setAnnotations(annotations);
                        });
                    }
                    return worker;
                };
            }
            
            // We\'re done. Return the new mixed mode
            return new ModxMixedMode();
        };
        
        /** 
         * Function to set a mixed mode
         */
        var setMixedMode = function(editor, mode) {
            var config = ace.require(\'ace/config\');
            config.loadModule(["mode", \'ace/mode/\' + mode], function(module) {
                var mode = createModxMixedMode(module.Mode);
                editor.session.setMode(mode);
            }.bind(this));
        };
        
        /**
         * Function to fix issue with TV\'s and cursor always jumping around 
         * (see issue #14 on Github)
         *
         * Issue is related to how the size seems to be computed by Ace
         * If the textarea is hidden (like move away from screen, which is 
         * the case for TV in other tabs), Ace has issue computing the proper size.
         *
         * Hence we try to be clever and call resize as soon as we can.
         *
         * This is clearly hackish, feel free to offer a PR if you have a better idea...
         */
        var fixJumpingCursorIssue = function(editor, currentSession, aceEditorDiv) {
            
            // Force resize on first cursor change or on mousemove
            // Should work for all browsers
            // Downside: editor content not visible until one of the event happens
            var onChangeCursorCallBack = function() {
                // Resize - this is important
        		editor.resize();
                // Remove all listeners for performance reason as they are not needed anymore
        		currentSession.selection.off(\'changeCursor\', onChangeCursorCallBack);
        		editor.off(\'mousemove\', onChangeCursorCallBack);
            };
            // Add event listeners
            currentSession.selection.on(\'changeCursor\', onChangeCursorCallBack);
            editor.on(\'mousemove\', onChangeCursorCallBack);
            
            // Force resize as soon as the editor become visible
            // Uses IntersectionObserver, hence browser support is not good: Chrome 51+, Edge 15+, FF 55+
            if (\'IntersectionObserver\' in window) {
                // Create observer from document
                var observer = new IntersectionObserver(function(entries, observer) {
                    // Check if editor is visible
                    if (entries[0].intersectionRatio > 0) {
                        // Run callback to remove all other listeners
                        onChangeCursorCallBack();
                        // Remove observer for performance reader, this is not needed anymore
                        observer.disconnect();
                    }
                }, { root: document.documentElement });
                // Start observing for ace node
                observer.observe(aceEditorDiv);
            }
        }

        // Start searching!
        {$tryToGetTextArea}
        
    });
</script>
HTML;

    $modx->controller->addHtml($script);
}',
      'locked' => '0',
      'properties' => 'a:17:{s:7:"AcePath";a:7:{s:4:"name";s:7:"AcePath";s:4:"desc";s:51:"URL or path to ACE javascript file (and extensions)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:55:"https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js";s:7:"lexicon";N;s:4:"area";s:0:"";}s:5:"Theme";a:7:{s:4:"name";s:5:"Theme";s:4:"desc";s:89:"editor theme name (you can test them all here: https://ace.c9.io/build/kitchen-sink.html)";s:4:"type";s:4:"list";s:7:"options";a:37:{i:0;a:2:{s:4:"text";s:21:"Chrome (bright theme)";s:5:"value";s:6:"chrome";}i:1;a:2:{s:4:"text";s:21:"Clouds (bright theme)";s:5:"value";s:6:"clouds";}i:2;a:2:{s:4:"text";s:29:"Crimson Editor (bright theme)";s:5:"value";s:14:"crimson_editor";}i:3;a:2:{s:4:"text";s:19:"Dawn (bright theme)";s:5:"value";s:4:"dawn";}i:4;a:2:{s:4:"text";s:26:"Dreamweaver (bright theme)";s:5:"value";s:11:"dreamweaver";}i:5;a:2:{s:4:"text";s:22:"Eclipse (bright theme)";s:5:"value";s:7:"eclipse";}i:6;a:2:{s:4:"text";s:21:"GitHub (bright theme)";s:5:"value";s:6:"github";}i:7;a:2:{s:4:"text";s:23:"IPlastic (bright theme)";s:5:"value";s:8:"iplastic";}i:8;a:2:{s:4:"text";s:30:"Solarized Light (bright theme)";s:5:"value";s:15:"solarized_light";}i:9;a:2:{s:4:"text";s:23:"TextMate (bright theme)";s:5:"value";s:8:"textmate";}i:10;a:2:{s:4:"text";s:23:"Tomorrow (bright theme)";s:5:"value";s:8:"tomorrow";}i:11;a:2:{s:4:"text";s:20:"XCode (bright theme)";s:5:"value";s:5:"xcode";}i:12;a:2:{s:4:"text";s:21:"Kuroir (bright theme)";s:5:"value";s:6:"kuroir";}i:13;a:2:{s:4:"text";s:26:"KatzenMilch (bright theme)";s:5:"value";s:11:"katzenmilch";}i:14;a:2:{s:4:"text";s:25:"SQL Server (bright theme)";s:5:"value";s:9:"sqlserver";}i:15;a:2:{s:4:"text";s:21:"Ambiance (dark theme)";s:5:"value";s:8:"ambiance";}i:16;a:2:{s:4:"text";s:18:"Chaos (dark theme)";s:5:"value";s:5:"chaos";}i:17;a:2:{s:4:"text";s:28:"Clouds Midnight (dark theme)";s:5:"value";s:15:"clouds_midnight";}i:18;a:2:{s:4:"text";s:20:"Dracula (dark theme)";s:5:"value";s:7:"dracula";}i:19;a:2:{s:4:"text";s:19:"Cobalt (dark theme)";s:5:"value";s:6:"cobalt";}i:20;a:2:{s:4:"text";s:20:"Gruvbox (dark theme)";s:5:"value";s:7:"gruvbox";}i:21;a:2:{s:4:"text";s:27:"Green on Black (dark theme)";s:5:"value";s:3:"gob";}i:22;a:2:{s:4:"text";s:25:"idle Fingers (dark theme)";s:5:"value";s:12:"idle_fingers";}i:23;a:2:{s:4:"text";s:20:"krTheme (dark theme)";s:5:"value";s:8:"kr_theme";}i:24;a:2:{s:4:"text";s:22:"Merbivore (dark theme)";s:5:"value";s:9:"merbivore";}i:25;a:2:{s:4:"text";s:27:"Merbivore Soft (dark theme)";s:5:"value";s:14:"merbivore_soft";}i:26;a:2:{s:4:"text";s:28:"Mono Industrial (dark theme)";s:5:"value";s:15:"mono_industrial";}i:27;a:2:{s:4:"text";s:20:"Monokai (dark theme)";s:5:"value";s:7:"monokai";}i:28;a:2:{s:4:"text";s:27:"Pastel on dark (dark theme)";s:5:"value";s:14:"pastel_on_dark";}i:29;a:2:{s:4:"text";s:27:"Solarized Dark (dark theme)";s:5:"value";s:14:"solarized_dark";}i:30;a:2:{s:4:"text";s:21:"Terminal (dark theme)";s:5:"value";s:8:"terminal";}i:31;a:2:{s:4:"text";s:27:"Tomorrow Night (dark theme)";s:5:"value";s:14:"tomorrow_night";}i:32;a:2:{s:4:"text";s:32:"Tomorrow Night Blue (dark theme)";s:5:"value";s:19:"tomorrow_night_blue";}i:33;a:2:{s:4:"text";s:34:"Tomorrow Night Bright (dark theme)";s:5:"value";s:21:"tomorrow_night_bright";}i:34;a:2:{s:4:"text";s:31:"Tomorrow Night 80s (dark theme)";s:5:"value";s:23:"tomorrow_night_eighties";}i:35;a:2:{s:4:"text";s:21:"Twilight (dark theme)";s:5:"value";s:8:"twilight";}i:36;a:2:{s:4:"text";s:24:"Vibrant Ink (dark theme)";s:5:"value";s:11:"vibrant_ink";}}s:5:"value";s:7:"monokai";s:7:"lexicon";N;s:4:"area";s:0:"";}s:9:"SoftWraps";a:7:{s:4:"name";s:9:"SoftWraps";s:4:"desc";s:82:"Set editor soft wraps (either `off`, `free`, `printMargin` or a number of columns)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"off";s:7:"lexicon";N;s:4:"area";s:0:"";}s:8:"FontSize";a:7:{s:4:"name";s:8:"FontSize";s:4:"desc";s:42:"Set editor font size (in px, em, rem or %)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"12px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:8:"SoftTabs";a:7:{s:4:"name";s:8:"SoftTabs";s:4:"desc";s:64:"Enable soft tabs (4 spaces) instead of hard tabs (tab character)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"ReplaceCTRLDKbdShortcut";a:7:{s:4:"name";s:23:"ReplaceCTRLDKbdShortcut";s:4:"desc";s:175:"Replace the CTRL-D (or CMD-D) keyboard shortcut to perform a more sensible action: duplicate the current line or selection (instead of deleting, which is the default behavior)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"Autocompletion";a:7:{s:4:"name";s:14:"Autocompletion";s:4:"desc";s:207:"Enable Autocompletion: none, basic (show on CTRL-Space) or live (show on typing) - Note that "ext-language_tools.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-language_tools.js)";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:4:"None";s:5:"value";s:4:"none";}i:1;a:2:{s:4:"text";s:26:"Basic (show on CTRL-SPACE)";s:5:"value";s:5:"basic";}i:2;a:2:{s:4:"text";s:21:"Live (show on typing)";s:5:"value";s:4:"live";}}s:5:"value";s:5:"basic";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"SettingsMenu";a:7:{s:4:"name";s:12:"SettingsMenu";s:4:"desc";s:177:"Add a settings menu accessible with CTR-Q (or CMD-Q) - Note that "ext-settings_menu.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-settings_menu.js)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:10:"Spellcheck";a:7:{s:4:"name";s:10:"Spellcheck";s:4:"desc";s:136:"Enable spellcheck - Note that "ext-spellcheck.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-spellcheck.js)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:9:"EmmetPath";a:7:{s:4:"name";s:9:"EmmetPath";s:4:"desc";s:82:"URL or path to Emmet javascript file (see https://github.com/cloud9ide/emmet-core)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:47:"https://cloud9ide.github.io/emmet-core/emmet.js";s:7:"lexicon";N;s:4:"area";s:0:"";}s:5:"Emmet";a:7:{s:4:"name";s:5:"Emmet";s:4:"desc";s:121:"Enable emmet - Note that "ext-emmet.js" must be available alongside ace.js (will be retrieve from <AcePath>/ext-emmet.js)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"AcePrintMarginColumn";a:7:{s:4:"name";s:20:"AcePrintMarginColumn";s:4:"desc";s:164:"Print margin column position - Set the character position of the print margin (for instance useful if you like to code with 80 chars wide max) - Set to 0 to disable";s:4:"type";s:11:"numberfield";s:7:"options";s:0:"";s:5:"value";s:1:"0";s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"ChunkDetectMIMEShebang";a:7:{s:4:"name";s:22:"ChunkDetectMIMEShebang";s:4:"desc";s:142:"Enable \'shebang-style\' MIME detection for chunks (in description or in the first line of chunk content) - See README for supported MIME values";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:26:"ToggleFullScreenKeyBinding";a:7:{s:4:"name";s:26:"ToggleFullScreenKeyBinding";s:4:"desc";s:90:"Key binding used to toggle editor fullscreen (example: Ctrl-P or F11 or anything you want)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"F11";s:7:"lexicon";N;s:4:"area";s:0:"";}s:26:"ToggleFullScreenShowButton";a:7:{s:4:"name";s:26:"ToggleFullScreenShowButton";s:4:"desc";s:65:"Display the toggle fullscreen button (on top right of the editor)";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"EditorHeight";a:7:{s:4:"name";s:12:"EditorHeight";s:4:"desc";s:35:"Editor height (in px, em, rem or %)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"EditorTVHeight";a:7:{s:4:"name";s:14:"EditorTVHeight";s:4:"desc";s:95:"Editor height for template vars - take precedence over EditorHeight value (in px, em, rem or %)";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'TinyMCERTE',
      'description' => '',
      'editor_type' => '0',
      'category' => '3',
      'cache_type' => '0',
      'plugincode' => '/**
 * TinyMCE Rich Tech Editor
 *
 */
$corePath = $modx->getOption(\'tinymcerte.core_path\', null, $modx->getOption(\'core_path\', null, MODX_CORE_PATH) . \'components/tinymcerte/\');
/** @var TinyMCERTE $tinymcerte */
$tinymcerte = $modx->getService(
    \'tinymcerte\',
    \'TinyMCERTE\',
    $corePath . \'model/tinymcerte/\',
    array(
        \'core_path\' => $corePath
    )
);

$className = \'TinyMCERTE\' . $modx->event->name;
$modx->loadClass(\'TinyMCERTEPlugin\', $tinymcerte->getOption(\'modelPath\') . \'tinymcerte/events/\', true, true);
$modx->loadClass($className, $tinymcerte->getOption(\'modelPath\') . \'tinymcerte/events/\', true, true);
if (class_exists($className)) {
    /** @var TinyMCERTEPlugin $handler */
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
}
return;',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'mgr' => 
      array (
        0 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'events' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_unpack' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'set_sudo' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
          ),
        ),
      ),
    ),
  ),
);