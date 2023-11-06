<?php
function get_home()
{
	set_home_meta();

	$GLOBALS['page_content'] = set_home_content();
}

function set_home_meta()
{
	$GLOBALS['page_scripts'] = [
        ROOT.'/assets/js/home.js'
    ];

	$GLOBALS['page_styles'] = [
		ROOT.'/assets/css/home.css'
	];

	$GLOBALS['page_title'] = 'Daniel Chacón';
}

function set_home_content()
{
    ob_start(); ?>

<header>
    <div class="site-max">
        <div class="headerbar">
            <div class="logo-container">
                <a href="/" aria-label="devdc tech">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8.8" width="40" aria-hidden="true">
                        <path d="M3.2,8.1C4.1,5.4,4.9,2.7,5.7,0c0.3,0.2,0.7,0.5,1,0.7C5.9,3.4,5.1,6.1,4.3,8.8C3.9,8.6,3.6,8.3,3.2,8.1z"/>
                        <path d="M0,4.4C0.8,3.6,1.6,2.8,2.4,2C2.7,2.3,3,2.6,3.2,2.9c-0.5,0.5-1,1-1.5,1.5c0.5,0.5,1,1,1.5,1.5C3,6.2,2.7,6.5,2.4,6.8 C1.6,6,0.8,5.2,0,4.4z"/>
                        <path d="M10,4.4C9.2,5.2,8.4,6,7.6,6.8C7.3,6.5,7,6.2,6.8,5.9c0.5-0.5,1-1,1.5-1.5c-0.5-0.5-1-1-1.5-1.5C7,2.7,7.3,2.4,7.6,2.1 C8.4,2.8,9.2,3.6,10,4.4z"/>
                    </svg>
                </a>
            </div>
            <nav id="navbar" aria-label="Page" class="page-nav">
                <ul class="page-nav__list">
                    <li class="page-nav__list">
                        <a class="page-nav__link"href="#projects">Projects</a>
                    </li>
                    <li class="page-nav__list">
                        <a class="page-nav__link" href="#connect">Connect</a>
                    </li>
                    <li class="page-nav__list">
                        <a class="page-nav__link" href="/resume/">Resume</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main id="main">
    <div class="site-max">
        <section id="welcome-section" class="welcome">
            <div class="columns">
                <div class="intro gutter-wrapper">
                    <h1 class="primary-heading">Hello there. Nice to meet you.</h1>
                    <p>My name is Daniel Chacón.</p>

                    <p>I love technology. Throughout my career, I have gained a strong foundation in HTML, CSS, and JavaScript. In addition to my technical skills, I am a strong collaborator and communicator, and have experience working in cross-functional teams.</p>

                    <p>I have worked on a variety of projects which have given me a variety of skills. Enjoy the animation! You can also <button id="fast_print" type="button">print it faster</button>.</p>
                </div>
                <div class="terminal gutter-wrapper">
                    <div class="terminal__console">
                        <p id="print_screen" class="terminal__text"></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="site-max">
        <section id="projects" class="projects gutter-wrapper">
            <div>
                <h2 class="secondary-heading">Look at what I did!</h2>

                <ul>
                    <li>
                        <a class="project-tile" href="https://devdc.tech/apps/vue-quiz/">
                            <p class="project-tile__title">Vue Quiz</p>

                            <p>See the quiz that has every one talking!</p>
                        </a>
                    </li>
                    <li>
                        <a class="project-tile" href="https://dchacon1.github.io/career-path-template/">
                            <p class="project-tile__title">Career Path Generator</p>

                            <p>Another one built with Vue.</p>
                        </a>
                    </li>
                    <li>
                        <a class="project-tile" href="https://codepen.io/Vash007/">
                            <p class="project-tile__title">Code Pen</p>
                            <p>See my doodles!</p>
                        </a>
                    </li>
                </ul>


                <!-- <a id="profile-link" class="absolute-link" href="https://www.freecodecamp.org/devdc/" target="_blank">See more<span aria-label="(Opens in a new window)"><svg aria-hidden="true" width="10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.6 212.6"><path d="M18.9 18.8v174.8h174.7c.1-1.2.2-2.4.2-3.7v-58.5c0-1.6 0-3.2.4-4.7 1.1-4.2 5.4-7.1 9.6-6.8 4.5.4 8.2 3.9 8.7 8.3.1.8.1 1.7.1 2.5v70.9c0 7.3-3.6 10.9-10.9 10.9H10.8C3.6 212.6 0 209 0 201.9V10.8C0 3.6 3.6 0 10.7 0h72.2c5.1 0 8.8 3.1 9.6 7.9.7 4.4-1.9 8.9-6.2 10.2-1.7.5-3.6.6-5.3.6H23.1c-1.3.1-2.5.1-4.2.1z"/><path d="M180.3 18.8H135.5c-1.8 0-3.7-.1-5.3-.6-4.3-1.4-6.8-5.9-6.1-10.3.7-4.3 4.4-7.7 8.8-7.7 23.5-.1 47.1-.1 70.6 0 5 0 8.9 3.9 8.9 8.9.1 23.5.1 47.1 0 70.6 0 5.1-4.2 8.9-9.3 9-5.3 0-9.3-3.9-9.4-9.5-.1-14.2 0-28.4 0-42.6v-3.4c-.5-.3-.9-.7-1.4-1-.5 1-.9 2.3-1.7 3.1-23.3 23.3-46.6 46.7-69.9 69.9-1.7 1.6-3.9 3.1-6.1 3.7-4 1.1-8-.9-10-4.4-2-3.6-1.6-8 1.4-11.2 4.5-4.6 9.1-9.2 13.7-13.7l57.8-57.8c.9-.9 1.6-1.7 2.8-3z"/></svg></span></a> -->
                <a class="absolute-link" href="/resume/">Check out my resume!</a>
            </div>
        </section>
    </div>

    <div class="site-max">
        <section id="connect" class="connect gutter-wrapper">
            <div>
                <h2 class="secondary-heading">Connect with me</h2>

                <ul>
                    <li><a href="mailto:devdc.tech@gmail.com">Mail</a></li>
                    <li><a href="https://www.linkedin.com/in/danfchacon/">Linkedin</a></li>
                    <li><a href="https://github.com/dchacon1">GitHub</a></li>
                </ul>
            </div>
        </section>
    </div>
</main>

<footer>
    <div class="site-max gutter-wrapper">
        <small>All rights reserved. © <span id="today_year"></span></small>
    </div>
</footer>
<?php
    return ob_get_clean();
}
