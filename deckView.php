<?php
echo "<br>";
echo "<h2 align = 'center'>Please select a deck to view</h2>";
echo "<html>";
    echo "<body>";
        echo "<div align = 'center'>";
            echo "<select name='id'>";

                $files = scandir("./decks/");
                $ignore = array(".", "..");


                foreach ($files as $doc) {
                    if (!in_array($doc, $ignore)) {
                            echo '<option value="'.$doc.'">'.$doc.'</option>';
                    }
                }
            echo "</select>";
        echo "</div>";
    echo "</body>";
echo "</html>";
?>
<br>
<div align = 'center'>
    <a href="functionTesting.html" >Return to Main Page</a>
</div>