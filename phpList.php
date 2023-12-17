<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Interactive Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
  <div class="container mt-4">
    <h1>To-Do List</h1>
    <form id="taskForm">
      <div class="form-group">
        <input type="text" class="form-control" id="taskInput" placeholder="Enter task"></input>
        </div>
      <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
    <ul id="taskList" class="mt-3">
    </ul>
  </div>

  <script>
  try {
  $(document).ready(function(){
    // Form submission for adding tasks
    $('#taskForm').submit(function(e){
        e.preventDefault();
        var task = $('#taskInput').val();
        $.ajax({
            type: 'POST',
            url: 'tasks.php',
            data: { task: task },
            success: function(response){
                $('#taskList').html(response);
                $('#taskInput').val('');
            }
        });
    });

    // Deletion of tasks
    $(document).on('click', '.delete', function(){
        var delete_task = $(this).prev().text(); // Assuming the task name is displayed before the delete button
        $.ajax({
            type: 'POST',
            url: 'tasks.php',
            data: { delete_task: delete_task },
            success: function(response){
                $('#taskList').html(response);
            }
        });
    });
});
} catch (Exception $e) {
  echo 'Caught exception: ', $e->getMessage(), '\n';

}
    </script>
</body>
</html>
