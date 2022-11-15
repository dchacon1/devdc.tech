<?php
function get_animated_quiz()
{
	$GLOBALS['page_scripts'] = [
		'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
		__DIR__.'/assets/scripts.js'
	];

	$GLOBALS['page_styles'] = [
		__DIR__.'/assets/animate.min.css',
		__DIR__.'/assets/style.css'
	];

	$GLOBALS['page_title'] = 'Animated Quiz';

	$GLOBALS['page_content'] = set_animated_quiz_content();
}

function set_animated_quiz_content()
{
	ob_start(); ?>
	<?= get_back_home_button() ?>
<section class="career-quiz-section js-career-quiz">
	<h2 class="wai">Fancy Quiz</h2>

	<div class="career-quiz-intro-panel" data-panel="intro">
		<h3 class="career-quiz-intro-panel__heading">Take the fancy quiz!</h3>

		<p><b>Take the quiz...</b> just because you have nothing better to do</p>

		<div class="sign-post">
			<svg class="sign-post__pole" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.52 584.88"> <title>Pole</title> <path fill="#1c75bb" d="M5.26,584.88A5.25,5.25,0,0,1,0,579.62V5.26a5.26,5.26,0,0,1,10.52,0V579.62A5.26,5.26,0,0,1,5.26,584.88Z"/> </svg>
			<svg class="sign-post__right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 328.02 119.66" preserveAspectRatio="xMidYMin meet"> <title>Right Point</title> <polygon fill="#fff" points="277.48 114.4 141.37 114.4 5.26 114.4 41.48 59.83 5.26 5.26 141.37 5.26 277.48 5.26 322.76 59.83 277.48 114.4"/> <path fill="#1c75bb" d="M277.48,119.66H5.26A5.25,5.25,0,0,1,.88,111.5L35.17,59.83.88,8.17A5.25,5.25,0,0,1,5.26,0H277.48a5.27,5.27,0,0,1,4,1.9L326.8,56.47a5.25,5.25,0,0,1,0,6.72l-45.27,54.57A5.24,5.24,0,0,1,277.48,119.66ZM15.06,109.15H275l40.92-49.32L275,10.52H15.06l30.8,46.4a5.26,5.26,0,0,1,0,5.82Z"/> </svg>
			<svg class="sign-post__left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 328.02 119.66" preserveAspectRatio="xMidYMin meet"> <title>Left Point</title> <polygon fill="#fff" points="50.53 114.4 186.65 114.4 322.76 114.4 286.54 59.83 322.76 5.26 186.65 5.26 50.53 5.26 5.26 59.83 50.53 114.4"/> <path fill="#1c75bb" d="M322.76,119.66H50.53a5.22,5.22,0,0,1-4-1.9L1.21,63.19a5.28,5.28,0,0,1,0-6.72L46.49,1.9a5.25,5.25,0,0,1,4-1.9H322.76a5.26,5.26,0,0,1,4.38,8.17L292.85,59.83l34.29,51.67a5.26,5.26,0,0,1-4.38,8.16ZM53,109.15H313l-30.8-46.41a5.26,5.26,0,0,1,0-5.82L313,10.52H53L12.09,59.83Z"/> </svg>
			<svg class="sign-post__base" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310.72 129.45" preserveAspectRatio="xMidYMin meet"> <title>Base</title> <path fill="#1c75bb" d="M155.36,129.45C68.24,129.45,0,101,0,64.72S68.24,0,155.36,0,310.72,28.43,310.72,64.72,242.48,129.45,155.36,129.45Zm0-118.93c-86.64,0-144.84,28-144.84,54.2s58.2,54.21,144.84,54.21,144.85-28,144.85-54.21S242,10.52,155.36,10.52Z"/> </svg>
		</div>

		<button class="quiz-button js-start-quiz">Start Quiz</button>

		<noscript id="remove-nojs"><p><br>Sorry, but you need to run javascript in your browser to take this quiz.</p></noscript>
	</div>

	<div class="career-quiz-quiz-panel hidden" data-panel="quiz">
		<nav class="career-quiz-quiz-panel__nav">
			<h3 class="wai">Quiz Navigation</h3>

			<ul class="career-quiz-quiz-panel__nav-list">
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-prev" data-change-slide="previous" disabled><span class="wai">Go to previous question</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-button active" data-change-slide="1"><span class="wai">Go to question </span><span>1</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-button" data-change-slide="2" disabled><span class="wai">Go to question </span><span>2</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-button" data-change-slide="3" disabled><span class="wai">Go to question </span><span>3</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-button" data-change-slide="4" disabled><span class="wai">Go to question </span><span>4</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-button" data-change-slide="5" disabled><span class="wai">Go to question </span><span>5</span></button>
				</li>
				<li class="career-quiz-quiz-panel__nav-item">
					<button class="nav-next" data-change-slide="next" disabled><span class="wai">Go to previous question</span></button>
				</li>
			</ul>
		</nav>

		<form class="career-quiz-quiz-panel__form" onsubmit="return false">
			<h3 class="wai">Quiz Form</h3>

			<p class="wai">Question <span id="active-question">1</span></p>

			<div class="career-quiz-quiz-panel__slide-wrapper" data-slide="1">

				<div class="career-quiz-quiz-panel__icon-wrapper">
					<img src="/apps/animated-quiz/assets/images/slide1-img1.svg" alt="" data-animate="left">
					<img src="/apps/animated-quiz/assets/images/slide1-img2.svg" alt="" data-animate="right">
				</div>

				<fieldset>
					<legend class="career-quiz-quiz-panel__text"><strong>1.</strong> Question</legend>

					<div class="career-quiz-quiz-panel__fieldset-inner-wrapper">
						<input id="check1" type="radio" name="group1" value="1">
						<label class="quiz-button" for="check1">answer1</label>
						<input id="check2" type="radio" name="group1" value="2">
						<label class="quiz-button" for="check2">answer2</label>
					</div>
				</fieldset>
			</div>

			<div class="career-quiz-quiz-panel__slide-wrapper" data-slide="2">

				<div class="career-quiz-quiz-panel__icon-wrapper">
					<img src="/apps/animated-quiz/assets/images/slide2-img1.svg" alt="" data-animate="left">
					<img src="/apps/animated-quiz/assets/images/slide2-img2.svg" alt="" data-animate="right">
				</div>

				<fieldset>
					<legend class="career-quiz-quiz-panel__text"><strong>2.</strong> Question</legend>

					<div class="career-quiz-quiz-panel__fieldset-inner-wrapper">
						<input id="check3" type="radio" name="group2" value="1">
						<label class="quiz-button" for="check3">answer1</label>
						<input id="check4" type="radio" name="group2" value="2">
						<label class="quiz-button" for="check4">answer2</label>
					</div>
				</fieldset>
			</div>

			<div class="career-quiz-quiz-panel__slide-wrapper" data-slide="3">

				<div class="career-quiz-quiz-panel__icon-wrapper">
					<img src="/apps/animated-quiz/assets/images/slide3-img1.svg" alt="" data-animate="left">
					<img src="/apps/animated-quiz/assets/images/slide3-img2.svg" alt="" data-animate="right">
				</div>

				<fieldset>
					<legend class="career-quiz-quiz-panel__text"><strong>3.</strong> Question</legend>

					<div class="career-quiz-quiz-panel__fieldset-inner-wrapper">
						<input id="check5" type="radio" name="group3" value="1">
						<label class="quiz-button" for="check5">answer1</label>
						<input id="check6" type="radio" name="group3" value="2">
						<label class="quiz-button" for="check6">answer2</label>
					</div>
				</fieldset>
			</div>

			<div class="career-quiz-quiz-panel__slide-wrapper" data-slide="4">

				<div class="career-quiz-quiz-panel__icon-wrapper">
					<img src="/apps/animated-quiz/assets/images/slide4-img1.svg" alt="">
				</div>

				<fieldset>
					<legend class="career-quiz-quiz-panel__text"><strong>4.</strong> Question</legend>

					<div class="career-quiz-quiz-panel__fieldset-inner-wrapper">
						<input id="check7" type="radio" name="group4" value="1">
						<label class="quiz-button" for="check7">answer1</label>
						<input id="check8" type="radio" name="group4" value="2">
						<label class="quiz-button" for="check8">answer2</label>
					</div>
				</fieldset>
			</div>

			<div class="career-quiz-quiz-panel__slide-wrapper" data-slide="5">

				<div class="career-quiz-quiz-panel__icon-wrapper">
					<img src="/apps/animated-quiz/assets/images/slide5-img1.svg" alt="" data-animate="left">
					<img src="/apps/animated-quiz/assets/images/slide5-img2.svg" alt="" data-animate="right">
				</div>

				<fieldset>
					<legend class="career-quiz-quiz-panel__text"><strong>5.</strong> Question</legend>

					<div class="career-quiz-quiz-panel__fieldset-inner-wrapper">
						<input id="check9" type="radio" name="group5" value="1">
						<label class="quiz-button" for="check9">answer1</label>
						<input id="check10" type="radio" name="group5" value="2">
						<label class="quiz-button" for="check10">answer2</label>
					</div>
				</fieldset>
			</div>

			<button class="quiz-button small next-button" data-change-slide="2" disabled>Next</button>

			<button class="quiz-button small submit-button" type="submit" hidden>Submit</button>
		</form>
	</div>

	<div class="career-quiz-result-panel hidden" data-panel="result">
		<h3 class="career-quiz-result-panel__heading">Thank you for taking our quiz.</h3>

		<p>This is the text for <strong id="quiz-result-title">[Result]</strong></p>

		<button class="js-start-quiz quiz-button">Retake Quiz</button>
	</div>

</section>
<?php
	return ob_get_clean();
}
