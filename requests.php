<?php
session_start();
if (isset($_POST['signup'])) {
    require("db.php");
    $username = $_POST['username'];
    $usergender = $_POST['usergender'];
    $useraddress = $_POST['useraddress'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];


    $checkEmailQuery = "select COUNT(*) from users where useremail='$useremail'";
    $result = $conn->query($checkEmailQuery);
    $result->execute();
    $emailCount = $result->fetchColumn();
    // print_r($emailCount);

    if($emailCount>0){
        echo "Email already exists. Use diff email";
        exit();
    }


    if (isset($_FILES['userphoto']) && $_FILES['userphoto']['error'] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['userphoto']['tmp_name']); // Read uploaded image
        $image = base64_encode($image); // Convert to base64
        echo $image;
    } else {
        $image = null; // No image uploaded
    }
    $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

    try {

        $sqlQuery = "Insert into users (id,username,usergender,useraddress,useremail,userpassword,userphoto) values (NULL,'$username','$usergender','$useraddress','$useremail','$hashedPassword','$image')";
        $result = $conn->prepare($sqlQuery);
        $result->execute();

        $userId = $conn->lastInsertId();

        $_SESSION['user'] = ['userId' => $userId, 'username' => $username, 'useremail' => $useremail];
        echo $_SESSION['user']['username'];
        header("Location: index.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else if (isset($_POST["login"])) {
    require("db.php");
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    try {

        $sqlQuery = "Select * from users where useremail = :useremail";
        $result = $conn->prepare($sqlQuery);
        $result->execute([':useremail' => $useremail]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($userpassword, $user['userpassword'])) {
            echo $user['username'];
            echo $user['id'];
            echo $user['useremail'];
            echo "login successful";

            $_SESSION['user'] = ['userId' => $user['id'], 'username' => $user['username'], 'useremail' => $user['useremail']];
            header("Location: index.php");
            exit();
        } else {
            echo "invalid password";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else if (isset($_GET["logout"])) {

    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
} else if (isset($_POST["createPost"])) {
    print_r($_POST);
    require("db.php");
    $content = $_POST["content"];
    if (isset($_FILES['userUploadedImage']) && $_FILES['userUploadedImage']['error'] === UPLOAD_ERR_OK) {
        $image = file_get_contents($_FILES['userUploadedImage']['tmp_name']); // Read uploaded image
        $image = base64_encode($image); // Convert to base64
    } else {
        $image = null; // No image uploaded
    }

    $userId = $_SESSION["user"]['userId'];

    $sqlQuery = "Insert into postData(id,content,image,userId)values(NULL,'$content','$image','$userId')";
    $result = $conn->prepare($sqlQuery);
    $result->execute();
    header("location:index.php");
} else if (isset($_POST["deletePost"])) {
    require("db.php");
    print_r($_POST);
    echo $postId = $_POST["deletePost"];
    $sqlQuery = "Delete from postData where id=$postId";
    $result = $conn->prepare($sqlQuery);
    $result->execute();
    header("location:index.php");
}
