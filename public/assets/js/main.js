var myApp = angular.module('myApp', []);
myApp.factory('Avengers', function () {
    var Avengers = {};
    Avengers.cast = [
    {
        name: "Samuel L. Jackson",
        character: "Nick Fury"
    },
    {
        name: "Rober Downy Jr.",
        character: "Tony Stark Ironman"
    }
    ];
    return Avengers;
})

function AvengersCtrl($scope, Avengers){
    $scope.avengers = Avengers;
}