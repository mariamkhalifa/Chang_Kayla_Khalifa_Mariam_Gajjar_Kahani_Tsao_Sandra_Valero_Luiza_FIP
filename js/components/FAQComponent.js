import QuestionCardComponent from "./QuestionCardComponent.js"

export default {
    

    template: `
        <section class="h-faq">
            <h3 class="main-heading">{{ faqintro.heading }}</h3>
            <p>{{ faqintro.text }}</p>
            
            <questioncard v-for="(card, index) in faqdata" :question="card.question"
            :answer="card.answer" :key="index">
            </questioncard>

            <a href="facts.php" class="button">See More</a>
        </section> 
    `,

    data() {
        return {
            faqintro: '',

            faqdata: []
        }
    },

    components: {
        questioncard: QuestionCardComponent
    },

    created: function() {
        this.fetchFaqIntro();
        this.fetchFaq();
    },

    methods: {
        fetchFaqIntro() {
            let url = './includes/admin/ajax.php?faqintro=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.faqintro = data[0];
            })
            .catch((err) => console.log(err))
        },

        fetchFaq() {
            let url = './includes/admin/ajax.php?faq=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.faqdata = data;
            })
            .catch((err) => console.log(err))
        }
    }
}