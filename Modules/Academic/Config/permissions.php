<?php
$groups = [];

$permGroup = [];
$permGroup["name"] = "Faculty Manager";
$permGroup["permissions"][]=["action"=>"/academic/faculty", "label"=>"List Faculties"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/trash", "label"=>"List Faculties in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/create", "label"=>"Add New Faculty"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/edit", "label"=>"Edit Faculty"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/view", "label"=>"View Faculty"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/activate", "label"=>"Activate Faculty"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/deactivate", "label"=>"Deactivate Faculty"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/delete", "label"=>"Move To Faculty Trash"];
$permGroup["permissions"][]=["action"=>"/academic/faculty/restore", "label"=>"Restore From Faculty Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Department Manager";
$permGroup["permissions"][]=["action"=>"/academic/department", "label"=>"List Departments"];
$permGroup["permissions"][]=["action"=>"/academic/department/trash", "label"=>"List Departments in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/department/create", "label"=>"Add New Department"];
$permGroup["permissions"][]=["action"=>"/academic/department/edit", "label"=>"Edit Department"];
$permGroup["permissions"][]=["action"=>"/academic/department/view", "label"=>"View Department"];
$permGroup["permissions"][]=["action"=>"/academic/department/activate", "label"=>"Activate Department"];
$permGroup["permissions"][]=["action"=>"/academic/department/deactivate", "label"=>"Deactivate Department"];
$permGroup["permissions"][]=["action"=>"/academic/department/delete", "label"=>"Move To Departments Trash"];
$permGroup["permissions"][]=["action"=>"/academic/department/restore", "label"=>"Restore From Departments Trash"];

$groups[]=$permGroup;

return [
    "groups" => $groups
];

