<?php
$output = array();
$index =0;
function multi_to_single_dimension($input)
{
 global $output;
 global $index;
    foreach($input as $key => $value)
    {
        if(is_array($value))
        {
            multi_to_single_dimension($value);
        }
        else
        {
            $output[$index++] = $value;
        }
    }

    return $output;
}

$input = [2,3,[4,5],[6,7],8];

print_r(multi_to_single_dimension($input));
