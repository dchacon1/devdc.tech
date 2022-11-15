new Vue({
    el: '#quizApp',
    data: {
        allQuestions: [],
        currentQuestion: {},
        currentQuestionAnswers: [],
        correctAnswerIndex: null,
        userSelectedIndex: null,
        inputIsChecked: '',
        answerSubmitted: false,
        numCorrect: 0,
        numTotal: 0,
    },
    watch: {
        currentQuestion: {
            immediate: true,
            handler: function() {
                this.userSelectedIndex = null;
                this.answerSubmitted = false;
                this.shuffleAnswers();
            }
        }
    },
    methods: {
        getData: function() {
            fetch('https://opentdb.com/api.php?amount=10&category=27&type=multiple', {
                method: 'get'
            }).then((response) => {
                return response.json()
            }).then((jsonData) => {
                this.allQuestions = jsonData.results;
                this.currentQuestion = this.allQuestions[0];
            })
        },
        next: function() {
            this.answerSubmitted = false;
            this.currentQuestion = this.allQuestions[this.numTotal];
        },
        resetQuiz: function() {
            this.numCorrect = 0;
            this.numTotal = 0;
            this.getData();
        },
        selectAnswer: function(index) {
            this.userSelectedIndex = index;
        },
        shuffleAnswers: function() {
			if(typeof this.currentQuestion.incorrect_answers === 'undefined') return;

            let answers = [...this.currentQuestion.incorrect_answers];
            answers.push(this.currentQuestion.correct_answer)

            this.currentQuestionAnswers = answers.sort(function() {
                return Math.random() - 0.5;
            });

            this.correctAnswerIndex = answers.indexOf(this.currentQuestion.correct_answer);
        },
        submitAnswer: function() {
            this.answerSubmitted = true;
            this.inputIsChecked = false;
            this.numTotal++;

            if (this.userSelectedIndex === this.correctAnswerIndex) {
                this.numCorrect++;
            }
        },
        addClass: function(index) {
            let inputClass = '';

            if (this.userSelectedIndex === index) {
                inputClass = 'selected';
            }

            if (this.userSelectedIndex === index && this.answerSubmitted) {
                inputClass = 'incorrect';
            }

            if (this.correctAnswerIndex === index && this.answerSubmitted) {
                inputClass = 'correct';
            }

            return inputClass;
        }
    },
    mounted: function() {
        this.getData();
    }

})
