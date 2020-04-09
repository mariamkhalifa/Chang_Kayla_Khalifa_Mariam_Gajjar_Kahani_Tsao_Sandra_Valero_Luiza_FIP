import QuestionCardComponent from "./QuestionCardComponent.js"

export default {
    

    template: `
        <section class="h-faq">
            <h3 class="main-heading">Frequently Asked Questions</h3>
            <p>Do you have any questions? We can help you find the answers!</p>
            
            <questioncard v-for="(card, index) in faqdata" :question="card.question"
            :answer="card.answer" :key="index">
            </questioncard>

            <a href="facts.php" class="button">See More</a>
        </section> 
    `,

    data() {
        return {
            faqdata: [
                { question: "What's HIV? What's the difference between HIV and AIDS?",
                  answer: `HIV starts as an infection. If left untreated, the HIV virus continues to hurt the immune system. During a period of a few months to several years, people are at risk of contracting serious infections that healthy immune systems can normally handle; This last stage of HIV infection is called AIDS. When HIV is diagnosed before it becomes AIDS, medicines can slow or stop the damage to the immune system. That said, If AIDS does develop, medicines can often help the immune system return to a healthier state.`},
                { question: "How can I get HIV?",
                  answer: "HIV is spread through the exchange of blood, semen, and vaginal fluids. It is most often transmitted through unprotected sex and contaminated needles, but can also be passed from a mother to her baby during pregnancy, birth, or breastfeeding. HIV can’t be transmitted through air, water, or casual contact. Everyone can contract HIV, regardless of sexual orientation, gender, age, or social status." },
            ],
        }
    },

    components: {
        questioncard: QuestionCardComponent
    }
}