<?php

require_once("index.php");

function celsiusToFahrenheit($celsius)
{
    $fahrenheit = ($celsius * 9 / 5) + 32;
    return $fahrenheit;
}

function fahrenheitToCelsius($fahrenheit)
{
    $celsius = ($fahrenheit - 32) * 5 / 9;
    return $celsius;
}

function celsiusToKelvin($celsius)
{
    $kelvin = $celsius + 273.15;
    return $kelvin;
}

function kelvinToCelsius($kelvin)
{
    $celsius = $kelvin - 273.15;
    return $celsius;
}

function fahrenheitToKelvin($fahrenheit)
{
    $kelvin = ($fahrenheit + 459.67) * 5 / 9;
    return $kelvin;
}

function kelvinToFahrenheit($kelvin)
{
    $fahrenheit = ($kelvin * 9 / 5) - 459.67;
    return $fahrenheit;
}

function convertTemperature($temperature, $inputUnit, $outputUnit)
{
    $result = 0;

    switch ($inputUnit) {
        case 'C':
            switch ($outputUnit) {
                case 'F':
                    $result = celsiusToFahrenheit($temperature);
                    break;
                case 'K':
                    $result = celsiusToKelvin($temperature);
                    break;
                default:
                    $result = null;
            }
            break;
        case 'F':
            switch ($outputUnit) {
                case 'C':
                    $result = fahrenheitToCelsius($temperature);
                    break;
                case 'K':
                    $result = fahrenheitToKelvin($temperature);
                    break;
                default:
                    $result = null;
            }
            break;
        case 'K':
            switch ($outputUnit) {
                case 'C':
                    $result = kelvinToCelsius($temperature);
                    break;
                case 'F':
                    $result = kelvinToFahrenheit($temperature);
                    break;
                default:
                    $result = null;
            }
            break;

        default:
            $result = null;
    }

    return $result;
}



$result = convertTemperature($_GET["temp"], $_GET["unit1"], $_GET["unit2"]);

echo "<fieldset>";

if ($result === null)
    echo "Please select different units";
else
    echo $result . "º" . $_GET["unit2"];

echo "</fieldset>";
