<?php
$user = getLoggedInUser();


$data_md[0] = array('|competition|', 'start|', 'finish|', 'feline_name|');
$data_md[1] = array('|------------|', '------|', '-------|', '---------|');



$current_races = getCurrentRaces();
$felines = getAllContenstants();
if ($current_races != null) {
    foreach ($current_races as $race) {
        foreach ($felines as $feline) {
            if ($feline->comp_name == $race->name) {
                $data_md[] = array("|", $race->name, "| ", $race->start, "|", $race->finish, "|", $feline->name, "|");
            }
        }
    }
}


$filename = '../public/export/mark.md';

// open csv file for writing
$f = fopen($filename, 'w');

if ($f === false) {
    die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($data_md as $row) {
    foreach ($row as $el) {
        fwrite($f, $el);
    }
    fwrite($f, "\n");
}

// close the file
fclose($f);
