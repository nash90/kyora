var app = angular.module("myApp", []);

app.controller("FormController", function($scope, $http) {

	$scope.companyname = "";
	$scope.companyaddress = "";
	$scope.name = "";
	$scope.mailaddress = "";
	$scope.phonenumber = null;
	$scope.snsaccount = "";
	$scope.message = "";
	$scope.submitted = false;
	$scope.data = {};

	var resetForm = function (){
		//console.log("point 1");
		$scope.companyname = "";
		$scope.companyaddress = "";
		$scope.name = "";
		$scope.mailaddress = "";
		$scope.phonenumber = null;
		$scope.snsaccount = "";
		$scope.message = "";
		$scope.submitted = false;	
	}

	var setData = function(){
		$scope.data.companyname = $scope.companyname;
		$scope.data.companyaddress = $scope.companyaddress;
		$scope.data.name = $scope.name;
		$scope.data.mailaddress = $scope.mailaddress;
		$scope.data.phonenumber = $scope.phonenumber.toString();
		$scope.data.snsaccount = $scope.snsaccount; 
		$scope.data.message = $scope.message;
	}

	$scope.sendEmail = function () {
		//alert("mail send button clicked!!!");
		setData();
	    $http.post("sendEmail.php", $scope.data, {
        headers: { 'Content-Type': 'application/json; charset=UTF-8'}
    }).then(function (response) {
	    	alert("メールを送信しました。");
	    	resetForm();
	    });
	};	

//	$scope.sendEmail = function (){
//		alert("mail send button clicked!!!");
//		resetForm();
//	}

});