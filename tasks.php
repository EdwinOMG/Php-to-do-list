<?php
session_start();
include 'db_connection.php'; // Include the database connection file

try {
    if(isset($_POST['task'])) {
        $task = $_POST['task'];

        $stmt = $conn->prepare("INSERT INTO TASKDATA (TASKS) VALUES (?)");
        $stmt->bind_param("s", $task);
        $stmt->execute();
        $stmt->close();
    }

    if (isset($_POST['delete_task'])) {
    $delete_task = $_POST['delete_task'];

    $delete_stmt = $conn->prepare("DELETE FROM TASKDATA WHERE TASKS = ?");
    $delete_stmt->bind_param("s", $delete_task);
    $delete_stmt->execute();
    $delete_stmt->close();
}

    $sql = "SELECT * FROM TASKDATA";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['TASKS'] . ' <button class="btn btn-sm btn-danger delete" data-id="' . $row['TASKS'] . '">Delete</button></li>';
        }
    }

    $conn->close();
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), '\n';
}
?>
