"use strict";
let counter;
let posts = [];
counter = 0;
function onEntry(entry) {
    entry.forEach(change => {
        if (change.isIntersecting) {
            function randd(min, max) {
                return Math.random() * (max - min) + min;
            }
            anime({
                targets: change.target,
                opacity: 1,
                translateY: 25,
                translateX: 0,
                loop: false,
                easing: 'spring(1, 80, 10, 0)',
                duration: 1000,
                delay: function(el, i, l) {
                    return randd(1,4) * randd(50, 100);
                },
                endDelay: function(el, i, l) {
                    return (l - randd(1,4)) * randd(50, 100);
                }
            })
            if (!change.target.classList.contains('Post-Showed')) {
                counter++;
            }
            change.target.classList.add('Post-Showed')
            if (counter >= 9) {
                alert("Loading More Posts")
                counter = 0
            }
        }
    })
}

let options = {
    threshold: [0.2]
}
let observer = new IntersectionObserver(onEntry, options)
let elements = document.querySelectorAll('.post')

for (let elm of elements) {
    observer.observe(elm)
}
//
// Burger Toggle
$(function () {
    $('.toggle-burger').click(function () {
        $(this).toggleClass('active')

        if ($('.toggle-burger').hasClass( "active" )) {
            anime({
                targets: '.burger-menu .menu',
                keyframes: [
                    {opacity: 1},
                    {translateY: 20},
                    {width: 400},
                    {translateX: 0},
                    {height: 500},
                ],
                loop: false,
                easing: 'cubicBezier(.5, .05, .1, .3)',
                duration: 2500,
                opacity: 1
            })
        } else {
            anime({
                targets: '.burger-menu .menu',
                keyframes: [
                    {height: 0},
                    {translateX: 2500},
                    {opacity: 0},
                ],
                loop: false,
                easing: 'cubicBezier(.5, .05, .1, .3)',
                duration: 1500,
                opacity: 1
            })
        }
    })
})