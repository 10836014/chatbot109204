<?php
$data = [
"_token" => "sdvjsivnkjhkijcl",
"task" => "save",
"add" => ["id"=>[0=>"256", 1=>"257"]], ["value"=>[0=>"www", 1=>"qqq"]]
];

$test = [0=>"256", 1=>"257"];

// print(json_encode($data));
// foreach ($data["add"]["id"] as $key => $data["add"]["value"]) {
//     echo($key."=>".$id);
//     echo($data["add"]["value"][$key]);
// }
foreach ($data['add']['id'] as $key => $new_option) {
    $newData[] = [
        'id' => $data['id'][$key],
        'value' => $data['value'][$key]
    ];
}
var_dump($newData);
// var_dump($data["add"]);
// var_dump($data["add"]);
