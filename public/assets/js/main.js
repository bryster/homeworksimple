function TasksController($scope, $http){

    $http.get('/homeworksimple/public/task').success(function(tasks)
    {
        $scope.tasks = tasks;
    });

    $scope.addTask = function(){
        $scope.user_id = '1';

        var task = {
            title: $scope.newtitle,
            content: $scope.newcontent,
            price: $scope.price,
            deadline: $scope.deadline,
            user_id: $scope.user_id
        };
        
        $scope.tasks.push(task);

        $http.post('/homeworksimple/public/task', task);
    };
}

//
angular.module("MyApp", ['ngResource','ngSanitize'])
.config(['$routeProvider', function($routeProvider){
    $routeProvider.when('/', {templateUrl:'login.html', controller: 'loginController'})
    $routeProvider.when('/', {templateUrl:'index.php', controller: 'TasksController'})
    $routeProvider.otherwise({redirectTo: '/'})
}])

angular.module('MyApp')
.controller('loginController', function($scope, $sanitize, $location, Authenticate)
{
    $scope.login = function(){
        Authenticate.save({
            'email': $sanitize($scope.email),
            'password': $sanitize($scope.password)
        }, function(){
            $scope.flash = '';
            $location.path('/home');
        }, function(response){
            $scope.data.flash
        })
    }
})