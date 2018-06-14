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



http://clubedosgeeks.com.br/programacao/php/laravel-angularjs-sua-primeira-aplicacao
https://www.w3schools.com/angular/angular_modules.asp
https://stackoverflow.com/questions/22651378/angular-js-ajax-call-with-parameters
http://newaeonweb.com.br/angularjs/2015/02/17/Ajax-request-com-angularjs/


'use strict';
var app = angular.module('cdg',[]);
 
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