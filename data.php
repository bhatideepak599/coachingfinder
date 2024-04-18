<?php
// PHP code for fixed data
if (isset($_GET['action']) && $_GET['action'] === 'get_data') {
    $data = array(
        'Category A' => 30,
        'Category B' => 50,
        'Category C' => 70,
        'Category D' => 90,
    );

    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
