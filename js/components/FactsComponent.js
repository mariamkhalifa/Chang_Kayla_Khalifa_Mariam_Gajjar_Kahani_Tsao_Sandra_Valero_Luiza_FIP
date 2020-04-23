import QuestionCardComponent from "./QuestionCardComponent.js"
import FAQComponent from "./FAQComponent.js"
import LinkComponent from "./LinkComponent.js"
import TopButtonComponent from "./TopButtonComponent.js"

export default {
    name: 'facts',

    template: `
    <section class="facts-wrapper">
        <h2 class="sr-only">Facts Page</h2>
        <img class="facts-banner" src="images/banner_symbol2.svg" alt="">

        <div class="facts-main">

            <faq class="facts-faq"></faq>

            <section class="facts-links">
                <h4 class="sub-heading">{{ factslinks.heading }}</h4>
                <p>{{ factslinks.text }}</p>

                <ul>
                    <infolink v-for="(link, index) in infolinksdata"
                    :img="link.img" :url="link.link" :key="index"
                    class="info-links">
                    </infolink>
                </ul>
            </section>

            <section class="facts-more">
                <h4 class="sub-heading">{{ factsmore.heading }}</h4>
                <p>{{ factsmore.text }}</p>
                <img class="facts-more-img" :src="'images/' + factsmore.img" alt="">
                <a @click="navigateToContact" class="button">Contact</a>
            </section>

        </div>

        <topbutton></topbutton>

    </section>
    `,

    data() {
        return {
            factslinks: {
                heading: '',
                text: ''
            },

            infolinksdata: [],

            factsmore: {
                heading: '',
                text: '',
                img: ''
            }
        }
    },

    components: {
        questioncard: QuestionCardComponent,
        infolink: LinkComponent,
        faq: FAQComponent,
        topbutton: TopButtonComponent
    },

    created() {
        this.fetchFactsLinks();
        this.fetchInfoLinksData();
        this.fetchFactsMore();
    },

    methods: {
        navigateToContact() {
            this.$router.push({ name: 'contact'});
            window.scrollTo(0,0);
        },

        fetchFactsLinks() {
            let url = './includes/admin/ajax.php?factslinks=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.factslinks = data[0];
            })
            .catch((err) => console.log(err))
        },

        fetchInfoLinksData() {
            let url = './includes/admin/ajax.php?infolinksdata=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.infolinksdata = data;
            })
            .catch((err) => console.log(err))
        },

        fetchFactsMore() {
            let url = './includes/admin/ajax.php?factsmore=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.factsmore = data[0];
            })
            .catch((err) => console.log(err))
        },
    }

}