
const accidentData = [
    { lat: 40.7128, lon: -74.0060, timeOfDay: 'morning', roadCondition: 'dry', weather: 'clear' },
    { lat: 34.0522, lon: -118.2437, timeOfDay: 'night', roadCondition: 'wet', weather: 'rainy' },
    
];


const map = L.map('map').setView([40.7128, -74.0060], 10);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

function updateMap() {
    const timeOfDayFilter = document.getElementById('timeOfDay').value;
    const roadConditionFilter = document.getElementById('roadCondition').value;
    const weatherFilter = document.getElementById('weather').value;

    
    map.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
            map.removeLayer(layer);
        }
    });

    
    accidentData.forEach((accident) => {
        if (
            (timeOfDayFilter === 'all' || accident.timeOfDay === timeOfDayFilter) &&
            (roadConditionFilter === 'all' || accident.roadCondition === roadConditionFilter) &&
            (weatherFilter === 'all' || accident.weather === weatherFilter)
        ) {
            L.marker([accident.lat, accident.lon]).addTo(map);
        }
    });
}


document.getElementById('timeOfDay').addEventListener('change', updateMap);
document.getElementById('roadCondition').addEventListener('change', updateMap);
document.getElementById('weather').addEventListener('change', updateMap);


updateMap();


const ctx = document.getElementById('charts').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Morning', 'Afternoon', 'Evening', 'Night'],
        datasets: [{
            label: 'Accidents by Time of Day',
            data: [12, 19, 3, 5], 
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
