<?php 
    function fotmatTextForValue($source)
    {
        $final = str_replace("'", "&apos;", $source );
        $final = str_replace("\"", "&quot;", $final );
        print_r($final);
    }
    $str = 'This is Mahin\'s playground and "This is it"';
    
?>

<input type="text" value='<?php  fotmatTextForValue($str); ?>' style="width: 400px">




