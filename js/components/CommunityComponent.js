

import AllEventsComponent from "./AllEventsComponent.js"
import AllInstagramComponent from "./AllInstagramComponent.js"

export default {
    name: 'community',

    template: `
    <section class="comm-page">
        <h2 class="sr-only">Community Page</h2>
        <img class="comm-banner" src="images/banner_symbol3.svg" alt="">
        <section class="comm-intro">
            <h3 class="main-heading">{{ intro.heading}}</h3>
            <p>{{ intro.text}}</p>
        </section>

        <section class="comm-events">
            <h3 class="sub-heading">{{ eventsheading }}</h3>

            <allevents class="events-grid"></allevents>

        </section>

        <section class="more-community">

            <h3 class="sub-heading">{{ instagramfeed.heading}}</h3>

            <allinstagram></allinstagram>

            <a href="#" target="_blank" class="button insta-link">{{ instagramfeed.btn }}</a>

        </section>

        <section class="share-story">
            <h3 class="sub-heading">{{ story.heading }}</h3>
            <p>{{ story.text }}</p>

            <form @submit.prevent="submitStory" class="story-form" action="includes/story/story.php" method="post">
                <p class="form-msg">{{ formmsg }}</p>

                <img class="top-form" src="images/top_card.svg" alt="">

                <label for="story">{{ story.formlabel }}</label>
                <textarea v-model="input.story" id="story" name="story" rows="11" placeholder="My story is..." required></textarea>

                <input class="button" type="submit" name="submit" value="Submit">
                <img class="bottom-form" src="images/bottom_card.svg" alt="">
            </form>
        </section>

        <section class="comm-help">
            <h3 class="sub-heading">{{ helplines.heading }}</h3>
            <p>{{ helplines.text }}</p>
            <img class="help-icon" :src="'images/' + helplines.img" alt="contact icon">
            <p class="help-small-text">{{ helplines.rhaclinkheading }}</p>
            <a class="help-link" :href="helplines.rhaclink" target="_blank">{{ helplines.rhaclink }}</a>
        </section>
    </section>
    `,

    data() {
        return {
            intro: {
                heading: "Find Amazing Events Happening Around You",
                text: "Stay up to date with all the recent amazing events."
            },

            eventsheading: "Events in London",

            instagramfeed: {
                heading: "Join our Community on Instagram",
                btn: "More Instagram"
            },

            story: {
                heading: "Share Your Story",
                text: "We provide people living with HIV and their close ones with the opportunity to share their life changing stories with Canada and the world. We respect your privacy. Your story can be submitted anonymously.",
                formlabel: "What's Your Story?"
            },

            helplines: {
                heading: "Helplines and Anonymous Services for HIV",
                text: "Peer-to-peer support group for individuals or family living with HIV, newly diagnosed to long-term survivors.",
                img: "contact.svg",
                rhaclinkheading: "Contact to Regional HIV/AIDS Connection",
                rhaclink: "https://hivaidsconnection.ca/contact"
            },

            input: {
                story: ''
            },

            formmsg: ''
 
        }
    
    },

    components: {
        allevents: AllEventsComponent,
        allinstagram: AllInstagramComponent
    },

    methods: {
        submitStory() {

            if (this.input.story !== '') {
                let url = './includes/story/story.php?submit=true',
                formData = new FormData();

                formData.append('story', this.input.story);

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.formmsg = data;
                    this.input.story = '';
                })
                .catch((err) => console.log(err))
            } else {
                this.formmsg = 'Please fill out the required field!';
            }

            setTimeout(function() {
                gsap.to('.form-msg', {opacity: 0, duration: .5, ease: 'power4' });
            }, 3000);

            setTimeout(function() {
                this.formmsg = '';
            }, 4000);
            
        }
    }
}