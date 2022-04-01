<?php include '../admin/adminheader.php'; ?>
<main>

  <form action="." method="post">
      <div class="mb-2">
        <select class="form-select" name="make_id" id="make_id">
            <option value="View All Makes">View All Makes</option>
        <?php foreach ( $makes as $make ) : ?>
            <option value="<?php echo $make['makeID']; ?>" <?php if($make['makeID'] == $make_id) echo 'selected' ?> >
                <?php echo $make['makeName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-2">
        <select class="form-select" name="type_id" id="type_id">
            <option value="View All Types">View All Types</option>
        <?php foreach ( $types as $type) : ?>
            <option value="<?php echo $type['typeID']; ?>" <?php if($type['typeID'] == $type_id) echo 'selected' ?>>
                <?php echo $type['typeName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-2">
        <select class="form-select" name="class_id" id="class_id">
            <option value="View All Classes">View All Classes</option>
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['classID']; ?>" <?php if($class['classID'] == $class_id) echo 'selected' ?>">
                <?php echo $class['className']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-2" style="text-align: center;">
      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="order_list" value="price"
        <?php if($order_list == 'price') echo 'checked'?>>
        <label class="form-check-label" for="order_list">Price</label>
      </div>
     <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="order_list" value="year"
        <?php if($order_list == 'year') echo 'checked'?>>
        <label class="form-check-label" for="order_list">Year</label>
      </div>
      <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
  </form>

    <section>
        <!-- display a table of products -->
        <div class="table-responsive">
        <table class="table table-success">
            <thead>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?php echo $vehicle['year']; ?></td>
                <td><?php echo $vehicle['makeName']; ?></td>
                <td><?php echo $vehicle['model']; ?></td>
                <td><?php echo $vehicle['typeName']; ?></td>
                <td><?php echo $vehicle['className']; ?></td>
                <td> <?php echo $vehicle['price']; ?></td>
                <td><form action="index.php" method="post">
                    <input type="hidden" name="action"
                           value="delete_vehicle">
                    <input type="hidden" name="vehicle_id"
                           value="<?php $vehicle['vehicleID']; ?>">
                    <input type="submit" value="Remove" type="button" class="btn btn-warning">
                </form></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <p><a href="?action=add_vehicle_form">Click here</a> to add vehicle <br>
        <a href="?action=list_makes">View/Edit Vehicle Makes</a><br> 
        <a href="?action=list_types">View/Edit Vehicle Types</a><br>
        <a href="?action=list_classes">View/Edit Vehicle Classes</a></p>            
    </section>
</main>
<?php include '../view/footer.php'; ?>