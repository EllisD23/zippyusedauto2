<?php
//require('../model/database.php');
require('../model/vehicles_db.php');
require('../model/types_db.php');
require('../model/makes_db.php');
require('../model/classes_db.php');

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
        include('../admin/vehicle_list.php');

    }else if($action == 'delete_vehicle'){
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
            delete_vehicle($vehicle_id);
            header("Location: .?vehicle_id=$vehicle_id");
        
    }else if($action == 'list_makes') {
        $makes = get_makes();
        include('../admin/make_list.php');

    }else if($action == 'list_types') {
        $types = get_types();
        include('../admin/type_list.php');

    }else if($action == 'list_classes') {
        $classes = get_classes();
        include('../admin/class_list.php');

    }else if($action == 'add_vehicle_form'){
        $make_name = get_make_name($make_id);
        $makes = get_makes();
        $type_name = get_type_name($make_id);
        $types = get_types();
        $class_name = get_class_name($make_id);
        $classes = get_classes();
        include('../admin/add_vehicle_form.php');

    }else if($action == 'add_vehicle') {
        $year = filter_input(INPUT_POST, 'year');
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST,'price');
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        //$categories = filter_input(INPUT_POST, 'catergories');
        if($year == NULL || $year == FALSE || $model == NULL || $model == FALSE|| $price == NULL || $price == FALSE
        || $type_id == NULL || $type_id == FALSE|| $class_id == NULL || $class_id == FALSE|| $make_id == NULL || $make_id == FALSE){
            $error_message = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
        }else{
            add_vehicle($year, $model, $price, $type_id,$class_id, $make_id);
            header("Location: .?vehicle_id=$vehicle_id");
        }

    }else if($action == 'add_make'){
        $make_name = filter_input(INPUT_POST, 'make_name', FILTER_UNSAFE_RAW);
        if($make_name == NULL || $make_name == FALSE){
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
        }else{
            add_make($make_name);
            header("Location: .?make_id=$make_id");
        }

    }else if($action == 'delete_make'){
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
            try{
                delete_make($make_id);
                header("Location: .?vehicle_id=$vehicle_id");
            }catch(Exception $error_message){
                include("../view/error.php");
            }

    }else if($action == 'add_type'){
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
        if($type_name == NULL || $type_name == FALSE){
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
        }else{
            add_type($type_name);
            header("Location: .?type_id=$type_id");
        }

    }else if($action == 'delete_type'){
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        try{
            delete_type($type_id);
            header("Location: .?vehicle_id=$vehicle_id");
        }catch(Exception $error_message){
            include("../view/error.php");
        }
    
    }else if($action == 'add_class'){
        $class_name = filter_input(INPUT_POST, 'class_name', FILTER_UNSAFE_RAW);
        if($class_name == NULL || $class_name == FALSE){
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/databaseerror.php');
        }else{
            add_class($class_name);
            header("Location: .?class_id=$class_id");
        }

    }else if($action == 'delete_class'){
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        try{
            delete_class($class_id);
            header("Location: .?vehicle_id=$vehicle_id");
        }catch(Exception $error_message){
            include("../view/error.php");
        }
    }


?>