<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="/">
                <h1 class="logo">phpGram</h1>
            </a>

        </div>
        <div>

            <?php
            if (isset($_SESSION['user'])) {
                echo "Welcome, " . $_SESSION['user']['username'];
            }
            ?>
        </div>
        <div class="nav-links">
            <?php

            if (isset($_SESSION['user'])) {
                // User is logged in
                include('db.php');
                $sqlQuery = "select userphoto    from users where username = :username";
                $result = $conn->prepare($sqlQuery);
                $result->execute([':username' => $_SESSION['user']['username']]);
                $user = $result->fetch(PDO::FETCH_ASSOC);
                $imageSrc = 'data:image/jpeg;base64,' . $user['userphoto']; // Convert to base64

                echo '<a href="?home=true" class="nav-item create-post">Home</a>';
                echo '<a href="?createPost=true" class="nav-item create-post">Create Post</a>';
                echo '<a href="requests.php?logout=true" class="nav-item create-post">Logout</a>';
                echo '<div class="avatar-container">';
                echo '<img src="' . $imageSrc . '" alt="Avatar" class="avatar">';
                echo '</div>';
            } else {
                // User is not logged in
                echo '<a href="?login=true" class="nav-item create-post">Login</a>';
            }
            ?>
        </div>
    </nav>
</body>

</html>