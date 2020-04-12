export default {
    template: `
        <section class="cont-social-media-wrapper">
            <h4 class="sub-heading">{{ socialmedia.heading }}</h4>
            <p>{{ socialmedia.intro }}</p>
            <ul class="cont-social-media">
                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            </ul>
            <p>{{ socialmedia.text }}</p>
        </section>
    `,

    data() {
        return {
            socialmedia: {
                heading: '',
                intro: '',
                text: ''
            },
        }
    },

    created() {
        this.fetchSocialMediaInfo();
    },

    methods: {
        fetchSocialMediaInfo() {
            let url = './includes/admin/ajax.php?socialmedia=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.socialmedia = data[0];
            })
            .catch((err) => console.log(err))
        }
    }
}