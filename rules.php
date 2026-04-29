<?php

function checkTemperature($data)
{
    if ($data['value'] > 100) {
        $data['status'] = 'HIGH';
        $data['message'] = 'Fever detected';
    } else {
        $data['status'] = 'NORMAL';
        $data['message'] = 'Temperature normal';
    }

    return $data;
}

function checkPulse($data)
{
    if ($data['value'] > 100) {
        $data['status'] = 'HIGH';
        $data['message'] = 'Pulse rate high';
    } else {
        $data['status'] = 'NORMAL';
        $data['message'] = 'Pulse normal';
    }

    return $data;
}

function checkBloodPressure($data)
{
    list($sys, $dia) = explode('/', $data['value']);
    $sys = (int) $sys;
    $dia = (int) $dia;

    if ($sys > 130 || $dia > 90) {
        $data['status'] = 'HIGH';
        $data['message'] = 'BP high';
    } else {
        $data['status'] = 'NORMAL';
        $data['message'] = 'BP normal';
    }

    return $data;
}
