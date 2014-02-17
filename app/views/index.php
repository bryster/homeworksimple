<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <title>Angular Test</title>
    <link rel="stylesheet" type="text/css" href="assets/css/smoothness/jquery-ui-1.10.3.custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-2.1.0.min.js'"></script>
</head>
<body class="scrolled">
    <div class="col-md-9 col-md-offset-2">
        <div ng-controller="TasksController">
            <h1>Tasks</h1>
            <input type="text" placeholder="Search Tasks" ng-model="search">
            <br><br>
                <form ng-submit="addTask()">
                    <input type="text" name="title" placeholder="Title"><br>
                    <input type="text" name="content" placeholder="Content"><br>
                    <input type="text" name="price" placeholder="Price"><br>
                    <input type="text" name="deadline" placeholder="Deadline"><br>
                    <input type="hidden" name="user_id" value="<?php echo Session::get('id'); ?>">
               </form>
            <br><br>
            <ul class="list-group">
                <li class="list-group-item" ng-repeat="task in tasks | filter:search">
                    <h4>{{ task.title }}</h4> by {{ task.user['username'] }}
                    <article>
                        {{ task.content }}
                    </article>
                </li>
            </ul>
        </div>
    </div>

    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>

</body>
</html>

<script type="text/javascript">
$('.datepicker').datepicker();

$( "#toggle" ).click(function() {
  $( "#show_comments" ).toggle( "slow" );
});

</script>