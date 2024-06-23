

document.addEventListener('DOMContentLoaded', function () {
    var title = document.getElementById('stitle');

    if (title) {
        title.style.height = '1.2em';

        var typewriter = new Typewriter(title, {
            loop: true,
            delay: 75,
            cursor: ''
        });

        typewriter.typeString(stitle)
            .pauseFor(1000)
            .deleteAll()
            .typeString(stext)
            .callFunction(() => {
                typewriter.typeString('')
                    .callFunction(() => {
                        title.style.position = 'static';
                        title.style.display = 'block';
                        title.style.whiteSpace = 'normal';
                        typewriter.start();
                    });
            })
            .pauseFor(5000) // Add a longer pause after the previous text
            .deleteAll() // Delete the previous text
            .typeString('Front-end Developer') // Add new text "Front-end Developer"
            .pauseFor(2000) // Add a pause after the new text
            .deleteAll() // Delete the new text
            .typeString('Back-end Developer') // Add new text "Back-end Developer"
            .pauseFor(2000) // Add a pause after the new text
            .deleteAll() // Delete the new text
            .typeString('Web Developer') // Add new text "Web Developer"
            .pauseFor(2000) // Add a pause after the new text
            .start();

        setInterval(function () {
            typewriter.start();
        }, 5000); // Change the time interval as needed
    }
});