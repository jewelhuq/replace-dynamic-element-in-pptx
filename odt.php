<?php

// Include TinyButStrong and OpenTBS
require_once('tbs_class.php'); // TinyButStrong engine
require_once('tbs_plugin_opentbs.php'); // OpenTBS plugin

// Initialize TinyButStrong (TBS) and load OpenTBS plugin
$TBS = new clsTinyButStrong;
$TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

// Load the ODP template
$template = 'template.odp'; // Path to your ODP file
$TBS->LoadTemplate($template);

// Path to the new image you want to replace the old image with
$new_image = 'qrcode.png'; // The new image file (make sure this image exists)

// Find the internal image reference in the content.xml
$xml_content = $TBS->Source; // Get the entire XML content
$start_pos = strpos($xml_content, 'draw:name="qrcode"'); // Find the image frame with name="qrcode"

if ($start_pos !== false) {
    // Find the xlink:href attribute inside the <draw:image> tag
    $start_pos = strpos($xml_content, 'xlink:href="', $start_pos) + strlen('xlink:href="');
    $end_pos = strpos($xml_content, '"', $start_pos);
    
    $old_image_path = substr($xml_content, $start_pos, $end_pos - $start_pos);

    // Replace the old image with the new one
    $TBS->PlugIn(OPENTBS_CHANGE_PICTURE, $old_image_path, $new_image);

    // Optional: Delete the old image from the ODP structure if necessary
   $TBS->Source = str_replace('{name}', 'John Doe', $TBS->Source);

    // Save the updated ODP file
    $outputFile = 'presentation_updated.odp';
    $TBS->Show(OPENTBS_FILE, $outputFile);

    echo "The old image '{$old_image_path}' has been replaced successfully!";
} else {
    echo "Image placeholder 'qrcode' not found in the ODP file.";
}

?>