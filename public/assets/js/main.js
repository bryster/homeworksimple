function TasksController($scope, $http){

    $http.get('/homeworksimple/public/task').success(function(tasks)
    {
        $scope.tasks = tasks;
    });
}

function BidsController($scope, $http){
    
}