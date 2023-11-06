(function(){
    document.getElementById('today_year').innerHTML = new Date().getFullYear();
    let info = `
    Name: Daniel Chacón.
    Location: United States of America
    Expertise: Web Development

    Education:
    - Parkland College -> Data Systems
    - Team Tree House -> Front End Web Development Track
    - Udemy - Front End Web Development Track

    Certifications:
    - JavaScript Algorithms and Data Structures -> FreeCodeCamp
    - Responsive Web Design -> FreeCodeCamp

    Technical Skills:
    - JavaScript | HTML | SASS | VueJS | jQuery
    - NodeJs | PHP | Shell Scripting (BASH)

    Additional Skills:
    - Git/GitHub | WCAG | Agile
    - Photoshop | Illustrator

    Let's connect!
    `;

    function printLine(el, text) {
        text = prepareToPrint(text);
        if(el.textContent.length == text.length) return;

        let textToPrint = text.split('').filter((val, i) => i<=el.textContent.length).join(''),
            delay = /[.:?\n]/g.test(textToPrint.charAt(textToPrint.length-1)) ? 500 : 25;

        el.innerHTML = convertStringToHTML(textToPrint);

        setTimeout(function() {
            printLine(el, text)
        }, delay)
    }

    function prepareToPrint(text) {
        if(text.charAt(0) == '>') return text;
        text = text.trim().replace(/\n/gm, '\n> ');
        text = (text.charAt(0) != '>' ? '> ' : '') + text;
        text += '\n> ';
        return text;
    }

    function convertStringToHTML(text) {
        return text.split('').map(val => convertCharacterToHTML(val)).join('');
    }

    function convertCharacterToHTML(char) {
        if(!['\n','\t','\r'].filter(val => char == val).length) return char;

        switch(char) {
            case '\n':
                return char+'<br>';
            break;
            default:
                return char;
            break;
        }
    }

    function printFast(el, text) {
        text = prepareToPrint(text);
        el.innerHTML = convertStringToHTML(text);
    }

    printLine(document.getElementById('print_screen'), info);

    ['click', 'keypress'].forEach((e) => {
        document.getElementById('fast_print').addEventListener(e, () => {
            printFast(document.getElementById('print_screen'), info)
        })
    })
})()