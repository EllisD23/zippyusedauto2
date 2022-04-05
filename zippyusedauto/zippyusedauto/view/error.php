<?php include '../admin/adminheader.php'; ?>
<main>
<h1>Error</h1>
<p>Error message: <?php echo $error_message; ?></p>
<p><a href="?action=add_vehicle_form">Click here</a> to add vehicle <br>
        <a href="?action=list_makes">View/Edit Vehicle Makes</a><br> 
        <a href="?action=list_types">View/Edit Vehicle Types</a><br>
        <a href="?action=list_classes">View/Edit Vehicle Classes</a></p>            
</main>