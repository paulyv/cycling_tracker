
    // Snazzymaps.com
    var myMapStyle = [
        {
            "featureType": "all",
            "stylers": [
                {
                    "saturation": 0
                },
                {
                    "hue": "#e7ecf0"
                }
            ]
        },
        {
            "featureType": "road",
            "stylers": [
                {
                    "saturation": -70
                }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "stylers": [
                {
                    "visibility": "simplified"
                },
                {
                    "saturation": -60
                }
            ]
        }
    ];

    var map = null;
    var run_coordinates = [];
    var lengthInMeters = 0;
    var timer;
    var timer2;
    var running = false;
    var hrs = 0;
    var min = 0;
    var sec = 0;
   


    // Start script when the page is loaded
    window.onload = function () {

            initialize();
        }





     // Main script that runs first.
    function initialize() {

        $('#map').text("\n\n Waiting for more accurate location data..");

        google.maps.visualRefresh = true;

        var geo_options = {
            enableHighAccuracy : true,
            maximumAge : 0,
            timeout : 7000
        };

        // HTML5 Geolocation (watch position means automatic updating)
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(returnPos, displayError, geo_options);
        }

        ShowLocalDate();

        var startBtn = document.getElementById("startButton");
        startBtn.onclick = startClock;

        var stopBtn = document.getElementById("stopButton");
        stopBtn.onclick = stopClock;
    }




    // This is the updating function which basically calls all other functions like addPolyLine()
    function returnPos(position) {

        var lat = position.coords.latitude;
        var lon = position.coords.longitude;

        if (map == null && position.coords.accuracy < 150) {
            showMap(position.coords);
        }

        map.panTo(new google.maps.LatLng(lat, lon));
        
        // -----------------------------------------------------------------------------    

        var accuracyDiv = document.getElementById("accuracy");
        accuracyDiv.innerHTML = (position.coords.accuracy).toFixed(0) + "m";

        var speedDiv = document.getElementById("speed");
        speedDiv.innerHTML = (position.coords.speed * 3.6).toFixed(2) + " km/h / " + calcAvg() + " km/h";

        if (position.coords.accuracy < 150 && running) {
            run_coordinates.push(new google.maps.LatLng(lat, lon));
            addPolyLine(map, run_coordinates);
        }
    }


    function calcAvg() {

        var time = document.getElementById("duration").textContent;
        var distance = parseFloat(document.getElementById("distance").textContent);
        var hrs = parseInt(time.split(":")[0]);
        var min = parseInt(time.split(":")[1]);
        var sec = parseInt(time.split(":")[2]);
        var timeInSecs = (hrs*3600)+(min*60)+(sec);
       
        // secs to hours
        timeInSecs = timeInSecs / 3600;
        // calculate the average speed
        var avgSpeed = distance / timeInSecs;

        if(isNaN(avgSpeed)){
            return "0.00";
        } else {
            return avgSpeed.toFixed(2);
        }
    }

    // Initially display the map in the mapDiv

    function showMap(coords) {

        latlng = new google.maps.LatLng(coords.latitude, coords.longitude);

        var myOptions = {
            draggable : false,
            zoom : 15,
            center : latlng,
            mapTypeId : google.maps.MapTypeId.ROADMAP,
            styles: myMapStyle
            };

        var mapDiv = document.getElementById("map");
        map = new google.maps.Map(mapDiv, myOptions);
        $('#map').fadeIn(2000);
    }





    // Adds a new polyline to the map according to path array values

    function addPolyLine(map, path) {

        var run_path = new google.maps.Polyline({
            path : path,
            strokeColor : "#2AC2FF",
            strokeOpacity : 0.8,
            strokeWeight : 4
        });
        run_path.setMap(map);

        // Calculate & Display distance of polyline path

        lengthInMeters = google.maps.geometry.spherical.computeLength(run_path.getPath());
        lengthInMeters = (lengthInMeters / 1000).toFixed(2);
        var tripLengthDiv = document.getElementById("distance").innerHTML = lengthInMeters + "km";

    }




    // get&set current date

    function ShowLocalDate(){
   
    var dNow = new Date();
    var localdate=  dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear();
    $('#date').text(localdate)
    }

    // When start button is clicked, set timer to start incClock every 1000millis
    function startClock() {
            timer = self.setInterval(incClock, 1000);
            timer2 = self.setInterval(calcAvg, 1000);
            running = true;
    }

    function stopClock() {
            clearInterval(timer);
            clearInterval(timer2);
            running = false;
            alert("You've travelled: " + lengthInMeters + " km in " + incClock() + " with an average speed of " + calcAvg() + " km/h");
    }




    // Increment clock every 1sec and display the changes
    function incClock() {

        sec++;
            if (sec == 60) {
                sec = 0;
                min++;
            }
            if (min == 60) {
                min = 0;
                hrs++;
            }
            // 0:0:0 to -> 00:00:00
            (sec.toString().length < 2) ? sec = '0' + sec : sec = sec;
            (min.toString().length < 2) ? min = '0' + min : min = min;
            (hrs.toString().length < 2) ? hrs = '0' + hrs : hrs = hrs;

            currentTime = hrs + ':' + min + ':' + sec;
            $('#duration').text(currentTime);

            return currentTime;
    }



    function displayError(error) {}