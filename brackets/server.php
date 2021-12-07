<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/db_process.php');

$data = json_decode(file_get_contents('php://input'), true);
var_dump($data['string']);

function bracket($string, $bracket_map = false) {
    $bracket_map = $bracket_map ?: [ '[' => ']', '{' => '}', '(' => ')',  '/' => '\\'];
    $bracket_map_flipped = array_flip($bracket_map);
    $length = mb_strlen($string);
    $brackets_stack = [];
    for ($i = 0; $i < $length; $i++) {
        $current_char = $string[$i];
        if (isset($bracket_map[$current_char])) {
            $brackets_stack[] = $bracket_map[$current_char];
        } else if (isset($bracket_map_flipped[$current_char])) {
            $expected = array_pop($brackets_stack);
            if (($expected === NULL) || ($current_char != $expected)) {
                return false;
            }
        }
    }
    return empty($brackets_stack);
}

$response = bracket($data['string']);

$query = sprintf("INSERT INTO feedback (`string`, `result`) VALUES ('%s', '%s')", $string, $response);
$dbResult = mysqli_query($link, $query);

exit(json_encode($response));

?>