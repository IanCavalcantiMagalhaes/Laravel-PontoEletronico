function PegarDados(){
    $(document).ready(function(){//Recber dados de tabela
           $.ajax({
             type: "GET",
             data: {Campo: $("#Campo").val(),
                    Campo2: $("#Campo2").val()},
             url:"/TestAjax",
             success:function(result){
              $("#Div3").append(
                result.Um.nome+" / "+result.Dois
              );
           }
          });
   }
   );
   }
   var app = angular.module('Modulo',[]);

   app.controller ('AjaxCtrl', ['$scope', function ($scope) {

      // Plain Old JavaScript Object
      var band = {
          name: " ",
          country: " "
      }

      // Atribui $scope ao objeto JavaScript
      $scope.band = band;

      //Realiza a chamada, utilizando $http
      $scope.myFunc = function() {//um evento vai ativar myFunc()
        $window.alert("greeting");
            $http ({
                method: 'GET',
                url: '/te',
                params: {
                  sampletext : "sample"
              }
            })
                .sucess (function (data, status, headers, config) {
                    // Atribui o retorno ao $scope
                    $scope.band.name = data.band.name;
                })
                .error (function (data, status, headers, config) {
                    // Se tiver error
                    console.log(status);
                });
        };
    }]);

http://clubedosgeeks.com.br/programacao/php/laravel-angularjs-sua-primeira-aplicacao
https://www.w3schools.com/angular/angular_modules.asp
https://stackoverflow.com/questions/22651378/angular-js-ajax-call-with-parameters
http://newaeonweb.com.br/angularjs/2015/02/17/Ajax-request-com-angularjs/


'use strict';

 
    // Service
    app.factory('pessoaService',function($http) {
      return {
        AjaxSoma: function(){
          return $http.get('/TestAjax');
        }
      }
    });
    

    app.controller('test', function($scope, pessoaService) {
      $scope.AjaxSoma = function(){
        pessoaService.AjaxSoma().success(function(data){
          $scope.pessoas = data;
        });
      }
    

});