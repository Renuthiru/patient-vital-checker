<?php

echo "<pre>";

include 'validate.php';
include 'rules.php';
include 'scanner.php';
include 'vitals.php';

foreach ($vitals as $vital) {
    $result = null;

    if ($vital['vital_type'] === 'Temperature') {
        $result = validateVital($vital, 'checkTemperature');
    } elseif ($vital['vital_type'] === 'Pulse') {
        $result = validateVital($vital, 'checkPulse');
    } elseif ($vital['vital_type'] === 'BP') {
        $result = validateVital($vital, 'checkBloodPressure');
    }

    if ($result !== null) {
        echo 'Patient: ' . $result['patient_name'] . PHP_EOL;
        echo 'Vital: ' . $result['vital_type'] . PHP_EOL;
        echo 'Value: ' . $result['value'] . PHP_EOL;
        echo 'Status: ' . $result['status'] . PHP_EOL;
        echo 'Message: ' . $result['message'] . PHP_EOL;
        echo '----------------------' . PHP_EOL;
    }
}

echo 'Project Files:' . PHP_EOL;
scanFolder(__DIR__);