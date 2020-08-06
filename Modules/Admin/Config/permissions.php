<?php
$groups = [];

$permGroup = [];
$permGroup["name"] = "Administrator Manager";
$permGroup["group"] = "admin";
$permGroup["permissions"][]=["action"=>"/admin/admin", "label"=>"List Faculties"];
$permGroup["permissions"][]=["action"=>"/admin/admin/trash", "label"=>"List Faculties in Trash"];
$permGroup["permissions"][]=["action"=>"/admin/admin/create", "label"=>"Add New Administrator"];
$permGroup["permissions"][]=["action"=>"/admin/admin/edit", "label"=>"Edit Administrator"];
$permGroup["permissions"][]=["action"=>"/admin/admin/view", "label"=>"View Administrator"];
$permGroup["permissions"][]=["action"=>"/admin/admin/activate", "label"=>"Activate Administrator"];
$permGroup["permissions"][]=["action"=>"/admin/admin/deactivate", "label"=>"Deactivate Administrator"];
$permGroup["permissions"][]=["action"=>"/admin/admin/delete", "label"=>"Move To Administrator Trash"];
$permGroup["permissions"][]=["action"=>"/admin/admin/restore", "label"=>"Restore From Administrator Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Administrator Role Manager";
$permGroup["group"] = "admin_role";
$permGroup["permissions"][]=["action"=>"/admin/admin_role", "label"=>"List Administrator Roles"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/trash", "label"=>"List Administrator Roles in Trash"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/create", "label"=>"Add New Administrator Role"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/edit", "label"=>"Edit Administrator Role"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/view", "label"=>"View Administrator Role"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/activate", "label"=>"Activate Administrator Role"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/deactivate", "label"=>"Deactivate Administrator Role"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/delete", "label"=>"Move To Administrator Roles Trash"];
$permGroup["permissions"][]=["action"=>"/admin/admin_role/restore", "label"=>"Restore From Administrator Roles Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Admin Permission System Manager";
$permGroup["group"] = "admin_permission_system";
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system", "label"=>"List Admin Permission Systems"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/trash", "label"=>"List Admin Permission Systems in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/create", "label"=>"Add New Admin Permission System"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/edit", "label"=>"Edit Admin Permission System"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/view", "label"=>"View Admin Permission System"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/activate", "label"=>"Activate Admin Permission System"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/deactivate", "label"=>"Deactivate Admin Permission System"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/delete", "label"=>"Move To Admin Permission Systems Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_system/restore", "label"=>"Restore From Admin Permission Systems Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Admin Permission Module Manager";
$permGroup["group"] = "admin_permission_module";
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module", "label"=>"List Admin Permission Modules"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/trash", "label"=>"List Admin Permission Modules in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/create", "label"=>"Add New Admin Permission Module"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/edit", "label"=>"Edit Admin Permission Module"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/view", "label"=>"View Admin Permission Module"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/activate", "label"=>"Activate Admin Permission Module"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/deactivate", "label"=>"Deactivate Admin Permission Module"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/delete", "label"=>"Move To Admin Permission Modules Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_module/restore", "label"=>"Restore From Admin Permission Modules Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Admin Permission Group Manager";
$permGroup["group"] = "admin_permission_group";
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group", "label"=>"List Admin Permission Groups"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/trash", "label"=>"List Admin Permission Groups in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/create", "label"=>"Add New Admin Permission Group"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/edit", "label"=>"Edit Admin Permission Group"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/view", "label"=>"View Admin Permission Group"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/activate", "label"=>"Activate Admin Permission Group"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/deactivate", "label"=>"Deactivate Admin Permission Group"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/delete", "label"=>"Move To Admin Permission Groups Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_permission_group/restore", "label"=>"Restore From Admin Permission Groups Trash"];

$groups[]=$permGroup;

$permGroup = [];
$permGroup["name"] = "Admin System Permission Manager";
$permGroup["group"] = "admin_system_permission";
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission", "label"=>"List Admin System Permissions"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/trash", "label"=>"List Admin System Permissions in Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/create", "label"=>"Add New Admin System Permission"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/edit", "label"=>"Edit Admin System Permission"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/view", "label"=>"View Admin System Permission"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/activate", "label"=>"Activate Admin System Permission"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/deactivate", "label"=>"Deactivate Admin System Permission"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/delete", "label"=>"Move To Admin System Permissions Trash"];
$permGroup["permissions"][]=["action"=>"/academic/admin_system_permission/restore", "label"=>"Restore From Admin System Permissions Trash"];

$groups[]=$permGroup;

return [
    "module" => "admin",
    "name" => "Administrator Operations Manager",
    "groups" => $groups
];

