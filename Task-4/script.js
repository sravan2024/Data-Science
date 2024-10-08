
const sentimentData = {
    labels: ['Positive', 'Negative', 'Neutral'],
    datasets: [{
        label: 'Sentiment Analysis',
        data: [120, 45, 35], 
        backgroundColor: [
            'rgba(75, 192, 192, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 205, 86, 0.6)'
        ],
        borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(255, 205, 86, 1)'
        ],
        borderWidth: 1
    }]
};


const config = {
    type: 'pie', 
    data: sentimentData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Sentiment Analysis Results'
            }
        }
    }
};


const ctx = document.getElementById('sentimentChart').getContext('2d');
const sentimentChart = new Chart(ctx, config);
