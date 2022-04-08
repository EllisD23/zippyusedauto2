<?php include '../zippyusedauto/view/header.php'; ?>

    <?php if (isset($firstname)){
        $thankyou = "<h2>Thank you for registering, $firstname!</h2>";
        $link = '<h5><a href="?action=list_vehicles">Click here</a> to view our vehicle list. </h5>';
        echo $thankyou;
        echo $link;
    
    }else{
        $form = '<form action="." method="post">
            <input type="hidden" name="action" value="register" />

            <label>Please enter your firstname:</label>
            <div class="col-4 mb-2">
            <input type="text" name="firstname" />
            </div>
            <div class="mb-4">
            <input type="submit" class="btn btn-primary" value="Register"/>
            </div>
        </form>';
        echo $form;
    }
    ?>
    <?php include '../zippyusedauto/view/footer.php'; ?>