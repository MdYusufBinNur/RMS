type = ['','info','success','warning','danger'];

$().ready(function(){


    $sidebar = $('.sidebar');
    $off_canvas_sidebar = $('.off-canvas-sidebar');

    window_width = $(window).width();

    if(window_width > 767)
    {
        if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
            $('.fixed-plugin .dropdown').addClass('open');
        }

    }

    $('.fixed-plugin a').click(function(event){
      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if($(this).hasClass('switch-trigger')){
            if(event.stopPropagation){
                event.stopPropagation();
            }
            else if(window.event){
               window.event.cancelBubble = true;
            }
        }
    });

    $('.fixed-plugin .background-color span').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if($sidebar.length != 0){
            $sidebar.attr('data-background-color',new_color);
        }

        if($off_canvas_sidebar.length != 0){
            $off_canvas_sidebar.attr('data-background-color',new_color);
        }
    });

    $('.fixed-plugin .active-color span').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if($sidebar.length != 0){
            $sidebar.attr('data-active-color',new_color);
        }

        if($off_canvas_sidebar.length != 0){
            $off_canvas_sidebar.attr('data-active-color',new_color);
        }
    });

    if($('#twitter').length != 0){
        $('#twitter').sharrre({
          share: {
            twitter: true
          },
          enableHover: false,
          enableTracking: true,
          buttons: { twitter: {via: 'CreativeTim'}},
          click: function(api, options){
            api.simulateClick();
            api.openPopup('twitter');
          },
          template: '<i class="fa fa-twitter"></i>',
          url: 'http://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard/overview.html'
        });
    }

    if($('#facebook').length != 0){
        $('#facebook').sharrre({
          share: {
            facebook: true
          },
          enableHover: false,
          enableTracking: true,
          click: function(api, options){
            api.simulateClick();
            api.openPopup('facebook');
          },
          template: '<i class="fa fa-facebook-square"></i>',
          url: 'http://demos.creative-tim.com/paper-dashboard-pro/examples/dashboard/overview.html'
        });
    }

});

demo = {

    initCirclePercentage: function(){

            $('#chartDashboard, #chartOrders, #chartNewVisitors, #chartSubscriptions, #chartDashboardDoc, #chartOrdersDoc').easyPieChart({
        		lineWidth: 6,
        		size: 160,
        		scaleColor: false,
        		trackColor: 'rgba(255,255,255,.25)',
        		barColor: '#FFFFFF',
        		animate: ({duration: 5000, enabled: true})

            });


    },

    initGoogleMaps: function(){

    // Satellite Map
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 3,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
            center: myLatlng,
             mapTypeId: google.maps.MapTypeId.SATELLITE
        }

        var map = new google.maps.Map(document.getElementById("satelliteMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Satellite Map!"
        });

        marker.setMap(map);


    },

    initSmallGoogleMaps: function(){

        // Regular Map
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 8,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }

        var map = new google.maps.Map(document.getElementById("regularMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Regular Map!"
        });

        marker.setMap(map);


        // Custom Skin & Settings Map
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
            disableDefaultUI: true, // a way to quickly hide all controls
            zoomControl: true,
            styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

        }

        var map = new google.maps.Map(document.getElementById("customSkinMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Custom Skin & Settings Map!"
        });

        marker.setMap(map);

    },


    initVectorMap: function(){
         var mapData = {
                "AU": 760,
                "BR": 550,
                "CA": 120,
                "DE": 1300,
                "FR": 540,
                "GB": 690,
                "GE": 200,
                "IN": 200,
                "RO": 600,
                "RU": 300,
                "US": 2920,
            };

            $('#worldMap').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                zoomOnScroll: false,
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#AAAAAA","#444444"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
	},

    initFullScreenGoogleMap: function(){
        var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
        var mapOptions = {
          zoom: 13,
          center: myLatlng,
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
          styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]

        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);
    },

    initOverviewDashboardDoc: function(){
        /*  **************** Chart Total Earnings - single line ******************** */

        var dataPrice = {
          labels: ['Jan','Feb','Mar', 'April', 'May', 'June'],
          series: [
            [230, 340, 400, 300, 570, 500, 800]
          ]
        };

        var optionsPrice = {
          showPoint: false,
          lineSmooth: true,
          height: "210px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
            showGrid: false
          },
          low: 0,
          high: 'auto',
              classNames: {
                line: 'ct-line ct-green'
            }
        };

        Chartist.Line('#chartTotalEarningsDoc', dataPrice, optionsPrice);

        /*  **************** Chart Subscriptions - single line ******************** */

        var dataDays = {
          labels: ['M','T','W', 'T', 'F', 'S','S'],
          series: [
            [60, 50, 30, 50, 70, 60, 90, 100]
          ]
        };

        var optionsDays = {
          showPoint: false,
          lineSmooth: true,
          height: "210px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
            showGrid: false
          },
          low: 0,
          high: 'auto',
              classNames: {
                line: 'ct-line ct-red'
            }
        };

        Chartist.Line('#chartTotalSubscriptionsDoc', dataDays, optionsDays);
    },

    initOverviewDashboard: function(){

        /*  **************** Chart Total Earnings - single line ******************** */

        var dataPrice = {
          labels: ['Jan','Feb','Mar', 'April', 'May', 'June'],
          series: [
            [230, 340, 400, 300, 570, 500, 800]
          ]
        };

        var optionsPrice = {
          showPoint: false,
          lineSmooth: true,
          height: "210px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
            showGrid: false
          },
          low: 0,
          high: 'auto',
              classNames: {
                line: 'ct-line ct-green'
            }
        };

        Chartist.Line('#chartTotalEarnings', dataPrice, optionsPrice);

        /*  **************** Chart Subscriptions - single line ******************** */

        var dataDays = {
          labels: ['M','T','W', 'T', 'F', 'S','S'],
          series: [
            [60, 50, 30, 50, 70, 60, 90, 100]
          ]
        };

        var optionsDays = {
          showPoint: false,
          lineSmooth: true,
          height: "210px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
            showGrid: false
          },
          low: 0,
          high: 'auto',
              classNames: {
                line: 'ct-line ct-red'
            }
        };

        Chartist.Line('#chartTotalSubscriptions', dataDays, optionsDays);

        /*  **************** Chart Total Downloads - single line ******************** */

        var dataDownloads = {
          labels: ['2009','2010','2011', '2012', '2013', '2014'],
          series: [
            [1200, 1000, 3490, 8345, 3256, 2566]
          ]
        };

        var optionsDownloads = {
          showPoint: false,
          lineSmooth: true,
          height: "210px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
            showGrid: false
          },
          low: 0,
          high: 'auto',
              classNames: {
                line: 'ct-line ct-orange'
            }
        };

        Chartist.Line('#chartTotalDownloads', dataDownloads, optionsDownloads);
    },

    initStatsDashboard: function(){

        var dataSales = {
          labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
          series: [
             [287, 385, 490, 562, 594, 626, 698, 895, 952],
            [67, 152, 193, 240, 387, 435, 535, 642, 744],
            [23, 113, 67, 108, 190, 239, 307, 410, 410]
          ]
        };

        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: 1000,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: true,
          showPoint: false,
        };

        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);


        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 543, 520, 680, 653, 753, 326, 434, 568, 610, 756, 895],
            [230, 293, 380, 480, 503, 553, 600, 664, 698, 710, 736, 795]
          ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartActivity', data, options, responsiveOptions);

        Chartist.Pie('#chartPreferences', {
          labels: ['62%','32%','6%'],
          series: [62, 32, 6]
        });
    },

    initChartsPage: function(){
        /*  **************** 24 Hours Performance - single line ******************** */

        var dataPerformance = {
          labels: ['6pm','9pm','11pm', '2am', '4am', '8am', '2pm', '5pm', '8pm', '11pm', '4am'],
          series: [
            [1, 6, 8, 7, 4, 7, 8, 12, 16, 17, 14, 13]
          ]
        };

        var optionsPerformance = {
          showPoint: false,
          lineSmooth: true,
          height: "200px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,

          },
          low: 0,
          high: 16,
          height: "250px"
        };


        Chartist.Line('#chartPerformance', dataPerformance, optionsPerformance);

        /*   **************** 2014 Sales - Bar Chart ********************    */

        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
            [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695]
          ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "250px"
        };

        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Bar('#chartActivity', data, options, responsiveOptions);


        /*  **************** NASDAQ: AAPL - single line with points ******************** */

        var dataStock = {
          labels: ['\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
          series: [
            [22.20, 34.90, 42.28, 51.93, 62.21, 80.23, 62.21, 82.12, 102.50, 107.23]
          ]
        };

        var optionsStock = {
          lineSmooth: false,
          height: "200px",
          axisY: {
            offset: 40,
            labelInterpolationFnc: function(value) {
                return '$' + value;
              }

          },
          low: 10,
          height: "250px",
          high: 110,
            classNames: {
              point: 'ct-point ct-green',
              line: 'ct-line ct-green'
          }
        };

        Chartist.Line('#chartStock', dataStock, optionsStock);

    /*  **************** Views  - barchart ******************** */

        var dataViews = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
          ]
        };

        var optionsViews = {
          seriesBarDistance: 10,
          classNames: {
            bar: 'ct-bar'
          },
          axisX: {
            showGrid: false,

          },
          height: "250px"

        };

        var responsiveOptionsViews = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Bar('#chartViews', dataViews, optionsViews, responsiveOptionsViews);


    },

    showSwal: function(type){
        if(type == 'basic'){
        	swal({
                title: "Here's a message!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success btn-fill"
            });

    	}else if(type == 'title-and-text'){
        	swal({
                title: "Here's a message!",
                text: "It's pretty, isn't it?",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info btn-fill"
            });

    	}else if(type == 'success-message'){
        	swal({
                title: "Good job!",
                text: "You clicked the button!",
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success btn-fill",
                type: "success"
            });

    	}else if(type == 'warning-message-and-confirmation'){
            swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success btn-fill',
                    cancelButtonClass: 'btn btn-danger btn-fill',
                    confirmButtonText: 'Yes, delete it!',
                    buttonsStyling: false
                }).then(function() {
                  swal({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success btn-fill",
                    buttonsStyling: false
                    })
                });
    	}else if(type == 'warning-message-and-cancel'){
            swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this imaginary file!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it',
                    confirmButtonClass: "btn btn-success btn-fill",
                    cancelButtonClass: "btn btn-danger btn-fill",
                    buttonsStyling: false
                }).then(function() {
                  swal({
                    title: 'Deleted!',
                    text: 'Your imaginary file has been deleted.',
                    type: 'success',
                    confirmButtonClass: "btn btn-success btn-fill",
                    buttonsStyling: false
                    })
                }, function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Cancelled',
                      text: 'Your imaginary file is safe :)',
                      type: 'error',
                      confirmButtonClass: "btn btn-info btn-fill",
                      buttonsStyling: false
                    })
                  }
                })

    	}else if(type == 'custom-html'){
        	swal({
                title: 'HTML example',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-success btn-fill",
                html:
                        'You can use <b>bold text</b>, ' +
                        '<a href="http://github.com">links</a> ' +
                        'and other HTML tags'
                });

    	}else if(type == 'auto-close'){
        	swal({ title: "Auto close alert!",
            	   text: "I will close in 2 seconds.",
            	   timer: 2000,
            	   showConfirmButton: false
                });
    	} else if(type == 'input-field'){
            swal({
                    title: 'Input something',
                    html: '<div class="form-group">' +
                              '<input id="input-field" type="text" class="form-control" />' +
                          '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success btn-fill',
                    cancelButtonClass: 'btn btn-danger btn-fill',
                    buttonsStyling: false
                }).then(function(result) {
                    swal({
                        type: 'success',
                        html: 'You entered: <strong>' +
                                $('#input-field').val() +
                              '</strong>',
                        confirmButtonClass: 'btn btn-success btn-fill',
                        buttonsStyling: false

                    })
                }).catch(swal.noop)
            }
        },

    checkFullPageBackgroundImage: function(){
        $page = $('.full-page');
        image_src = $page.data('image');

        if(image_src !== undefined){
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
    },

    initWizard: function(){
        $(document).ready(function(){

            var $validator = $("#wizardForm").validate({
    		  rules: {
    		    email: {
                    required: true,
                    email: true,
                    minlength: 5
    		    },
    		    first_name: {
    		        required: false,
                    minlength: 5
    		    },
    		    last_name: {
    		        required: false,
                    minlength: 5
    		    },
    		    website: {
    		        required: true,
                    minlength: 5,
                    url: true
    		    },
    		    framework: {
        		    required: false,
        		    minlength: 4
    		    },
    		    cities: {
        		    required: true
    		    },
    		    price:{
        		    number: true
    		    }
    		  }
    		});

			// you can also use the nav-pills-[blue | azure | green | orange | red] for a different color of wizard
            $('#wizardCard').bootstrapWizard({
            	tabClass: 'nav nav-pills',
            	nextSelector: '.btn-next',
                previousSelector: '.btn-back',
            	onNext: function(tab, navigation, index) {
            		var $valid = $('#wizardForm').valid();

            		if(!$valid) {
            			$validator.focusInvalid();
            			return false;
            		}
            	},
                onInit : function(tab, navigation, index){

                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    $width = 100/$total;

                    $display_width = $(document).width();

                    if($display_width < 600 && $total > 3){
                       $width = 50;
                    }

                    navigation.find('li').css('width',$width + '%');
                },
                onTabClick : function(tab, navigation, index){
                    // Disable the posibility to click on tabs
                    return false;
                },
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;

                    var wizard = navigation.closest('.card-wizard');

                    // If it's the last tab then hide the last button and show the finish instead
                    if($current >= $total) {
                        $(wizard).find('.btn-next').hide();
                        $(wizard).find('.btn-finish').show();
                    } else if($current == 1){
                        $(wizard).find('.btn-back').hide();
                    } else {
                        $(wizard).find('.btn-back').show();
                        $(wizard).find('.btn-next').show();
                        $(wizard).find('.btn-finish').hide();
                    }
                }
            });
        });

        function onFinishWizard(){
            //here you can do something, sent the form to server via ajax and show a success message with swal

            swal("Good job!", "You clicked the finish button!", "success");
        }
    },

    initFormExtendedSliders: function(){
        // Sliders for demo purpose in refine cards section
        var slider = document.getElementById('sliderRegular');

        noUiSlider.create(slider, {
            start: 40,
            connect: [true,false],
            range: {
                min: 0,
                max: 100
            }
        });

        var slider2 = document.getElementById('sliderDouble');

        noUiSlider.create(slider2, {
            start: [ 20, 60 ],
            connect: true,
            range: {
                min:  0,
                max:  100
            }
        });
    },



    initFormExtendedDatetimepickers: function(){
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
         });

         $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',    //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
         });

         $('.timepicker').datetimepicker({
//          format: 'H:mm',    // use this format if you want the 24hours timepicker
            format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }

         });
    },

    initFullCalendar: function(){
        $calendar = $('#fullCalendar');

        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();

        $calendar.fullCalendar({
            viewRender: function(view, element) {
                // We make sure that we activate the perfect scrollbar when the view isn't on Month
                if (view.name != 'month'){
                    $(element).find('.fc-scroller').perfectScrollbar();
                }
            },
            header: {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'prev,next,today'
			},
			defaultDate: today,
			selectable: true,
			selectHelper: true,
            views: {
                month: { // name of view
                    titleFormat: 'MMMM YYYY'
                    // other view-specific options here
                },
                week: {
                    titleFormat: " MMMM D YYYY"
                },
                day: {
                    titleFormat: 'D MMM, YYYY'
                }
            },

			select: function(start, end) {

                // on select we show the Sweet Alert modal with an input
				swal({
    				title: 'Create an Event',
    				html: '<div class="form-group">' +
                            '<input class="form-control" placeholder="Event Title" id="input-field">' +
                        '</div>',
    				showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function(result) {

                    var eventData;
                    event_title = $('#input-field').val();

                    if (event_title) {
    					eventData = {
    						title: event_title,
    						start: start,
    						end: end
    					};
    					$calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
    				}

    				$calendar.fullCalendar('unselect');

                });
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events


            // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
            events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1),
                    className: 'event-default'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-4, 6, 0),
					allDay: false,
					className: 'event-rose'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+3, 6, 0),
					allDay: false,
					className: 'event-rose'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d-1, 10, 30),
					allDay: false,
					className: 'event-green'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d+7, 12, 0),
					end: new Date(y, m, d+7, 14, 0),
					allDay: false,
					className: 'event-red'
				},
				{
					title: 'Md-pro Launch',
					start: new Date(y, m, d-2, 12, 0),
					allDay: true,
					className: 'event-azure'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
                    className: 'event-azure'
				},
				{
					title: 'Click for Creative Tim',
					start: new Date(y, m, 21),
					end: new Date(y, m, 22),
					url: 'http://www.creative-tim.com/',
					className: 'event-orange'
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 21),
					end: new Date(y, m, 22),
					url: 'http://www.creative-tim.com/',
					className: 'event-orange'
				}
			]
		});
    },

	showNotification: function(from, align){
    	color = Math.floor((Math.random() * 4) + 1);

    	$.notify({
        	icon: "ti-gift",
        	message: "Welcome to <b>Paper Dashboard</b> - a beautiful dashboard for every web developer."

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	},

	initDocumentationCharts: function(){
//     	init single simple line chart
        var dataPerformance = {
          labels: ['6pm','9pm','11pm', '2am', '4am', '8am', '2pm', '5pm', '8pm', '11pm', '4am'],
          series: [
            [1, 6, 8, 7, 4, 7, 8, 12, 16, 17, 14, 13]
          ]
        };

        var optionsPerformance = {
          showPoint: false,
          lineSmooth: true,
          height: "200px",
          axisX: {
            showGrid: false,
            showLabel: true
          },
          axisY: {
            offset: 40,
          },
          low: 0,
          high: 16,
          height: "250px"
        };

        Chartist.Line('#chartPerformance', dataPerformance, optionsPerformance);

//     init single line with points chart
        var dataStock = {
          labels: ['\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14', '\'15'],
          series: [
            [22.20, 34.90, 42.28, 51.93, 62.21, 80.23, 62.21, 82.12, 102.50, 107.23]
          ]
        };

        var optionsStock = {
          lineSmooth: false,
          height: "200px",
          axisY: {
            offset: 40,
            labelInterpolationFnc: function(value) {
                return '$' + value;
              }

          },
          low: 10,
          height: "250px",
          high: 110,
            classNames: {
              point: 'ct-point ct-green',
              line: 'ct-line ct-green'
          }
        };

        Chartist.Line('#chartStock', dataStock, optionsStock);

//      init multiple lines chart
        var dataSales = {
          labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
          series: [
             [287, 385, 490, 562, 594, 626, 698, 895, 952],
            [67, 152, 193, 240, 387, 435, 535, 642, 744],
            [23, 113, 67, 108, 190, 239, 307, 410, 410]
          ]
        };

        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: 1000,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: true,
          showPoint: false,
        };

        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);

//      pie chart
        Chartist.Pie('#chartPreferences', {
          labels: ['62%','32%','6%'],
          series: [62, 32, 6]
        });

//      bar chart
        var dataViews = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
          ]
        };

        var optionsViews = {
          seriesBarDistance: 10,
          classNames: {
            bar: 'ct-bar'
          },
          axisX: {
            showGrid: false,

          },
          height: "250px"

        };

        var responsiveOptionsViews = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Bar('#chartViews', dataViews, optionsViews, responsiveOptionsViews);

//     multiple bars chart
        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [542, 543, 520, 680, 653, 753, 326, 434, 568, 610, 756, 895],
            [230, 293, 380, 480, 503, 553, 600, 664, 698, 710, 736, 795]
          ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartActivity', data, options, responsiveOptions);

	}

}


//---------------SOCIAL LINKER-----------------

function get_linker_data(id) {
    $.ajax({
        url: '/get_linker_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data)

            $('#linker_id').val(object.id);
            $('#linker_name').val(object.name)
            $('#link').val(object.social_link)
            $('#old_logo').attr('src',object.social_icon)

        }
    })
}

function deleteSocialLinker(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_linker/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}


//-------------------Profile ------------------


function get_profile_data(id) {
    $.ajax({
        url: '/get_profile_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            //console.log(data);
            let object = JSON.parse(data)

            $('#profile_id').val(object.id);
            $('#profile_name').val(object.profile_name)
            $('#profile_description').val(object.profile_description)
            $('#old_logo').attr('src',object.profile_image)

        }
    })
}
function deleteProfile(id) {
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_profile/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}
//-------------------CONTACT ------------------

function get_contact_data(id) {
    $.ajax({
        url: '/get_contact_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data)

            $('#contact_id').val(object.id);
            $('#email').val(object.email)
            $('#phone').val(object.phone)


        }
    })
}

function deleteContact(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_contact/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}


//------------------ABOUT------------------

function get_about_data(id) {
    $.ajax({
        url: '/get_about_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#about_id').val(object.id);
            $('#title').val(object.title);
            $('#title_description').val(object.title_description);
            $('#title_value').val(object.title_value);
            $('#old_logo').attr('src',object.title_image)


        }
    })
}

function deleteAbout(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_about/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

//------------------DESIGN------------------

function get_design_data(id) {
    $.ajax({
        url: '/get_design_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#design_id').val(object.id);
            $('#title').val(object.title);
            $('#title_description').val(object.title_description);
            // $('#title_value').val(object.title_value);
            $('#old_logo').attr('src',object.title_image)
            // $('#old_background').attr('src',object.background_image)


        }
    })
}

function deleteDesin(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_design/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

//-------------------CATEGORY ------------------

function get_category_data(id) {
    $.ajax({
        url: '/get_category_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#category_id').val(object.id);
            $('#old_category_type').val(object.category_type);
            $('#category_name').val(object.category_name);
            $('#category_description').val(object.category_description);
        }
    })
}

function deleteCategory(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_category/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

//------------------SLIDER------------------

function get_slider_data(id) {
    $.ajax({
        url: '/get_slider_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            //console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#slider_id').val(object.id);
            $('#title').val(object.slider_name);
            $('#old_logo').attr('src',object.slider_image)

        }
    })
}

function deleteSlider(id, st) {


    event.preventDefault(); // prevent form submit
    alert(st);
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_slider/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}


//------------------PHOTOGRAPHY SERVICE------------------

function get_service_data(id) {

    $.ajax({
        url: '/get_service_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#service_id').val(object.id);
            $('#title').val(object.title);
            $('#order_no').val(object.order_no);
            $('#title_description').val(object.title_description);
            $('#old_logo').attr('src',object.title_image)
        }
    })
}

function deleteService(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_service/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

function check_photo_service_prority(id) {
    event.preventDefault();
    //alert(id)
    $.ajax({
        url: 'check_validity/'+id,
        method: 'GET',
        success: function (response) {
            if (response === 0)
            {
                console.log("Available");
                $('.fed_btn').prop('disabled', false);
                $('.feedback').hide();

            }
            else
            {
                console.log(response);
                $('.feedback').show();
                $('.fed_btn').prop('disabled', true);
            }




        }, error: function (response) {
            console.log(response)
        }
    })
}

function get_photo_service_ordered_data() {


        var table = $('#data_tables').DataTable();
        var data =     table
            .column(1)
            .data()
            .toArray();


    $.ajax({
        method: 'post',
        data: {"_token": $('meta[name="csrf-token"]').attr('content'),"index_no": data},
        url: '/update_priority',


        success: function (resp) {
            // console.log(resp)
            window.location.reload();
            $('div.success_msg').show();
        },
        error: function (resp) {
            // console.log(resp)
        }
    });



}

//------------------BLOGS------------------

function get_blog_data(id) {
    $.ajax({
        url: '/get_blog_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);

            //alert(object.title_description)
            $('#blog_id').val(object.id);
            $('#old_cat_name').val(object.category.category_name);
            $('#title').val(object.title);
            //$('#tiny_description').val(object.description);
            tinyMCE.activeEditor.setContent(object.description);
            $('#old_logo').attr('src',object.image)


        }
    })
}

function deleteBlog(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_blog/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

//------------------MULTIPLE IMAGE-----------

$(document).ready(function() {

    $(".btn-success").click(function(){
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click",".btn-danger",function(){
        $(this).parents(".control-group").remove();
    });


});

function deleteGallery(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_gallery/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

function get_gallery_data(id) {

    $('#old_img').html("");
    $.ajax({
        url: '/get_gallery_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            //console.log(data);
            let object = JSON.parse(data);

            let ss = object.category.category_name;
            // $("div.old_cat select").val(object.category.category_name);
            // $("#category_id").val(ss).change();
            // $('div.id_100 option[value=ss]').attr('selected','selected');
            //console.log(object);
            //console.log(object.category.category_name)
            $('#gallery_id').val(object.id);
            $('#old_category_id').val(object.category_id);
            $('#old_category_name').val(object.category.category_name);
            $('#gallery_title').val(object.gallery_title)

            $.each(JSON.parse(object.gallery_images) ,function (index, val) {
                //console.log(value);
                //$('#old_img').append("<img src='"+value+"' width=\"70\" height=\"auto\"/> <br> <button class='btn btn-xs  btn-danger'>DELETE</button> &nbsp;");
                $('#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
                    "<img src='"+val+"' alt=\"\" width=\"70\" height=\"auto\">\n" +
                    "<br> <a id='delete_image' onclick='delete_image(\""+val+"\",\""+object.id+"\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");
                //$('#old_logo').attr('src',value)

                // $('form').append('<input type="hidden" name="document[]" value="' + value + '">')
            });

        },
        error: function (resp) {
            console.log(resp)
        }
    })
}

function delete_image(name,id) {
    //alert(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'delete_selected_image',
        method: 'get',
        data: {
                data_id: id,
                name: name
            },
        contentType: 'application/json; charset=utf-8',
        dataType: "json",
      /*  beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },*/
        success: function (object) {

            //console.log(resp);
            // let object = JSON.parse(resp);
            $('#old_img').html("");
            $.each(JSON.parse(object.gallery_images) ,function (index, val) {


                $('div#old_img').append("<div class='col-md-3 mb-md-3' >\n" +
                    "<img src='"+val+"' alt=\"\" width=\"70\" height=\"auto\">\n" +
                    "<br> <a id='delete_image' onclick='delete_image(\""+val+"\",\""+object.id+"\")' class='btn btn-sm  btn-danger'>DELETE</a></div>");

            });

        },
        error: function (resp) {
            console.log(resp);
        }
    })
}


//------------------VIDEOGRAPHY------------------

function get_video_data(id) {
    $.ajax({
        url: '/get_video_data/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);
            //alert(object.title_description)
            $('#video_id').val(object.id);
            $('#old_cat_id').val(object.category_id);
            $('#old_cat_name').val(object.category.category_name);
            $('#video_title').val(object.name);

            $('.video_file').attr('src',object.video_file)
        },
        error: function (resp) {
            console.log(resp)
        }
    })
}

function delete_Video(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert(id)
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_videography/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}


//------------------VIDEOGRAPHY SERVICE------------------

function get_video_service_data(id) {
    $.ajax({
        url: '/get_video_service_info/'+id,
        method: 'get',
        success: function (data) {
            //alert(data)
            console.log(data);
            let object = JSON.parse(data);
            //alert(object.title_description)
            $('#video_service_id').val(object.id);
            $('#video_title').val(object.title);
            $('#order_no').val(object.order_no);
            $('#video_title_description').val(object.title_description);
            $('#old_logo').attr('src',object.title_image)

        }
    })
}

function deleteVideoService(id) {
    //alert(id)
    event.preventDefault(); // prevent form submit
    swal({
            title: "Are you sure?",
            text: "You won't be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, archive it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                //alert('hi')
                swal("Success", "Your imaginary file is deleted", "success");
                window.location.href = '/delete_video_service/'+id;
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

function check_video_service_priority(id) {
    event.preventDefault();
    //alert(id)
    $.ajax({
        url: 'check_video_service_priority/'+id,
        method: 'GET',
        success: function (response) {
            if (response === 0)
            {
               // console.log("Available");
                $('.fed_btn').prop('disabled', false);
                $('.feedback').hide();

            }
            else
            {
                console.log(response);
                $('.feedback').show();
                $('.fed_btn').prop('disabled', true);
            }




        }, error: function (response) {
            console.log(response)
        }
    })
}

function get_video_service_ordered_data() {

    var table = $('#datatable').DataTable();
    var data =  table
        .column(1)
        .data()
        .toArray();

    $.ajax({
        method: 'post',
        data: {"_token": $('meta[name="csrf-token"]').attr('content'),"index_no": data},
        url: '/update_video_service_priority',

        success: function (resp) {
            // console.log(resp)


            window.location.reload();
            $('div.success_msg').show();
        },
        error: function (resp) {
            // console.log(resp)
        }
    });



}



