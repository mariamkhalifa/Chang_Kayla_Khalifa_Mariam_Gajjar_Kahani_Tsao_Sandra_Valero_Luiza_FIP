
//console.log('linked');

var vm = new Vue({
    props: {
        link: String,
        img: String
    },

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

        events: [
            { heading: "Coffee Drop-In",
              img: "coffee_cups.jpg",
              month: "April",
              day: "01",
              time: "Wednesday Mornings, 10:00 AM - 11:30 AM",
              desc: "Join us for coffee and support. For people living with HIV.",
              location: "RHAC Boardroom, #30-186 King St.",
              link: "www.hivaidsconnection.ca/events" },

              { heading: "Couch Crew",
              img: "friends.jpg",
              month: "April",
              day: "01",
              time: "Monday & Wednesday, 12:00 PM - 4:00 PM",
              desc: "Drop in and volunteer with us!",
              location: "RHAC Boardroom, #30-186 King St.",
              link: "www.hivaidsconnection.ca/events" },

              { heading: "PrEP Clinic",
              img: "prep.jpg",
              month: "April",
              day: "10",
              time: "Every second Friday, 9:00 AM to 5:00 PM",
              desc: "The RHAC PrEP clinic is currently held every second Friday. ",
              location: "RHAC Boardroom, #30-186 King St.",
              link: "www.hivaidsconnection.ca/events" },
        ],

        instagram: [
            { img: "i_asian_girl.jpg",
              quote: "Let us give publicity to HIV/AIDS and not hide it. beacuse that is the only way to make it appear like a normal illness.",
              author: "Nelson Mandela"
            },

            { img: "i_blondie_teenger.jpg",
              quote: "It is bad enough that people are dying of AIDS, but no one should die of ignorance.",
              author: "Elizabeth Taylor"
            },

            { img: "supporters.jpg",
              quote: "HIV does not make people dangerous to know, so you can shake their hands and give them a hug: Heaven knows they need it.",
              author: "Princess Diana"
            },

            { img: "i_african_american.jpg",
              quote: "I tell you, it’s funny because the only time I think about HIV is when I have to take my medicine twice a day.",
              author: "Magic Johnson"
            },

            { img: "i_girl_thinking.jpg",
              quote: "Education, awareness and prevention are the key, but stigmatisation and exclusion from family is what makes people suffer most.",
              author: "Ralph Fiennes"
            },

            { img: "group_supporters.jpg",
              quote: "HIV infection and AIDS is growing- but so too is public apathy. We have already lost too many friends and collegues.",
              author: "David Geffen"
            },
        ],
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