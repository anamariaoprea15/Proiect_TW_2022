<?php
$con=mysqli_connect('loaclhost','root','','catrace');
$fire=mysqli_query($con, "slect * fromn competitions");
$xml=new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);
$xml->startElement('competitions');
    while($row=mysqli_fetch_assoc($fire))
    {
        $xml->startElement('user');
            $xml->startElement('name');
            $xml->writeRaw($row['name']);
            $xml->endElement();
            $xml->startElement('type');
            $xml->writeRaw($row['type']);
            $xml->endElement();
            $xml->startElement('size');
            $xml->writeRaw($row['size']);
            $xml->endElement();
            $xml->startElement('start');
            $xml->writeRaw($row['start']);
            $xml->endElement();
            $xml->startElement('finish');
            $xml->writeRaw($row['finish']);
            $xml->endElement();
            $xml->startElement('id');
            $xml->writeRaw($row['id']);
            $xml->endElement();
        $xml->endElement();
}
$xml->endElement();
header('Content-Type:text/xml');
$xml->flush();


?>