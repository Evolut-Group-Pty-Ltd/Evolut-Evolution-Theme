<?php
$table = __( $args['table'] );
if (!empty($table)) {
?>
<div class="table__container container">
<?php
// $table = get_field( 'your_table_field_name' );
if ( ! empty ( $table ) ) {
	$i = 0;
    echo '<table border="0" class="table__table">';
        if ( ! empty( $table['caption'] ) ) {
            echo '<caption  class="table__caption">' . $table['caption'] . '</caption>';
        }
        if ( ! empty( $table['header'] ) ) {
            echo '<thead class="table__thead">';
                echo '<tr class="table__tr">';
                    foreach ( $table['header'] as $th ) {
                    	$i++;
                    	if ($i==1) {
                    		echo '<th class="table__th ' . $th['c'] . '" style ="text-align: left">';
                    	} else {
                    		echo '<th class="table__th ' . $th['c'] . '" style ="text-align: center">';
                    	}
                            echo $th['c'];
                        echo '</th>';
                    }
                echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody class="table__tbody">';
            foreach ( $table['body'] as $tr ) {
            	$i = 0;
                echo '<tr class="table__tr">';
                    foreach ( $tr as $td ) {
                    	$i++;
                    	if ($i==1) {
                    		echo '<td class="table__td" style ="text-align: left">';
                    	} else {
                    		echo '<td class="table__td" style ="text-align: center">';
                    	}
                        if ($td['c'] == "YES") {
                        	echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21.0001 12.07V13C20.9975 17.4287 18.0824 21.3282 13.8354 22.5839C9.58847 23.8396 5.02145 22.1523 2.61101 18.4371C0.200573 14.7218 0.52092 9.86365 3.39833 6.49708C6.27574 3.13051 11.0248 2.05753 15.0701 3.86001" stroke="#5A287F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M22 4L11 15L8 12" stroke="#5A287F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';
                        } elseif ($td['c'] == "WIP") {
                        	echo '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 4V10H16" stroke="#DB8E33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19.4901 15C18.1547 18.7798 14.4804 21.2207 10.4785 20.9866C6.47661 20.7525 3.11198 17.8997 2.22645 13.99C1.34092 10.0803 3.14798 6.05626 6.65844 4.12062C10.1689 2.18499 14.5364 2.80448 17.3701 5.63998L22.0001 9.99998" stroke="#DB8E33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>';
                        } else {
                            echo $td['c'];
                        }
                        echo '</td>';
                    }
                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';
}
?>
</div>
<?php } ?>
 