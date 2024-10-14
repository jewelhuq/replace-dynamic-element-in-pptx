<?php

// Include TinyButStrong and OpenTBS
require_once('tbs_class.php'); // TinyButStrong engine
require_once('tbs_plugin_opentbs.php'); // OpenTBS plugin

// Initialize TinyButStrong (TBS) and load OpenTBS plugin
$TBS = new clsTinyButStrong;
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

// Load the PPTX template
$template = 'template.pptx'; // Path to your PPTX file
$TBS->LoadTemplate($template);

// Replace the placeholder {name} with the text "maza"

$TBS->Source = str_replace('{name}', 'John Doe', $TBS->Source);
// Save the updated PPTX file
$outputFile = 'presentation_updated.pptx';
$TBS->Show(OPENTBS_FILE, $outputFile);

echo "The placeholder {name} has been replaced with 'maza' successfully!";

?>
