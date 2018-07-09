var app = angular.module('main', ['ngMessages', 'ngRoute', 'ui.bootstrap']);

app.config(function($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: './components/home.html',
        controller: 'homeCtrl'
    }).when('/logout', {
        resolve: {
            deadResolve: function($location, user) {
                user.clearData();
                $location.path('/');
            }
        }
    }).when('/login', {
        templateUrl: './components/login.html',
        controller: 'loginCtrl'
    }).when('/dashboard', {
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './components/dashboard.html',
        controller: 'dashboardCtrl'
    }).when('/admindashboard', {
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './cms/admin/index.php',
        controller: 'dashboardCtrl'
    }).when('/lec_dashboard', {
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './components/Lecdashboard.html',
        controller: 'dashboardCtrl'
    }).when('/HOD', {
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './components/HOD.html',
        controller: 'dashboardCtrl'
    }).when('/register', {
        templateUrl: './components/register.html',
        controller: 'regCtrl'
    }).when('/moodle', {
        templateUrl: './cms/Moodle/login.php',
        controller: 'moodleCtrl'
    }).when('/course', {
        templateUrl: './components/courses.html',
        controller: 'courseCtrl'
    }).when('/news', {
        templateUrl: './components/news.html',
        controller: 'newsCtrl'
    }).when('/contact', {
        templateUrl: './components/contact.html',
        controller: 'contactCtrl'
    }).when('/submissions', {
        templateUrl: './components/submissions.html',
        controller: 'submissionCtrl'
    }).otherwise({
        template: '404'
    });

});
app.service('user', function() {
    var username;
    var loggedin = false;
    var id;

    this.getName = function() {
        return username;
    };
    this.setID = function(userID) {
        id = userID;
    };
    this.getID = function() {
        return id;
    };
    this.isUserLoggedIn = function() {
        if (!!localStorage.getItem('login')) {
            loggedin = true;
            var data = JSON.parse(localStorage.getItem('login'));
            username = data.username;
            id = data.id;
        }
        return loggedin;
    };

    this.saveData = function(data) {
        username = data.user;
        id = data.id;
        loggedin = true;
        localStorage.setItem('login', JSON.stringify({
            username: username,
            id: id
        }));
    };
    this.clearData = function() {
        localStorage.removeItem('login');
        username = "";
        id = "";
        loggedin = false;
    }
})
app.controller('homeCtrl', function($scope, $location) {
    $scope.gotoLogin = function() {
        $location.path('/login');
    };
    $scope.register = function() {
        $location.path('/register');
    };
    $scope.gotomoodle = function() {
        $location.path('/moodle');
    };
    $scope.courses = function() {
        $location.path('/course')
    };
    $scope.news = function() {
        $location.path('/news')
    };
    $scope.contact = function() {
        $location.path('/contact')
    };
    $scope.carouselslider = function() {
        $scope.myInterval = 2500;
        $scope.slides = [{
                image: "./img/home.jpg"
            },
            {
                image: "./img/home1.jpg"
            },
            {
                image: './img/home2.jpg'
            },
            {
                image: './img/home3.jpg'
            }
        ];
    };
});

app.controller('loginCtrl', function($scope, $http, $location, user) {
    $scope.login = function() {
        var username = $scope.username;
        var password = $scope.password;
        $http({
            url: 'http://localhost/Sem3_project/server.php',
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data: 'username=' + username + '&password=' + password
        }).then(function(response) {
            if (response.data.status == 'loggedin') {
                user.saveData(response.data);
                // alert(response.data.Type);
                if (response.data.Type == 'admin') {
                    $location.path('/admindashboard');
                } else if (response.data.Type == 'lecturer') {
                    $location.path('/lec_dashboard');
                } else if (response.data.Type == 'HOD') {
                    $location.path('/HOD');
                }
            } else {
                alert('invalid login');
            }
        })
    };



});
app.controller('dashboardCtrl', function($scope, $location, user, $http) {
    $scope.user = user.getName();
    $scope.obj = { 'idisable': false };
    $scope.btnName = "Update";

    $scope.insertdata = function() {
        $http.post("insertapprove.php", { 'userid': $scope.userid, 'approval': $scope.approval, 'btnName': $scope.btnName })
            .then(function() {
                $scope.msg = "Data Inserted";
                $scope.getdata();

            })

    };
    $scope.insertData = function() {
        $http.post(
            "leave.php", {
                'uname': $scope.Id,
                'type': $scope.leavetype,
                'num_day': $scope.numofdays,
                'from_date': $scope.from,
                'to_date': $scope.to,
                'comment': $scope.reason

            }
        )
        alert("Successfully Submitted!!")
    };
    $scope.gotoLogout = function() {
        $location.path('/logout');
    };
    $scope.gotosubmission = function() {
        $location.path('/submissions');
    };
    $scope.tab = 1;

    $scope.setTab = function(newTab) {
        $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum) {
        return $scope.tab === tabNum;
    };
    $scope.getdata = function() {
        $http.get("approval.php")
            .then(function(response) {
                $scope.names = response.data;
            });

    };
    $scope.edit = function(uname, approval) {
        $scope.userid = uname;
        $scope.approval = approval;
        $scope.btnName = "Update";
        $scope.obj.idisable = true;
        $scope.getdata();

    }


});
app.controller('regCtrl', function($scope, $http) {
    $scope.insertData = function() {
        $http.post(
            "insert.php", {
                'fullname': $scope.fullname,
                'name': $scope.name,
                'email': $scope.email,
                'mobile': $scope.mobilenum,
                'birthday': $scope.date_of_birth,
                'address': $scope.address,
                'gender': $scope.gender,
                'maths': $scope.maths,
                'science': $scope.science,
                'english': $scope.English,

            }
        )
        alert("Successfully Inserted!")
        $scope.reload();
    };
    $scope.reload = function() {
        $scope.fullname = null,
            $scope.name = null,
            $scope.email = null,
            $scope.mobilenum = null,
            $scope.date_of_birth = null,
            $scope.address = null,
            $scope.gender = null
    }

});
app.controller('courseCtrl', function($scope, user) {

});
app.controller('newsCtrl', function($scope, user) {

});
app.controller('contactCtrl', function($scope, user) {

});
app.controller('moodleCtrl', function($scope, user) {

});
app.controller('submissionCtrl', function($scope, user, $http) {
    $scope.upload = function() {
        $http.post('upload.ashx', $scope.files, {
                header: { 'Content-Type': 'multipart/form-data' }
            })
            .then(function(d) {
                console.log(d)
            })
    }
});