<?php
    include_once( './includes/functions.php');
    include_once('./includes/data.php');
    /* $menu = ['Inicio','Cursos','Mi perfil']; */
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body class="bg-success">
<?php require_once('./includes/menu.php') ?>
        

        <section class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12  my-3">
                    <h2>Todos Los Cursos</h2>
                    <small class="lead"> <b>Total de Cursos:</b> <?= count($courses)?></small>

                </div>
                <?php 
                    if( !empty($_COOKIE) && isset($_COOKIE['username'])){
                        $username = $_COOKIE['username'];
                    }
                
                ?>
                <?php foreach($courses as $course):  ?>
                    <?php if($username): ?>
                        <?= printCourse($course, $username); ?>
                    <?php else: ?>
                        <?= printCourse($course); ?> 
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
<?php require_once('./includes/footer.php') ?>
</body>
</html>