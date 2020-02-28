
//console.log('linked');

var vm = new Vue({
    el: "#app",

    data: {
        burger: {
            isExpanded: false
        },

        faqdata: [
                { question: "What's HIV? What's the difference between HIV and AIDS?",
                  answer: `HIV starts as an infection. If left untreated, the HIV virus continues to hurt the immune system. During a period of a few months to several years, people are at risk of contracting serious infections that healthy immune systems can normally handle; This last stage of HIV infection is called AIDS. When HIV is diagnosed before it becomes AIDS, medicines can slow or stop the damage to the immune system. That said, If AIDS does develop, medicines can often help the immune system return to a healthier state.`},
                { question: "How can I get HIV?",
                  answer: "HIV is spread through the exchange of blood, semen, and vaginal fluids. It is most often transmitted through unprotected sex and contaminated needles, but can also be passed from a mother to her baby during pregnancy, birth, or breastfeeding. HIV can’t be transmitted through air, water, or casual contact. Everyone can contract HIV, regardless of sexual orientation, gender, age, or social status." },
            ],
        plus: {
            revealed: false
        },
    },

    methods: {
        expandBurger() {
            //console.log('expanded');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        closeBurger() {
            //console.log('closed');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        revealAnswer(event) {
            //console.log('revealed');
            this.plus.revealed = (this.plus.revealed) ? false : true;
        }
    }
});