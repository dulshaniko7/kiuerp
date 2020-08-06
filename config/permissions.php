<?php
$groups = [];

//this is a sample group
/*$permGroup = [];
$permGroup["name"] = "Name Of The Group";
$permGroup["group"] = "sample_group_slug"; //underscore separated slug
$permGroup["permissions"][]=["action"=>"/sample", "label"=>"List Samples"];
$permGroup["permissions"][]=["action"=>"/sample/trash", "label"=>"List Samples in Trash"];
$permGroup["permissions"][]=["action"=>"/sample/create", "label"=>"Add New Sample"];
$permGroup["permissions"][]=["action"=>"/sample/edit", "label"=>"Edit Sample"];
$permGroup["permissions"][]=["action"=>"/sample/view", "label"=>"View Sample"];
$permGroup["permissions"][]=["action"=>"/sample/activate", "label"=>"Activate Sample"];
$permGroup["permissions"][]=["action"=>"/sample/deactivate", "label"=>"Deactivate Sample"];
$permGroup["permissions"][]=["action"=>"/sample/delete", "label"=>"Move To Sample Trash"];
$permGroup["permissions"][]=["action"=>"/sample/restore", "label"=>"Restore From Sample Trash"];

$groups[]=$permGroup;*/

return [
    "module" => "default",
    "name" => "Default System Permissions",
    "groups" => $groups
];

