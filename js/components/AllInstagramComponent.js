import InstaFeedComponent from "./ InstaFeedComponent.js"

export default {
    template: `
    <section class="more-community">

            <h3 class="sub-heading">{{ instagramfeed.heading}}</h3>

            <div class="insta-feed-wrapper">
                <instafeed v-for="(feed, index) in instagram" class="insta-feed-group"
                :img="feed.img" :quote="feed.quote" :author="feed.author" :key="index">
                </instafeed> 
            </div>

            <a href="#" target="_blank" class="button insta-link">{{ instagramfeed.btn }}</a>

        </section>
    `,

    data() {
        return {
            instagramfeed: {
                heading: '',
                btn: ''
            },

            instagram: []
        }
    },

    components: {
        instafeed: InstaFeedComponent
    },

    created: function() {
        this.fetchInstagramFeed();
        this.fetchInstagram();
    },

    methods: {
        fetchInstagramFeed() {
            let url = './includes/admin/ajax.php?instagramfeed=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.instagramfeed = data[0];
            })
            .catch((err) => console.log(err))
        },

        fetchInstagram() {
            let url = './includes/admin/ajax.php?instagram=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.instagram = data;
            })
            .catch((err) => console.log(err))
        }
    }
}