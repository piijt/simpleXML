<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cars</title>
        <link rel='stylesheet' href='css/mystyles.css'/>
    </head>
    <body>
<?php
        // Read the XML document into a SimpleXMLElement object
        $cars = simplexml_load_file("./data/cars.xml"
                , "SimpleXMLElement"
                , LIBXML_NOCDATA );
?>
        <h1>Second Hand Sardine Cans</h1>
        <table>
<?php
        foreach ($cars->car as $car) {
            $warranty = '';
            if ($car->dealersecurity['buyback'] == 'yes') {
                $warranty = "&#10004;";
            }
            printf("%12s<tr>"
                    . "<td>%s</td>"
                    . "<td>%s</td>"
                    . "<td>%s</td>"
                    . "<td>%s</td>"
                    . "<td class='%s'>&nbsp; &nbsp; &nbsp;</td>"
                    . "<td class='rig'>%10.0f</td>"
                    . "<td>%s</td>\n%12s</tr>\n", 
                    ' ', $car['manufacturer'], $car['model'], $car['year'],
                    $car->meter, $car->color,
                    number_format(floatval($car->price)), 
                    $warranty, ' ';
        }
?>
        </table>
        <p><a href='./index.php'>Return Home</a></p>
    </body>
</html>
