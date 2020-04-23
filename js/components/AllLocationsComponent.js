import LocationComponent from "./LocationComponent.js"

export default {
    template: `
    <section class="testing">
        <h3 class="main-heading">{{ locationsintro.heading }}</h3>
        <p class="testing-intro">{{ locationsintro.text }}</p>
 
        <div class="map"></div>

        <div class="locations-wrapper">
            <location v-for="(location, index) in locations" :name="location.name"
            :address="location.address" :key="index">
            </location>
        </div>
        <p>{{ locationsintro.linktext }}</p>
        <a :href="locationsintro.link" target="_blank" class="testing-link">{{ locationsintro.link }}</a>
    </section>
    `,

    data() {
        return {
            locationsintro: {
                heading: '',
                text: '',
                linktext: '',
                link: ''
            },

            locations: []
        }
    },

    components: {
        location: LocationComponent,
    },

    created: function() {
        this.fetchLocationsIntro();
        this.fetchLocations();
        
    },

    methods: {
        fetchLocationsIntro() {
            let url = './includes/admin/ajax.php?locationintro=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.locationsintro = data[0];
            })
            .catch((err) => console.log(err))
        },

        fetchLocations() {
            let url = './includes/admin/ajax.php?location=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.locations = data;
            })
            .catch((err) => console.log(err))
        },
        
        
        
        
        
    }
}