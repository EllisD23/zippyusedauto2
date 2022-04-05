<?php include '../admin/adminheader.php'; ?>
<main>

    <h5>Vehicle Class List</h5>
    <div class="table-responsive col-2"> 
    <table class="table table-success">
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['className']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_class" />
                    <input type="hidden" name="class_id"
                           value="<?php echo $class['classID']; ?>"/>
                    <input type="submit" value="Remove" type="button" class="btn btn-warning">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>

    <h5>Add Vehicle Make</h5>
    <form id="add_class_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_class" />

        <label>Name:</label>
        <div class="col-4 mb-2">
        <input type="text" name="class_name" />
        </div>
        <div class="mb-4">
        <input type="submit" class="btn btn-primary" value="Add Class"/>
        </div>
    </form>

    <p><a href="?action=list_vehicles">View Full Vehicle List</a><br> 
        <a href="?action=add_vehicle_form">Click here</a> to add vehicle <br>
        <a href="?action=list_makes">View/Edit Vehicle Makes</a><br>
        <a href="?action=list_types">View/Edit Vehicle Types</a></p> 

</main>
<?php include '../view/footer.php'; ?>