<?php include '../admin/adminheader.php'; ?>
<main>

    <h5>Add Vehicle</h5>
  <form id="add_vehicle_form" action="." method="post">
  <input type="hidden" name="action" value="add_vehicle">
      <div class="col-2 mb-2">
          <label>Make:</label>
        <select class="form-select" name="make_id">
        <?php foreach ( $makes as $make ) : ?>
            <option value="<?php echo $make['makeID']; ?>">
                <?php echo $make['makeName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="col-2 mb-2">
          <label>Type:</label>
        <select class="form-select" name="type_id">
        <?php foreach ( $types as $type) : ?>
            <option value="<?php echo $type['typeID']; ?>">
                <?php echo $type['typeName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>
      <div class="col-2 mb-2">
          <label>Class</label>
        <select class="form-select" name="class_id">
        <?php foreach ( $classes as $class ) : ?>
            <option value="<?php echo $class['classID']; ?>">
                <?php echo $class['className']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </div>

      <label>Year:</label>
      <div class="col-4 mb-2">
          <input type="text" name="year" />
      </div>
        
      <label>Model:</label>
      <div class="col-4 mb-2">
          <input type="text" name="model" />
      </div>

      <label>Price:</label>
      <div class="col-4 mb-2">
          <input type="text" name="price" />
      </div>

        <label>&nbsp;</label>
        <div class="mb-2">
          <input type="submit" value="Add Vehicle"/>
      </div>
  </form>
      <p><a href="?action=list_vehicles">View Full Vehicle List</a><br>
        <a href="?action=list_makes">View/Edit Vehicle Makes</a><br> 
        <a href="?action=list_types">View/Edit Vehicle Types</a><br>
        <a href="?action=list_classes">View/Edit Vehicle Classes</a></p>            
    </section>
</main>
<?php include '../view/footer.php'; ?>