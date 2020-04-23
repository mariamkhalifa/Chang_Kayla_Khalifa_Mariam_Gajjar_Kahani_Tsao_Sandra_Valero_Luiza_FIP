export default {
    template: `
        <section class="comm-help">
            <h3 class="sub-heading">{{ helplines.heading }}</h3>
            <p>{{ helplines.text }}</p>
            <img class="help-icon" :src="'images/' + helplines.img" alt="contact icon">
            <p class="help-small-text">{{ helplines.linkheading }}</p>
            <a class="help-link" :href="helplines.rhaclink" target="_blank">{{ helplines.link }}</a>
        </section>
    `,

    data() {
        return {
            helplines: {
                heading: '',
                text: '',
                img: '',
                rhaclinkheading: '',
                rhaclink: ''
            },
        }
    },

    created() {
        this.fetchHelplines();
    },

    methods: {
        fetchHelplines() {
            let url = './includes/admin/ajax.php?helplines=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.helplines = data[0];
            })
            .catch((err) => console.log(err))
           
        }
    }
}