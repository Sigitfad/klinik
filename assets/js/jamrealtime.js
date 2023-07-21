//SET JAM
function updateClock(){
    const now = new Date();
    const hours = now.getHours();
    const minutes = now.getMinutes();
    const second = now.getSeconds();
    const clock = document.getElementById("clock");
    clock.textContent = ` Jam: ${hours}:${minutes}:${second}`;
}
setInterval(updateClock, 1000);