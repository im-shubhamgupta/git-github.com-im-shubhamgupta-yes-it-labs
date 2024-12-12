function calculateDistance(lat1, lng1, lat2, lng2, unit = 'K') {
    const toRadians = (degree) => degree * (Math.PI / 180); // Convert degrees to radians
    console.log(toRadians);
    // Convert latitude and longitude to radians
    lat1 = toRadians(lat1);
    lng1 = toRadians(lng1);
    lat2 = toRadians(lat2);
    lng2 = toRadians(lng2);

    // Haversine formula
    const dlat = lat2 - lat1;
    const dlng = lng2 - lng1;

    const a = Math.sin(dlat / 2) ** 2 +
              Math.cos(lat1) * Math.cos(lat2) *
              Math.sin(dlng / 2) ** 2;

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    const earthRadiusKm = 6371; // Radius of Earth in kilometers
    let distance = earthRadiusKm * c; // Distance in kilometers

    // Convert distance based on unit
    if (unit === 'M') {
        distance *= 0.621371; // Kilometers to miles
    } else if (unit === 'N') {
        distance *= 0.539957; // Kilometers to nautical miles
    }

    return distance;
}
function calc_distance(){
    var to_long = $('#to_long').val();
    var to_lat =$('#to_lat').val();
    var from_long =$('#from_long').val();
    var from_lat =$('#from_lat').val();
    console.log(to_lat);
    console.log(to_long);
    console.log(from_lat);
    console.log(from_long);
    var distance = calculateDistance(to_lat,to_long,from_lat,from_long).toFixed(2);
    console.log(distance);
    if(distance){
        $('#distance').val(distance+' km');
    }
}

function getAudioDuration(file, callback) {
    // Create an audio element
    const audio = new Audio();
    audio.addEventListener('loadedmetadata', () => {
        // Audio duration in seconds
        const duration = audio.duration;
        callback(null, duration);
    });

    audio.addEventListener('error', () => {
        callback('Failed to load audio file', null); // Pass error to the callback
    });

    // Assign the file's URL to the audio source
    audio.src = URL.createObjectURL(file);
}
function get_audio_length(){
    const input = document.querySelector('#audioInput');
    // Add event listener to get audio duration
    // input.addEventListener('change', (event) => {
        // var file = event.target.files[0];
        var file = input.files[0];
        if (file) {
            getAudioDuration(file, (error, duration) => {
                if (error) {
                    console.error(error);
                } else {
                    $('#audioLength').val(duration.toFixed(2) + ' seconds');
                    console.log(`Audio Duration: ${duration.toFixed(2)} seconds`);
                }
            });
        } else {
            console.log('No file selected');
        }
    // });
}



