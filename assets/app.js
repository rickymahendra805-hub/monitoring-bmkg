function updateClock() {

    const clock = document.getElementById("clock");

    if (!clock) {
        return;
    }

    const now = new Date();

    clock.textContent =
        now.toLocaleTimeString("id-ID");
}

updateClock();

setInterval(updateClock, 1000);