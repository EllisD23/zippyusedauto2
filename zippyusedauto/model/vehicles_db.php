<?php

function get_vehicles_by_ID($make_id, $type_id, $class_id, $order_list){
   global $db;
   if($order_list == 'price'){
          if($make_id && $type_id && $class_id){
          $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                         LEFT JOIN makes m ON v.makeID = m.makeID 
                         LEFT JOIN types t ON v.typeID = t.typeID 
                         LEFT JOIN classes c ON v.classID = c.classID 
                         WHERE v.makeID = :make_id AND v.typeID = :type_id AND v.classID = :class_id
                         ORDER BY v.price DESC';
          }else if ($make_id) {
               $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                         LEFT JOIN types t ON v.typeID = t.typeID 
                         LEFT JOIN classes c ON v.classID = c.classID 
                         LEFT JOIN makes m ON v.makeID = m.makeID 
                         WHERE v.makeID = :make_id
                         ORDER BY v.price DESC';
          } else if($type_id) {
               $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                         LEFT JOIN makes m ON v.makeID = m.makeID 
                         LEFT JOIN classes c ON v.classID = c.classID 
                         LEFT JOIN types t ON v.typeID = t.typeID 
                         WHERE v.typeID = :type_id
                         ORDER BY v.price DESC';
          }else if($class_id){
          $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                         LEFT JOIN makes m ON v.makeID = m.makeID 
                         LEFT JOIN types t ON v.typeID = t.typeID 
                         LEFT JOIN classes c ON v.classID = c.classID 
                         WHERE v.classID = :class_id
                         ORDER BY v.price DESC';
          }else{
          $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                         LEFT JOIN makes m ON v.makeID = m.makeID 
                         LEFT JOIN types t ON v.typeID = t.typeID 
                         LEFT JOIN classes c ON v.classID = c.classID 
                         ORDER BY v.price DESC';
          }
     }else if($order_list == 'year'){
          if($make_id && $type_id && $class_id){
               $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                              LEFT JOIN makes m ON v.makeID = m.makeID 
                              LEFT JOIN types t ON v.typeID = t.typeID 
                              LEFT JOIN classes c ON v.classID = c.classID 
                              WHERE v.makeID = :make_id AND v.typeID = :type_id AND v.classID = :class_id
                              ORDER BY v.year DESC';
               }else if ($make_id) {
                    $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                              LEFT JOIN types t ON v.typeID = t.typeID 
                              LEFT JOIN classes c ON v.classID = c.classID 
                              LEFT JOIN makes m ON v.makeID = m.makeID 
                              WHERE v.makeID = :make_id
                              ORDER BY v.year DESC';
               } else if($type_id) {
                    $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                              LEFT JOIN makes m ON v.makeID = m.makeID 
                              LEFT JOIN classes c ON v.classID = c.classID 
                              LEFT JOIN types t ON v.typeID = t.typeID 
                              WHERE v.typeID = :type_id
                              ORDER BY v.year DESC';
               }else if($class_id){
               $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                              LEFT JOIN makes m ON v.makeID = m.makeID 
                              LEFT JOIN types t ON v.typeID = t.typeID 
                              LEFT JOIN classes c ON v.classID = c.classID 
                              WHERE v.classID = :class_id
                              ORDER BY v.year DESC';
               }else{
               $query = 'SELECT v.vehicleID, v.year, m.makeName, v.model, t.typeName, c.className, v.price FROM vehicles v 
                              LEFT JOIN makes m ON v.makeID = m.makeID 
                              LEFT JOIN types t ON v.typeID = t.typeID 
                              LEFT JOIN classes c ON v.classID = c.classID 
                              ORDER BY v.year DESC';
               }    
     }
   $statement = $db->prepare($query);
   if ($make_id && $type_id && $class_id) {
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
   }else if($make_id){
        $statement->bindValue(':make_id', $make_id);
   }else if($type_id){
        $statement->bindValue(':type_id', $type_id);
   }else if($class_id){
        $statement->bindValue(':class_id', $class_id);
   }
   $statement->execute();
   $vehicles = $statement->fetchAll();
   $statement->closeCursor();
   return $vehicles;
}

 function get_vehicle($vehicle_id){
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vehicleID = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
 }

 function delete_vehicle($vehicle_id){
     global $db;
     $query = 'DELETE FROM vehicles
               WHERE vehicleID = :vehicle_id';
     $statement = $db->prepare($query);
     $statement->bindValue(':vehicle_id', $vehicle_id);
     $statement->execute();
     $statement->closeCursor();
  }

 function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id){
     global $db;
     $query = 'INSERT INTO vehicles
                (year, model, price, typeID, classID, makeID )
               VALUES
                (:year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
 }

?>