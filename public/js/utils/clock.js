$(document).ready(function() {
    // Fecha y hora de la boda
    var countDownDate = new Date("Jan 11, 2025 18:00:00").getTime();

    // Actualizar la cuenta regresiva cada segundo
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Actualizar el DOM con los valores
        $('#days').text(days);
        $('#hours').text(hours);
        $('#minutes').text(minutes);
        $('#seconds').text(seconds);
    }, 1000);

});
