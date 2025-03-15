
<?php
require("db.php");

$sqlQuery = "select * from postData order by id Desc";
$result = $conn->query($sqlQuery);
foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $imageSrc = 'data:image/jpeg;base64,' . $row['image']; // Convert to base64
    $userId =  $row['userId'];
    $rowId =  $row['id'];

    $getUserDataQuery = "select * from users where id=$userId";
    $result = $conn->query($getUserDataQuery);
    $result->execute();
    $username = "";
    $userphoto = "";
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $user) {
        $userPHOTO = 'data:image/jpeg;base64,' . $user['userphoto']; // Convert to base64
        $username = $user['username'];
        $userphoto = $userPHOTO;
    }

    echo ' <div class="post-container">
    <div class="post">
        <div class="post-header">
    <div class="post-header-content">
        <img src="' . $userphoto . '" alt="profile">
        <div>
            <div class="username">' . $username . '</div>
        </div>
    </div>';
    echo '<form action="requests.php" method="post">
    <div class="delete-icon" >
        <button name="deletePost" class="deleteButton" value='.$rowId.'>Delete</button>
    </div>
   </div>
   </form>';
    if ($row['image']) {
        echo '<div class="post-image">
         <img src="' . $imageSrc . '" alt="profile">
        </div>';
    }
    echo '<div class="post-footer">
            <div class="actions">
                <i class="fa fa-heart" aria-hidden="true">❤️</i>
                <i class="fa fa-comment" aria-hidden="true">💬</i>
                <i class="fa fa-share" aria-hidden="true">🔗</i>
            </div>
           
            <div class="caption"><span class="boldHeading">' .$username .'</span>'. $row['content'] . '</div>
            
        </div>
    </div>
</div>';
}

?>