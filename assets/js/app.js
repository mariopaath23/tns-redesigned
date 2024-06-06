function loadServerTime(){
    fetch('../lib/get-time.php')
        .then(response => response.text())
        .then(data => {
            const time = document.getElementById('server-time');
            time.innerHTML = data;
        })
        .catch(error => {
            console.error('Failed to load server time', error);
        });

}

document.addEventListener('DOMContentLoaded', () => {
    loadServerTime();
    setInterval(loadServerTime, 1000);
});