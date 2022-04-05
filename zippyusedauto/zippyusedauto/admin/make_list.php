<?php include '../admin/adminheader.php'; ?>
<main>

    <h5>Vehicle Make List</h5>
    <div class="table-responsive col-2"> 
    <table class="table table-success">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($makes as $make) : ?>
        <tr>
            <td><?php echo $make['makeName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_make" />
                    <input type="hidden" name="make_id"
                           value="<?php echo $make['makeID']; ?>"/>
                    <input type="submit" value="Remove" type="button" class="btn btn-warning">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <h5>Add Vehicle Make</h5>
    <form id="add_make_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_make" />

        <label>Name:</label>
        <div class="col-4 mb-2">
        <input type="text" name="make_name" />
        </div>
        <div class="mb-4">
        <input type="submit" class="btn btn-primary" value="Add Make"/>
        </div>
    </form>

    <p><a href="?action=list_vehicles">View Full Vehicle List</a><br> 
        <a href="?action=add_vehicle_form">Click here</a> to add vehicle <br>
        <a href="?action=list_types">View/Edit Vehicle Types</a><br>
        <a href="?action=list_classes">View/Edit Vehicle Classes</a></p> 

</main>
<?php include '../view/footer.php'; ?>