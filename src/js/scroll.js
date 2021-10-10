function onEntry(entry) {
    entry.forEach(change => {
        if (change.isIntersecting) {
            anime({
                targets: change.target,
                translateY: 25,
                loop: false,
                easing: 'spring(1, 80, 10, 0)',
                opacity: 1
            })
        }
    })
}

let options = {
    threshold: [0.3]
}
let observer = new IntersectionObserver(onEntry, options)
let elements = document.querySelectorAll('.post')

for (let elm of elements) {
    observer.observe(elm)
}