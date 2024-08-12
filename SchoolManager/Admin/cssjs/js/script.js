// Set the date we're counting down to
var countDownDate = new Date("Jan 19, 2019 15:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    $('#jours').html(days);
    $('#heures').html(hours);
    $('#minutes').html(minutes);
    $('#secondes').html(seconds);
    // Display the result in an element with id="demo"
    //   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    //   + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);

var body_slider = setInterval(function(){
    var elt = $(".body-slider .hotes").first();
    $(elt).animate({"margin-left": -$(elt).width()}, 800, function(){
        var last = $(".body-slider .hotes").last();
        if($(last).hasClass('pair')){
            $(elt).removeClass('pair');
        }else{
            $(elt).addClass('pair');
        }
        $(this).css("margin-left", 0).appendTo(".body-slider");
    });
}, 5000);