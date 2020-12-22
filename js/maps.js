(function($) {
    "use strict";
	    var imageUrl = "images/car-marker.png";
        var markerImage = new google.maps.MarkerImage(imageUrl, new google.maps.Size(50, 77));
        var marker = new google.maps.Marker({
            'icon': markerImage,
            'optimized': false
        });
   
    function mainMap() {
		
        function locationData(adImg,adPrice,isFeatured,categoryLink,categorytitle,adTitle,addLocation,adlink,adTime ){
            return ('<div class="category-grid-box-1"><div class="image"><img alt="' + adTitle + '" src="' + adImg + '" class="img-responsive"><div class="featured-ribbon"><span>' + isFeatured + '</span></div><div class="price-tag"><div class="price"><span>' + adPrice + ' </span></div></div></div><div class="short-description-1 clearfix"><div class="category-title"> <span><a href="' + categoryLink + ' ">' + categorytitle + '</a></span> </div><h3><a href="' + adlink + '">' + adTitle + '</a></h3><p class="location"><i class="fa fa-map-marker"></i> '+ addLocation +'</p></div><div class="ad-info-1"><p><i class="flaticon-calendar"></i> &nbsp;<span></span>'+ adTime+' </p></div></div>');
        }
        var locations = [
			[locationData('images/posting/2.jpg','$27,00','Featured','#','Car & Bikes','2015 Ferrari 458 Italia Convertible','Model Town Link Road London','single-page-listing.html','5 Days ago'), 39.739236, -104.990251, 1, markerImage],
			[locationData('images/posting/3.jpg','$66,000','Featured','#','Car & Bikes','Ford Focus 1.6 TDCi Edge 5dr','Model Town Link Road London','single-page-listing.html','1 Days ago'), 39.742119, -104.987036, 2, markerImage],
			[locationData('images/posting/4.jpg','$77,00','Featured','#','Car & Bikes','BMW 5 SERIES 2.0 520d M Sport','Model Town Link Road London','single-page-listing.html','2 Days ago'), 39.742069, -104.995619, 3, markerImage],
			[locationData('images/posting/5.jpg','$15,000','Featured','#','Car & Bikes','Honda Civic 2017 Sports Edition','Model Town Link Road London','single-page-listing.html','1 Days ago'), 39.741832, -104.974687, 4, markerImage],
			[locationData('images/posting/6.jpg','$555,00','Featured','#','Car & Bikes','McLaren F1 Sports Car','Model Town Link Road London','single-page-listing.html','1 Days ago'), 39.720600, -104.945065, 5, markerImage],
			[locationData('images/posting/7.jpg','$100,00','Featured','#','Car & Bikes','2015 Lamborghini Huracan','Model Town Link Road London','single-page-listing.html','2 Days ago'), 39.099727, -94.578567, 6, markerImage],
			[locationData('images/posting/8.jpg','$77,00','Featured','#','Car & Bikes','Honda Civic 2017 Sports Edition','Model Town Link Road London','single-page-listing.html','5 Days ago'), 41.5817, -90.3434615, 7, markerImage],
			[locationData('images/posting/9.jpg','$47,00','Featured','#','Car & Bikes','2017 Audi A4 quattro Premium','Model Town Link Road London','single-page-listing.html','1 Days ago'), 40.15972196, -115.50853729, 8, markerImage],
			[locationData('images/posting/11.jpg','$127,00','Featured','#','Car & Bikes','2017 BMW 520d Luxury G30 Auto','Model Town Link Road London','single-page-listing.html','2 Days ago'), 36.1699412, -115.1398296, 9, markerImage],
			[locationData('images/posting/14.jpg','$970,00','Featured','#','Car & Bikes','2011 Bugatti Veyron Super Sport ','Model Town Link Road London','single-page-listing.html','1 Days ago'), 37.0965278, -113.5684164, 10, markerImage],
			[locationData('images/posting/15.jpg','$27,00','Featured','#','Car & Bikes','2015 Ferrari 458 Italia Convertible','Model Town Link Road London','single-page-listing.html','5 Days ago'), 40.7607793, -111.8910474, 11, markerImage],
			[locationData('images/posting/16.jpg','$17,00','Featured','#','Car & Bikes','Audi Q5 2.0T quattro Premium ','Model Town Link Road London','single-page-listing.html','2 Days ago'), 40.75746511, -111.8908596, 12, markerImage],
            
        ];
        var mapZoomAttr = $('#map').attr('data-map-zoom');
        var mapScrollAttr = $('#map').attr('data-map-scroll');
        if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) {
            var zoomLevel = parseInt(mapZoomAttr);
        } else {
            var zoomLevel = 6;
        }
        if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) {
            var scrollEnabled = parseInt(mapScrollAttr);
        } else {
            var scrollEnabled = false;
        }
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoomLevel,
            scrollwheel: scrollEnabled,
            center: new google.maps.LatLng(39.639537564366684, -101.77734375),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            navigationControl: false,
            streetViewControl: false,
			

			
            styles: [{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#f49935"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#fad959"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#a1cdfc"},{"saturation":30},{"lightness":49}]}]
        });
        var boxText = document.createElement("div");
        boxText.className = 'grid-style-2'
        var currentInfobox;
        var boxOptions = {
            content: boxText,
            disableAutoPan: true,
            alignBottom: true,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-60, -55),
            zIndex: null,
            boxStyle: {
                width: "360px"
            },
            closeBoxMargin: "0",
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false,
        };
        var markerCluster, marker, i;
        var allMarkers = [];
        var clusterStyles = [{
            textColor: 'white',
            url: '',
            height: 50,
            width: 50
        }];
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, map);

        function ZoomControl(controlDiv, map) {
            zoomControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';
            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);
            var zoomInButton = document.createElement('div');
            zoomInButton.className = "custom-zoom-in";
            controlWrapper.appendChild(zoomInButton);
            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "custom-zoom-out";
            controlWrapper.appendChild(zoomOutButton);
            google.maps.event.addDomListener(zoomInButton, 'click', function() {
                map.setZoom(map.getZoom() + 1);
            });
            google.maps.event.addDomListener(zoomOutButton, 'click', function() {
                map.setZoom(map.getZoom() - 1);
            });
        }
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                icon: locations[i][4],
                id: i
            });
            allMarkers.push(marker);
            var ib = new InfoBox();
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    ib.setOptions(boxOptions);
                    boxText.innerHTML = locations[i][0];
                    ib.open(map, marker);
                    currentInfobox = marker.id;
                    var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
                    map.panTo(latLng);
                    map.panBy(0, -180);
                    google.maps.event.addListener(ib, 'domready', function() {
                        $('.infoBox-close').click(function(e) {
                            e.preventDefault();
                            ib.close();
                        });
                    });
                }
            })(marker, i));
        }
        var options = {
            imagePath: 'images/',
            styles: clusterStyles,
            minClusterSize: 2
        };
        markerCluster = new MarkerClusterer(map, allMarkers, options);
        google.maps.event.addDomListener(window, "resize", function() {
			
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
       

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    map.setCenter(pos);
                    map.setZoom(12);
                });
            }
        }
        $('#nextpoint').click(function(e) {
            e.preventDefault();
            map.setZoom(15);
            var index = currentInfobox;
            if (index + 1 < allMarkers.length) {
                google.maps.event.trigger(allMarkers[index + 1], 'click');
            } else {
                google.maps.event.trigger(allMarkers[0], 'click');
            }
        });
        $('#prevpoint').click(function(e) {
            e.preventDefault();
            map.setZoom(15);
            if (typeof(currentInfobox) == "undefined") {
                google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
            } else {
                var index = currentInfobox;
                if (index - 1 < 0) {
                    google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                } else {
                    google.maps.event.trigger(allMarkers[index - 1], 'click');
                }
            }
        });
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            map.setOptions({
                draggable: false
            });
        }
    }
    var map = document.getElementById('map');
    if (typeof(map) != 'undefined' && map != null) {
        google.maps.event.addDomListener(window, 'load', mainMap);
        google.maps.event.addDomListener(window, 'resize', mainMap);
    }

  
})(this.jQuery);