(function(){
    
    var app = angular.module('expomedia', ["ngRoute"]);
    
    app.config(['$routeProvider', function($routeProvider) {
        $routeProvider
            .when("/loadingLayouts",{
                templateUrl: "partial/loading.html",
                controller: "LoadingController"
            })
            .when("/infoLayouts",{
                templateUrl: "partial/info.html",
                //controller: "InfoController"
            })
            .when("/onePageLayouts",{
                templateUrl: "partial/onePage.html",
                controller: "OnePageController"
            })
            .otherwise({
                redirectTo:"/loadingLayouts"
            });
    }])

    // Controllers 
    
    // Main Controller
    .controller('MainController', ['$route', 
        function($route){
            this.$route = $route;
        }
    ])
    
    // Loading Page
    .controller('LoadingController', ['$http', '$location',
        function($http, $location)
        {
            var vm = this;
            
            var onLoadContentComplete = function(response) {
                //vm.mensaje = response.data;
                var layout = response.data.layout;
                //console.log(response);
                $location.path(layout);
            };
            
            var onLoadContentError = function(reason) {
                //error
            };
            
            var loadContent = function(){
                $http
                    .get('server/exposerver.php', {
                        params: {
                            'display_id': display_id,  
                        },
                    })
                    .then(onLoadContentComplete, onLoadContentError);
            };
            
            loadContent();
        }
    ])
    
    // OnePage Controllers
    .controller('TravelScheduleController', ['$http', 
        function($http)
        {
            var vm = this;
            
            vm.mensaje = 'Loading Travel.....';
    //        var layout = 'init.html';
    //        
    //        var setLayout = function(layout) {
    //            // $location.path("/info");
    //        };
    //                
    //        var startup = function() {
    //            setLayout(layout);
    //            $http.get('layout/status/'+layout).then(setNextLayout, error);
    //        };
    //        
    //        startup();       
            
        }
    ])
    .controller('AddsController', ['$http', 
        function($http)
        {
            var vm = this;
            vm.mensaje = "CARGANDO adds";
        }
    ])
    .controller('NewsController', ['$http', 
        function($http)
        {
            var mv = this;
            mv.mensaje = "CARGANDO news";
        }
    ]);
    
}());

 