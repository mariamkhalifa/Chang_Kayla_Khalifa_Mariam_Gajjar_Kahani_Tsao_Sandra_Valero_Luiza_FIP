export default {
    template: `
        <section class="about">
            <div class="about-top">
                <div class="line"></div>
            </div>

            <div class="about-img"><img :src="'images/' + about.img" alt="girl"></div>
            
            <div class="about-text">
                <h3 class="sub-heading">{{ about.heading }}</h3>
                <ul>
                    <li>{{ about.text1 }}</li>
                    <li>{{ about.text2 }} <span>{{ about.textbold }}</span></li>
                </ul>
            </div>
        </section>
    `,

    data() {
        return {
            about: {
                heading: ``,
                text1: '',
                text2: '',
                textbold: ``,
                img: '',
            },
        }
    },

    created: function() {
        this.fetchAbout();
    },

    methods: {
        fetchAbout() {
            let url = './includes/admin/ajax.php?about=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.about.heading = data[0].heading;
                this.about.text1 = data[0].p;
                this.about.text2 = data[0].p_sub;
                this.about.textbold = data[0].p_bold;
                this.about.img = data[0].img;
            })
            .catch((err) => console.log(err))
        }
    }
}