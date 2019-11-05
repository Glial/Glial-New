<?php

function color_status($code_http)
{

    switch($code_http)
    {
        case '200':
            return 'success';
            break;
    }
}

?>

<table class="table table-condensed table-bordered table-striped">


    <tr>
        <th><?=__("Date","fr") ?></th>
        <th>HTTP_Status</th>
        <th>Method</th>
        <th><?=__("Link") ?></th>
        <th>dfw</th>
    </tr>

    <?php

    foreach($data['stats'] as $stats)
    {
        echo '<tr>';

        echo '<td>'.$stats['date'].'</td>';
        echo '<td class="'.color_status($stats['http_status']).'">'.$stats['http_status'].'</td>';
        echo '<td>'.$stats['http_method'].'</td>';
        echo '<td>'.substr($stats['link'],0,50).'</td>';
        echo '<td></td>';

        echo '</tr>';

    }


    ?>
</table>