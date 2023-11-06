<?php
function get_resume()
{
	set_resume_meta();

	$GLOBALS['page_content'] = set_resume_content();
}

function set_resume_meta()
{
	$GLOBALS['page_scripts'] = [];

	$GLOBALS['page_styles'] = [
		ROOT.'/assets/css/style.css'
	];

	$GLOBALS['page_title'] = 'Resume';
}

function set_resume_content()
{
    ob_start(); ?>
	<div class="page-wrapper">
		<header class="page-header">
			<h1 class="page-heading">Daniel F. Chacón</h1>

			<p><b>Phone:</b> Available Upon Request</p>
			<p><b>Email:</b> <a href="mailto:danf.chacon@gmail.com">danf.chacon@gmail.com</a></p>
			<p><b>LinkedIn:</b> <a href="https://www.linkedin.com/in/danfchacon/">View Profile</a></p>
		</header>

		<main class="page-main">
			<section class="main-skills">
				<h2 class="section-heading">Skills / Proficiencies</h2>

				<ul class="flex-three-col skill-list">
					<li>JavaScript ES5/ES6</li>
					<li>jQuery</li>
					<li>HTML5</li>
					<li>CSS3/SASS/SCSS</li>
					<li>VueJS</li>
					<li>Linux Administration</li>
					<li>Bash Scripting</li>
					<li>PHP</li>
					<li>WordPress Development</li>
					<li>WCAG</li>
					<li>NodeJS and Express</li>
					<li>Razor</li>
					<li>Git/Github</li>
					<li>Adobe Photoshop</li>
					<li>Adobe Illustrator</li>
					<li>Agile</li>
					<li>JIRA</li>
					<li>MySQL</li>
				</ul>

				<div class="portfolio-addition">
					<h3 class="section-sub-heading">Sample Portfolio</h3>

					<dl class="flex-two-col portfolio-list">
						<div>
							<dt class="portfolio-list__title">Sites Implemented</dt>
							<dd class="portfolio-list__desc">
								<ul>
									<li><a href="http://rscomponents.devdc.tech/" rel="nofollow noreferrer">https://jobs.rscomponentscareers.com/</a> (Decommissioned)</li>
									<li><a href="https://careers.joinmcm.com/" rel="nofollow noreferrer">https://careers.joinmcm.com/</a></li>
									<li><a href="https://careers.wasteconnections.com/" rel="nofollow noreferrer">https://careers.wasteconnections.com/</a></li>
									<li><a href="https://www.unmhjobs.com/" rel="nofollow noreferrer">https://www.unmhjobs.com/</a></li>
								</ul>
							</dd>
						</div>

						<div>
							<dt class="portfolio-list__title">Sites Assisted</dt>
							<dd class="portfolio-list__desc">
								<ul>
									<li><a href="https://jobs.boeing.com/" rel="nofollow noreferrer">https://jobs.boeing.com/</a></li>
									<li><a href="https://en-global-jobs.about.ikea.com/" rel="nofollow noreferrer">https://en-global-jobs.about.ikea.com/</a></li>
									<li><a href="https://careers.enterprise.com/employee-profiles " rel="nofollow noreferrer">https://careers.enterprise.com/employee-profiles </a></li>
								</ul>
							</dd>
						</div>

						<div>
							<dt class="portfolio-list__title">Code Snippets</dt>
							<dd class="portfolio-list__desc">
								<ul>
									<li><a href="/apps/animated-quiz/">Animated Quiz (template)</a></li>
									<li><a href="https://codepen.io/Vash007/full/YzKEOaj" rel="nofollow noreferrer">Responsive Tabs / Accordion</a></li>
									<li><a href="/apps/weather-application/">Weather Finder</a></li>
									<li><a href="/apps/vue-quiz/">Vue Quiz</a></li>
								</ul>
							</dd>
						</div>

						<div>
							<dt class="portfolio-list__title">Products Assisted</dt>
							<dd class="portfolio-list__desc">
								<ul>
									<li><a href="https://dchacon1.github.io/career-path-template/" rel="nofollow noreferrer">Career Path Generator</a></li>
								</ul>
							</dd>
						</div>

					</dl>
				</div>
			</section>


			<section class="main-experience">
				<h2 class="section-heading">Professional Experience</h2>

				<div class="job-details">
					<h3 class="job-title">Front-end Developer / Department Liaison</h3>

					<div class="descriptor-wrapper">
						<p><span class="job-company">Kentucky Employers' Mutual Insurance</span> &ndash; <i class="job-location">Lexington, KY (remote)</i></p>
						<p class="job-date">2021 &ndash; Present</p>
					</div>

					<div class="portfolio-addition">
						<p>As a smaller insurance agency, we only have a handful of websites we maintain. Most of my work involves enhancing older UI's and creating an acceptable/efficient modern approach to how we work. </p>
					</div>

					<h4 class="section-sub-heading">Responsibilities</h4>

					<ul class="disc-list">
						<li>Ownership and accountability for all UX/UI implementations</li>
						<li>Maintain existing JavaScript applications</li>
						<li>Create documentation for accessibility guidelines</li>
						<li>Document guidelines for UI development (HTML/CSS/JS)</li>
						<li>Assist with creating strategy for UI implementation workflow</li>
						<li>Assist with creating strategy for site architecture</li>
						<li>Communicate product requirements between departments</li>
						<li>Perform any necessary UX/UI development training</li>
						<li>Assist with enhancing JIRA workflow and branching strategy</li>
						<li>Assist with enhancing local development for WordPress</li>
					</ul>
				</div>






				<div class="job-details">
					<h3 class="job-title">UI Developer</h3>

					<div class="descriptor-wrapper">
						<p><span class="job-company">TMP Worldwide (Radancy)</span> &ndash; <i class="job-location">New Albany, IN</i></p>
						<p class="job-date">2017 &ndash; 2021</p>
					</div>

					<div class="portfolio-addition">
						<p>A large company in which I served in many capacities. We specialized in building user interfaces of career sites for our clients.</p>
					</div>

					<h4 class="section-sub-heading">Responsibilities</h4>

					<ul class="disc-list">
						<li><b>Create responsive cross-browser W3C valid sematic HTML5, CSS, and JavaScript/jQuery</b></li>
						<li><b>Ensure ADA compliance by striving to meet highest WCAG standards</b> </li>
						<li>Ensure the technical feasibility of UI/UX designs</li>
						<li>Implement and maintain enterprise-level projects</li>
						<li>Take lead in development and deployment of higher priority enterprise-level projects.</li>
						<li>Implement and deploy new products for sales and marketing teams.</li>
						<li>Take lead in discussions for standardizing best web practices in our company.</li>
						<li>Provie insight for requests from project managers about new or existing functionalities we support.</li>
						<li>Utilize CSS preprocessors such as SCSS/SASS.</li>
						<li>Test and deploy Google Analytics, Adobe, or other client provided tracking services.</li>
						<li>Serve as backup tech lead on the maintenance team when our current lead developer is out of office.</li>
						<li>Serve as a tech lead for difficult JavaScript and Razor templating issues.</li>
						<li>Optimize sites for performance - including minifiying JavaScript, images, etc.</li>
					</ul>
				</div>





				<div class="job-details">
					<h3 class="job-title">Data Systems Student</h3>

					<div class="descriptor-wrapper">
						<p><span class="job-company">Parkland College</span> &ndash; <i class="job-location">Champaign, IL</i></p>
						<p class="job-date">2016 &ndash; 2017</p>
					</div>

					<h4 class="section-sub-heading">Responsibilities</h4>

					<ul class="disc-list">
						<li>Worked on portfolio of programs in Java as well as HTML and CSS projects</li>
						<li>Designed databases using MySQL</li>
					</ul>
				</div>

			</section>

			<section class="education">
				<h2 class="section-heading">Education and Specialized Training</h2>

				<ul class="disc-list">
					<li><span class="job-company">Parkland College</span> &ndash; <i class="job-location">Champaign, IL</i></li>
					<li>Data Systems &ndash; 1 year college credit</li>
					<li>Teamtreehouse.com &ndash; Front End Web Development Track</li>
					<li>Udemy &ndash; Front End Web Development Track</li>
				</ul>
			</section>

		</main>

		<footer class="page-footer">
			<small>Contact me at <a href="mailto:danf.chacon@gmail.com">danf.chacon@gmail.com</a></small>
		</footer>
	</div>

<?php
    return ob_get_clean();
}
