<?php
    /* $menu = ['Inicio','Cursos','Mi perfil']; */
    include_once( './includes/functions.php');
    include_once('./includes/data.php');
    $user=[
        'name'=> 'Mario',
        'featured'=>'avatar.png',
        'lastname'=> 'Martinez',
        'age' => 27,
        'username'=> 'MarioM',
        'profession' => 'Web Developer',
        'intereses' => ['Desarrollo web', 'Redes Informaticas']

    ];

    
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
<body class="bg-secondary">
<?php require_once('./includes/menu.php') ?>

<div class="container " >
    <div class="row justify-content-center">
        <div class="col-12 text-center" >
            <h1>Registro</h1>

        </div>
        <div class="col-4">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label for="age" class="form-label">Edad:</label>
                    <input type="number" class="form-control" name="age">
                </div>
                <div class="form-group">
                    <label for="profession" class="form-label">Profesión:</label>
                    <input type="text" class="form-control" name="profession">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="d-grid "> <!-- row jutify-content-center -->
                
                    <button type="submit" class="btn btn-primary btn-lg justify-conten-center m-3">Registrarme</button>

                </div>
                                
            </form>
        </div>
    </div>
</div>

    
<?php require_once('./includes/footer.php') ?>
</body>
</html>