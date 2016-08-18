<?php



//header('Content-Encoding: UTF-8');
//




// Upload file
$target_path = "./uploads/";
$target_path = $target_path . basename( $_FILES['csv-file']['name']);

$outputFilename   = './decks/output.xml';

$inputFile = $_FILES['csv-file']['tmp_name'];
//$inputFile = './uploads/frenchTest.csv';

$tmp = fopen($_FILES['csv-file']['tmp_name'], 'rt');


$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><deck></deck>');



while ( ($line = fgets($tmp)) !== false) {
    echo "$line<br>";

    $card = $xml->addChild('card');
    $card->addChild('rank', 'testA');
    $card->addChild('question', 'testB');
    $card->addChild('answer', 'testC');

}

//Output formatted xml

$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($xml->asXML());
$dom->save($outputFilename);








//$str = file_get_contents($_FILES['csv-file']['tmp_name']);
//$bom = pack("CCC", 0xef, 0xbb, 0xbf);
//if (0 == strncmp($str, $bom, 3)) {
//    echo "BOM detected - file is UTF-8\n";
//   $str = substr($str, 3);
//}


















//echo $str;

//$inputFile = file_put_contents($_FILES['csv-file']['tmp_name'],$str);

// write file

// Get the headers of the file
//$headers = fgetcsv($inputFile);
$headers = array('Rank', 'Question', 'Answer');

// Create a new dom document
$doc  = new DomDocument('1.0', 'utf-8');
$doc->formatOutput   = true;

// Add a root node
//$root = $doc->createElement('rows');
//$root = $doc->appendChild($root);



// Loop through each row creating a <row> node with the correct data
while (($row = fgets($tmp)) !== FALSE)
{

    //echo "$row<br>";
    $columns = explode(",", $row);
    //$card = $root->addChild('card');

    //$container = $doc->createElement('row');
    foreach($columns as $i)
    {



        //$card->addChild('rank', $i);
        //$card->addChild('question', $i);
        //$card->addChild('answer', $i);

        //$child = $doc->createElement($header);
        //$child = $container->appendChild($child);
        //$value = $doc->createTextNode($columns[$i]);
        //$value = $child->appendChild($value);

        //$header = $root->addChild($header);
        //$header->addChild('firstname', 'Someone');


    }

    //$root->appendChild($container);
}

//$root->asXml($outputFilename);
//echo $root->asXML();

//$strxml = $doc->saveXML();
//$handle = fopen($outputFilename, "w");
//fwrite($handle, $strxml);
//fclose($handle);










echo "<br>";

if(move_uploaded_file($_FILES['csv-file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['csv-file']['name']).
        " has been uploaded.";
} else{
    echo "There was an error uploading the file!";
}






echo "<br>" . "<br>";

echo "<b>Uploaded files:</b>";
echo "<br>";

$files = scandir("./uploads/");
$ignore = array(".", "..");

foreach ($files as $doc) {
    if (!in_array($doc, $ignore)) {
        echo $doc . "<br>";
    }

}



?>

<br>
<a href="functionTesting.html">Return to Main Page</a>