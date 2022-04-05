<?php include '../admin/adminheader.php'; ?>
<main>

    <h5>Vehicle Type List</h5>
    <div class="table-responsive col-2"> 
    <table class="table table-success">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($types as $type) : ?>
        <tr>
            <td><?php echo $type['typeName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_type" />
                    <input type="hidden" name="type_id"
                           value="<?php echo $type['typeID']; ?>"/>
                   <input type="submit" value="Remove" type="button" class="btn btn-warning">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <h5>Add Vehicle Type</h5>
    <form id="add_type_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_type" />

        <label>Name:</label>
        <div class="col-4 mb-2">
        <input type="text" name="type_name" />
        </div>
        <div class="mb-4">
        <input type="submit" class="btn btn-primary" value="Add Type"/>
        </div>
    </form>

    <p><a href="?action=list_vehicles">View Full Vehicle List</a><br> 
        <a href="?action=add_vehicle_form">Click here</a> to add vehicle <br>
        <a href="?action=list_makes">View/Edit Vehicle Makes</a><br>
        <a href="?action=list_classes">View/Edit Vehicle Classes</a></p> 

</main>
<?php include '../view/footer.php'; ?>