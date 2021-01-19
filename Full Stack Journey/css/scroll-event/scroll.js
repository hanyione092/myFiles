// var scrollValue = 0;
// var scrollTimeout = false

// $(window).scroll(function(event){
//     /* Clear it so the function only triggers when scroll events have stopped firing*/
//     clearTimeout(scrollTimeout);
//     /* Set it so it fires after a second, but gets cleared after a new triggered event*/
//     scrollTimeout = setTimeout(function(){
//         var scrolled = $(document).scrollTop() - scrollValue;
//         scrollValue = $(document).scrollTop();
//         alert("The value scrolled was " + scrolled);
//     }, 1000);
// });
window.onscroll = function (e) {
    console.log(window.scrollY); // Value of scroll Y in px
};