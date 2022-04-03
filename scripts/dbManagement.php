<?PHP
// Execute database management scripts

function runScript($fileName)
{
    $cmd = "cd .. && sh ./scripts/" . $fileName;
    shell_exec($cmd);
}

$importDone = false;
$exportDone = false;
$restoreDone = false;

if ($_POST['import'] == 1) {
    runScript("import_dbs.sh");
    $importDone = true;
}

if ($_POST['export'] == 1) {
    runScript("export_dbs.sh");
    $exportDone = true;
}

if ($_POST['restore_default'] == 1) {
    runScript("restore_default_dbs.sh");
    $restoreDone = true;
}
?>