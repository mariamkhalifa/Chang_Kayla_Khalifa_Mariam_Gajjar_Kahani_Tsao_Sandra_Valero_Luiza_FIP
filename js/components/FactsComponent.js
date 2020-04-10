import QuestionCardComponent from "./QuestionCardComponent.js"
import FAQComponent from "./FAQComponent.js"
import LinkComponent from "./LinkComponent.js"

export default {
    name: 'facts',

    template: `
    <section class="facts-wrapper">
        <h2 class="sr-only">Facts Page</h2>
        <img class="facts-banner" src="images/banner_symbol2.svg" alt="">

        <div class="facts-main">

            <!-- <section class="facts-intro">
                <h3 class="main-heading">{{ factsintro.heading }}</h3>
                <p>{{ factsintro.text }}</p>
            </section> -->

            <faq class="facts-faq"></faq>

            <section class="facts-links">
                <h4 class="sub-heading">{{ factslinks.heading }}</h4>
                <p>{{ factslinks.text }}</p>

                <ul>
                    <infolink v-for="(link, index) in infolinksdata"
                    :img="link.img" :url="link.url" :key="index"
                    class="info-links">
                    </infolink>
                </ul>
            </section>

            <section class="facts-more">
                <h4 class="sub-heading">{{ factsmore.heading }}</h4>
                <p>{{ factsmore.text }}</p>
                <img class="facts-more-img" :src="'images/' + factsmore.img" alt="">
                <router-link class="button" :to="{ name: 'contact' }">Contact</router-link>
            </section>

        </div>

    </section>
    `,

    data() {
        return {
            factsintro: {
                heading: "Frequently Asked Questions",
                text: "Do you have any questions? We can help you find the answers!"
            },

            factslinks: {
                heading: "Get The Facts",
                text: "The facts provide young people in Canada with information about people living with HIV"
            },

            infolinksdata: [
                { img: "rhac_logo.jpg", url: "https://hivaidsconnection.ca"},
                { img: "catie_logo.jpg", url: "https://www.catie.ca/en/basics"},
                { img: "unaid_logo.jpg", url: "https://www.unaids.org/en"}  
            ],

            factsmore: {
                heading: "Do you have more questions?",
                text: "We can help you find the answers.",
                img: "question_icon.svg"
            }
        }
    },

    components: {
        questioncard: QuestionCardComponent,
        infolink: LinkComponent,
        faq: FAQComponent
    },

}