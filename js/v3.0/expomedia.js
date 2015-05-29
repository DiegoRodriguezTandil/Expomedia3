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
                var layout = response.data.layout;
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
    
    // travel Scheduler Controllers
    .controller('TravelScheduleController', ['$http', 
        function($http)
        {
            var vm = this;
            
            vm.viajes = [
                { 'hora': '00:00', 'origen': 'origen', 'destino': 'destino', 'empresa': 'empresa' },
            ];
            
            var onLoadContentComplete = function(response) {
                vm.viajes = response.data.viajes;
            };
            
            var onLoadContentError = function(reason) {
                //error
            };
            
            var loadContent = function(){
                $http
                    .get('server/exposerver.php', {
                        params: {
                            'action': 'travel',  
                        },
                    })
                    .then(onLoadContentComplete, onLoadContentError);
            };
            
            loadContent();
            
        }
    ])
    .controller('AddsController', ['$http', 
        function($http)
        {
            var vm = this;
            vm.mensaje = "CARGANDO adds";
        }
    ])
    .controller('NewsController', ['$http', '$interval', 
        function($http, $interval)
        {
            var vm = this;
            
            vm.id = 0;
            
            vm.news = [];
            
            vm.activeNews = 'Bienvenidos a Tandil - Lugar Soñado';
            
            var updateActiveNews = function() {
                if(vm.id > vm.news.length) {
                    vm.id = 0;
                }  
                else {
                    vm.id ++;
                    var aux = vm.news[vm.id];
                    if(aux)
                        vm.activeNews = aux.news;
                }
            };
            
            var onLoadContentComplete = function(response) {
                vm.news = response.data;
            };        
            
            var onLoadContentError = function(reason) {
                //error
            };
            
            var loadContent = function(){
                $http
                    .get('server/exposerver.php', {
                        params: {
                            'action': 'noticias',  
                        },
                    })
                    .then(onLoadContentComplete, onLoadContentError);
            };
            
            //loadContent();
            $interval(updateActiveNews,5000);
            $interval(loadContent,10000);
            
        }
    ]);
    
}());

 