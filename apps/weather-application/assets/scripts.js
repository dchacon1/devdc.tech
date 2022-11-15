new Vue({
    el: '#weather-form',
    data: {
        cityNameInput: '',
        stateNameInput: '',
        temp: '',
        humidity: '',
        cityName: ''
    },

    methods: {
        getWeather: function() {
            var url = "https://api.openweathermap.org/data/2.5/weather?appid=dc884d8347e8b27fc4bbbc265f2e9d3c";

            if(this.cityNameInput.length > 0){
                url += "&q=" + this.cityNameInput;

                if(this.stateNameInput.length > 0){
                    url += "," + this.stateNameInput;
                }

                url += "&units=imperial";
            }

            fetch(url).then(res => res.json()).then(posts => {
                this.cityName = this.toTitleCase(this.cityNameInput);
                this.temp = Math.round(posts.main.temp) + '°F';
                this.humidity = posts.main.humidity + '%';
                this.cityNameInput = '';
            })
        },
        toTitleCase: function(str) {
            return str.replace(/\w\S*/g, function(txt){
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }
    },
    computed: {
        isDisabled: function(){
            return this.cityNameInput == ''
        }
    }
})
