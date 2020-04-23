

import AllEventsComponent from "./AllEventsComponent.js"
import AllInstagramComponent from "./AllInstagramComponent.js"
import ShareStoryComponent from "./ShareStoryComponent.js";
import HelplinesComponent from "./HelplinesComponent.js";
import TopButtonComponent from "./TopButtonComponent.js";

export default {
    name: 'community',

    template: `
    <section class="comm-page">
        <h2 class="sr-only">Community Page</h2>
        <img class="comm-banner" src="images/banner_symbol3.svg" alt="">
        <section class="comm-intro">
            <h3 class="main-heading">{{ communityintro.heading}}</h3>
            <p>{{ communityintro.text}}</p>
        </section>

        <section class="comm-events">
            <h3 class="sub-heading">{{ eventsheading.heading }}</h3>

            <allevents class="events-grid"></allevents>
        </section>

        <allinstagram></allinstagram>

        <sharestory></sharestory>

        <helplines></helplines>

        <topbutton></topbutton>

    </section>
    `,

    data() {
        return {
            communityintro: {
                heading: '',
                text: ''
            },

            eventsheading: '',
        }
    
    },

    components: {
        allevents: AllEventsComponent,
        allinstagram: AllInstagramComponent,
        sharestory: ShareStoryComponent,
        helplines: HelplinesComponent,
        topbutton: TopButtonComponent
    },

    created: function() {
        this.fetchCommunityIntro();
        this.fetchEventsHeading();
    },

    methods: {
        fetchCommunityIntro() {
            let url = './includes/admin/ajax.php?communityintro=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.communityintro = data[0];
            })
            .catch((err) => console.log(err))
        },

        fetchEventsHeading() {
            let url = './includes/admin/ajax.php?eventsheading=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.eventsheading = data[0];
            })
            .catch((err) => console.log(err))
        }
    }
}