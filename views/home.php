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
                    <li>
                        <a class="project-tile" href="https://www.freecodecamp.org/devdc">
                            <p class="project-tile__title">FreeCodeCamp</p>
                            <p>See my certifications!</p>
                        </a>
                    </li>
                </ul>

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
