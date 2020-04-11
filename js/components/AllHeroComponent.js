import HeroComponent from "./HeroComponent.js"

export default {
    template: `
    <section class="hero">
        <h3 class="hidden">hero</h3>
            
        <hero v-for="(hero, index) in herodata1" :img="hero.img"
        :text="hero.text" :textcap="hero.cap_text" :key="index"
        class="hero-group">
        </hero>

            <div class="alt-hero-wrapper">
                <div class="alt-hero-grid">

                    <hero v-for="(hero, index) in herodata2" :img="hero.img"
                    :text="hero.text" :textcap="hero.cap_text" :key="index"
                    class="alt-hero-group">
                    </hero>
                    
                </div>
            </div>

        </section>
    `,

    data() {
        return {
            // herodata1: [
            //     { img: 'asian_girl3.jpg', text: 'have', textcap: 'safer sex'},
            //     { img: 'blondie_boy3.jpg', text: 'what\'s', textcap: 'your status'},
            //     { img: 'happiness_girl3.jpg', text: 'let\'s', textcap: 'talk'},
            // ],

            // herodata2: [
            //     { img: 'dark_skin_teenager3.jpg', text: 'take', textcap: 'prep/pep'},
            //     { img: 'curly_haired_girl3.jpg', text: 'it\'s', textcap: 'neutral'},
            //     { img: 'thinking_girl3.jpg', text: 'with', textcap: 'pride'},
            // ],

            herodata1: [],

            herodata2: []
            
        }
    },

    components: {
        hero: HeroComponent
    },

    created: function() {
        this.fetchHero();
        this.fetchHero2();
    },

    methods: {
        fetchHero() {
            let url = './includes/admin/ajax.php?hero=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.herodata1 = data;
            })
            .catch((err) => console.log(err))
        },

        fetchHero2() {
            let url = './includes/admin/ajax.php?hero_alt=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.herodata2 = data;
            })
            .catch((err) => console.log(err))
        }
    }

    
}