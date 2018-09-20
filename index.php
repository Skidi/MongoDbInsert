<?php

$fullItems = file_get_contents("output.json");
$fullItemsDecode = json_decode($fullItems, true);

$images1 = file_get_contents("570.json");
$images1Decode = json_decode($images1, true);

$images2 = file_get_contents("items.json");
$images2Decode = json_decode($images2, true);
$newJson = array();

foreach($fullItemsDecode["items_game"]["items"] as $key => $value ) {
    $arr["id"]= $key;
    $arr["name"] = $value["name"];
    if(isset($value["item_rarity"])){
        $arr["item_rarity"] = $value["item_rarity"];
    }
    if(isset($value["item_slot"])){
        $arr["item_slot"] = $value["item_slot"];
    }
    if(isset($value["prefab"])){
        $arr["prefab"] = $value["prefab"];
    }

    if(isset($value["used_by_heroes"])){
                
        if(gettype($value["used_by_heroes"]) != "integer"){
            reset($value["used_by_heroes"]);
            $arr["used_by_heroes"] = key($value["used_by_heroes"]);
        }
            
    }
    if(isset($value["image_inventory"])){
        $arr["image_inventory"] = $value["image_inventory"];
    }
    if(isset($images2Decode[$key])) {
        $arr["image_alt1"] = $images2Decode[$key]["path"];
    }
    if(isset($images1Decode[$value["name"]])){
        $arr["image_alt2"] = $images1Decode[$value["name"]];
    }

    array_push($newJson, $arr);
};

$jsonData = json_encode($newJson, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
file_put_contents("final.json", $jsonData);
echo "hello world";