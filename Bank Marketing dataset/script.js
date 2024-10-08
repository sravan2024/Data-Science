document.getElementById('prediction-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const age = parseInt(document.getElementById('age').value);
    const job = document.getElementById('job').value;
    const marital = document.getElementById('marital').value;

    
    let prediction;

    if (age < 30) {
        if (job === 'admin') {
            prediction = 'Yes';
        } else {
            prediction = 'No';
        }
    } else if (age >= 30 && age < 60) {
        if (marital === 'married') {
            prediction = 'Yes';
        } else {
            prediction = 'No';
        }
    } else {
        prediction = 'No';
    }

    document.getElementById('result').textContent = `Prediction: ${prediction}`;
});
