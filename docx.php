<?php

// Include TinyButStrong and OpenTBS
require_once('tbs_class.php'); // TinyButStrong engine
require_once('tbs_plugin_opentbs.php'); // OpenTBS plugin

// Initialize TinyButStrong (TBS) and load OpenTBS plugin
$TBS = new clsTinyButStrong;
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

// Load the PPTX template
$template = 'template.docx'; // Path to your PPTX file
$TBS->LoadTemplate($template);

// Path to the new image you want to insert
$new_image = 'qrcode.png'; // Path to your image (ensure it exists)

// Replace the placeholder shape with the Alt Text "qrcode" with the new image
$TBS->PlugIn(OPENTBS_CHANGE_PICTURE, 'qrcode', $new_image);
$TBS->Source = str_replace('{name}', 'John Doe', $TBS->Source);

// Save the updated PPTX file
$outputFile = 'update.docx';
$TBS->Show(OPENTBS_FILE, $outputFile);

echo "The placeholder image has been replaced with the new image successfully!";

?>
