export default {
    props: {
        question: String,
        answer: String
    },

    template: `
        <div class="faq-card">
            <div class="question-card">
                <img class="card-top" src="images/top_card.svg" alt="top decoration">
                <p class="question">{{ question }}</p>
                <div v-on:click="revealAnswer" v-if="plus.revealed" class="minus">-</div>
                <div v-on:mouseover="revealAnswer" v-else class="plus">+</div>
            </div>
            <div class="answer-card" :class="{'revealed':plus.revealed}">    
                <p class="answer">{{ answer }}</p>
                <img class="card-bottom" src="images/bottom_card.svg" alt="bottom decoration">
            </div>
        </div>
    `,

    data() {
        return {
            plus: {
                revealed: false
            },
        }
    },

    methods: {
        revealAnswer() {
            //console.log('revealed');
            this.plus.revealed = (this.plus.revealed) ? false : true;
        }
    }
}