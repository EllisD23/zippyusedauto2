<?php
//require('../zippyusedauto/model/database.php');
require('../zippyusedauto/model/vehicles_db.php');
require('../zippyusedauto/model/types_db.php');
require('../zippyusedauto/model/makes_db.php');
require('../zippyusedauto/model/classes_db.php');

    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
    if($make_id == NULL || $make_id == FALSE){
        $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    }
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
    if($type_id == NULL || $type_id == FALSE){
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    }
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
    if($class_id == NULL || $class_id == FALSE){
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    }
    $order_list = filter_input(INPUT_POST, 'order_list', FILTER_UNSAFE_RAW);
    if (!$order_list){
        $order_list = filter_input(INPUT_GET, 'order_list', FILTER_UNSAFE_RAW);
        if ($order_list == NULL){
            $order_list = 'price';
        }
    }

    $action = filter_input(INPUT_POST,'action', FILTER_UNSAFE_RAW);
    if (!$action){
        $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
        if ($action == NULL){
            $action = 'list_vehicles';
        }
    }


    if ($action == 'list_vehicles') {
        $make_name = get_make_name($make_id);
        $makes = get_makes();
        $type_name = get_type_name($type_id);
        $types = get_types();
        $class_name = get_class_name($class_id);
        $classes = get_classes();
        $vehicles = get_vehicles_by_ID($make_id, $type_id, $class_id, $order_list);
        include('../zippyusedauto/view/vehicle_list.php');
    }
?>
