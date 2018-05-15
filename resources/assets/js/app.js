/**
 * Created by smuhtic on 15.5.2018..
 */

import sample from './data';
import Vue from 'vue';

var app = new Vue({
    el: '#app',
    data: {
        title: sample.title,
        address: sample.address,
        about: sample.about,
        amenities: sample.amenities,
        prices: sample.prices,
        headerImageStyle: {
            'background-image':'url(sample/header.jpg)'
        },
        contracted : true,
        modalOpen: false,
        message : 'Hello'
    },
    methods: { escapeKeyListener:
        function(evt) { if (evt.keyCode === 27 && this.modalOpen) { this.modalOpen
            = false; } } },
    watch: {
        modalOpen: function() {

            var className = 'modal-open';

            if (this.modalOpen) {

                document.body.classList.add(className);

            } else {

                document.body.classList.remove(className);
            }
        }
    },
    created: function() { document.addEventListener('keyup', this.escapeKeyListener);
    },
    destroyed: function () { document.removeEventListener('keyup', this.escapeKeyListener); }
});


