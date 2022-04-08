<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Zippy Used Auto </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../zippyusedauto/view/main.css" rel="stylesheet">
</head>

<!-- the body section -->
<body>
<div class="container">
    <div mb-3 style="float: right;">
    <?php if ($action != 'register' && $action != 'logout' && empty($_SESSION['userid'])){
    $register = '<h4><a href="?action=register">Register</a></h4>';
    echo $register;

    }else if ($action != 'register' && $action != 'logout' && isset($_SESSION['userid'])){
        $register = '<h5><a href="?action=logout">(Sign Out)</a></h5>';
        echo "Welcome " . $_SESSION['userid'] . "! $register";
    }
    ?>
    </div>
    <header><h1>Zippy Used Auto</h1></header>
    <hr>