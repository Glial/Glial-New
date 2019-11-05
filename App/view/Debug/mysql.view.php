<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if (count($data['mysql']) != 0) {
    echo "<table id=\"table\" class=\"table table-condensed table-bordered table-striped\">";
    echo "<tr><th>#</th><th>File</th><th>Line</th><th>Query</th><th>Rows</th><th>Last inserted id</th><th>Time</th></tr>";
    $i = 0;
    $j = 0;
    $k = 0;
    foreach ($data['mysql'] as $value) {
        echo "<tr><td>" . $k . "</td>"
        . "<td>" . $value['file'] . "</td>"
        . "<td>" . $value['line'] . "</td>"
        . "<td>" . SqlFormatter::highlight($value['query']) . "</td>"
        . "<td>" . $value['rows'] . "</td>"
        . "<td>" . $value['last_id'] . "</td>"
        . "<td>" . round($value['time'] * 1000, 3) . " ms</td></tr>";
        $i += $value['time'];
        $j += $value['rows'];
        $k++;

        echo '<tr>';

        if (!empty($value['explain'])) {
            echo '<td colspan="7">';

            
            
            echo '<table class="explain">';
            
            $keys = array_keys($value['explain']['query_block']['table']);
            
            echo '<tr>';
            foreach($keys as $key)
            {
                echo '<th>'.$key.'</th>';
            }
            echo '</tr>';
            
            echo '<tr>';
            foreach ($keys as $key)
            {
                if (is_array($value['explain']['query_block']['table'][$key]))
                {
                    echo '<td>';
                    
                    foreach($value['explain']['query_block']['table'][$key] as $val)
                    {
                        echo $val."<br />";
                    }
                    echo '</td>';
                }
                else
                {
                    echo '<td>'.$value['explain']['query_block']['table'][$key].'</td>';
                }
            }
            echo '</tr>';
            echo '</table>';



            echo '</td>';
        }
        echo '</tr>';
    }

    echo "<tr><td colspan=\"4\"><b>Total</b></td><td>" . $j . "</td><td></td><td><b>" . round($i * 1000, 3) . " ms</b></td></tr>";
    echo "</table>";
}