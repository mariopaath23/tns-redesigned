function loadpage(page){
    const content = document.getElementById('content');

    fetch(page)
        .then(response => response.text())
        .then(data => {
            content.innerHTML = data;
         })
         .catch(error => {
            content.innerHTML = '<h1>Something went wrong :(</h1>';
            console.error('Failed to load the page', error);
         });
}

function loadServerTime(){
    fetch('get-time.php')
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
    loadpage('beranda.php');
    loadServerTime();
    setInterval(loadServerTime, 1000);
});