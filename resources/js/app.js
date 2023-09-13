/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import Vue from 'vue';
import PeopleList from './components/PeopleList.vue';

// Initialize Vue.js
const app = new Vue({
    el: '#app', // Match the ID in your Blade template
    components: {
        'people-list': PeopleList,
    },
});


app.mount('#app');
