<?php
    /* $menu = ['Inicio','Cursos','Mi perfil']; */
    include_once( './includes/functions.php');
    include_once('./includes/data.php');

    if( !empty($_POST) && isset( $_POST['username'])){
        echo "Metodo POST";

        //Genrar informacion del Usuario: Cookies
        $username = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $profession = $_POST['profession'];
        $time =time()+ 30 * 24 * 60 * 60;

        setcookie('username', $username, $time);
        setcookie('email', $email, $time);
        setcookie('age', $age, $time);
        setcookie('profession', $profession, $time);
        echo " <br>Cookies de usuario registrado creadas!";
    }else {
        echo "Metodo GET";
        //Genrar informacion del Usuario: Cookies
        if ( !empty($_COOKIE) && isset($_COOKIE['username'])){
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $age = $_COOKIE['age'];
            $profession = $_COOKIE['profession'];
            $time =time()+ 30 * 24 * 60 * 60;
        }
        
        //Agregar curso a archivo json
        if( !empty($_GET) && isset( $_GET['name'] ) ) {
            //$myNewCourseArray = $_GET;
            //$myNewCourseJSON = json_encode($myNewCourseArray);
            //file_put_contents('./includes/myCourses.json', $myNewCourseJSON);

            //Leer el contenido JSON:
            $coursesJSON = file_get_contents('./includes/myCourses.json');
            $tempArray = json_decode($coursesJSON, true);// -> null

            if( is_null($tempArray )) {
                $tempArray = [];
            }

            array_push( $tempArray, $_GET);

            $jsonData = json_encode($tempArray);

            file_put_contents('./includes/myCourses.json', $jsonData);



        }
    
    }

    /* $user=[
        'name'=> 'Mario',
        'featured'=>'avatar.png',
        'lastname'=> 'Martinez',
        'age' => 27,
        'username'=> 'MarioM',
        'profession' => 'Web Developer',
        'intereses' => ['Desarrollo web', 'Redes Informaticas']

    ]; */

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto </title>
    <link rel="stylesheet" href="./CSS/estilos.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body class="bg-secondary">
<?php require_once('./includes/menu.php') ?>
        <section class="container-fluid">
            <div class="row justify-content-center">
                <?php if( isset($username) ): ?>
                    <div class="col-auto my-4 text-center">
                        <h2>Mi perfil</h2>
                        <img src="./images/avatar.png" class="img-fluid" width="120"  alt="foto de perfil de <?= $user ['name'] ?>">
                        <p><?= $username ?></p>
                        <p><?= $profession ?></p>
                    </div>
                <?php else: ?>
                    <div class="col-auto my-4">
                        <a href="registro.php" class="btn btn-primary">Ir a Registro</a>
                    </div>
                <?php endif; ?>    
            </div>
        </section>

        <section class="container-fluid">
            <div class="row justify-content-center">
                <?php if ( isset($username) ): ?>
                    <?php
                        //obtiene los cursos de usuario:
                        $myCoursesJSON = file_get_contents('./includes/myCourses.json');
                        $myCoursesArray = json_decode($myCoursesJSON, true);
                       //$totalCourses = count($myCoursesArray);

                    ?>

                    <?php if($myCoursesArray > 0): ?>
                        <!--Si el alumno esta inscrito a cursos, los mostramos -->
                        <div class="col-12 text-center mb-3">
                                <h2>Mis Cursos</h2>
                                
                        </div>
                        <?php foreach($myCoursesArray as $course):  ?>
                                    <?= printCourse( $course ) ?>
                        <?php endforeach; ?>
                        
                    <?php else: ?>
                        <div class="col-12 text-center mb-3">
                            <p class="text-center">
                                <a href="cursos.php">Inscribete</a> a cursos!
                            </p>  
                        </div>
                    <?php endif; ?>
                    
                    
                <?php else: ?>
                    <p class="text-center">
                        <a href="registro.php">Registrate</a>  para poder inscribirte a cursos
                    </p>
                <?php endif; ?>

            </div>
        </section>

    
<?php require_once('./includes/footer.php') ?>
</body>
</html>