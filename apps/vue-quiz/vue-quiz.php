<?php
function get_vue_quiz()
{
	$GLOBALS['page_scripts'] = [
		'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js',
		__DIR__.'/assets/scripts.js'
	];

	$GLOBALS['page_styles'] = [
		__DIR__.'/assets/style.css'
	];

	$GLOBALS['page_title'] = 'Vue Quiz';

	$GLOBALS['page_content'] = set_vue_quiz_content();
}

function set_vue_quiz_content()
{
	ob_start(); ?>
	<?= get_back_home_button() ?>
	<div id="quizApp">
		<div class="question-box-container">
			<h1 class="page-heading">Vue Quiz</h1>

			<div v-bind:hidden="numTotal<10?false:true">
				<p >Score: {{ numCorrect }}/{{ numTotal }}</p>
				<br>
				<button class="reset-quiz-btn"
					v-on:click="resetQuiz"
				>Reset Quiz</button>
				<br>
				<br>
			</div>

			<div v-bind:hidden="numTotal==10?false:true">
				<p>Congrats You completed the Quiz!! </p>
				<p>Your score is {{ numCorrect }}/{{ numTotal }}.</p>
				<br>
			</div>


			<form class="question-form">
				<h2 class="question-form__heading">Question:</h2>

				<p class="question-form__question"
					v-html="currentQuestion.question"
				>{{ currentQuestion.question }}</p>


				<div v-for="(currentQuestionAnswer, index) in currentQuestionAnswers"
					:key="index"
					class="question-form__field-wrapper"
				>
					<input type="radio" name="question"
						v-html="currentQuestionAnswer"
						v-bind:id="'answer' + index"
						v-bind:value="currentQuestionAnswer"
						v-bind:class="addClass(index)"
						v-bind:disabled="answerSubmitted"
						v-model="inputIsChecked"
						v-on:click="selectAnswer(index)"
					>
					<label
						v-bind:for="'answer' + index"
						v-html="currentQuestionAnswer"
					>{{ currentQuestionAnswer }}</label>
				</div>

				<button class="submit"
					v-on:click.prevent="submitAnswer"
					v-bind:disabled="userSelectedIndex === null || answerSubmitted"
				>Submit</button>

				<button class="next"
					v-on:click.prevent="next"
					v-bind:disabled="userSelectedIndex === null || !answerSubmitted"
					v-bind:hidden="numTotal==10?true:false"
				>Next</button>

				<button v-on:click.prevent="resetQuiz"
					v-bind:hidden="numTotal==10?false:true"
				>Reset Quiz</button>
			</form>


		</div>
	</div>
<?php
	return ob_get_clean();
}
