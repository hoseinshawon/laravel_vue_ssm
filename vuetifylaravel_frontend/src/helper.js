import Vue from 'vue';
import moment from 'moment';
import VueProgressBar from 'vue-progressbar';



Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});


Vue.filter('myDate', function(created){
    return moment(created).format('MMMM Do YYYY');
});


Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});
