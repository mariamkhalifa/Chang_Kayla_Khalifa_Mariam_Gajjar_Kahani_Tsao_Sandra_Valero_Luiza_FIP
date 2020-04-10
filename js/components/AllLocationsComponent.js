import LocationComponent from "./LocationComponent.js"

export default {
    template: `
    <section class="testing">
        <h3 class="main-heading">Get Tested</h3>
        <p class="testing-intro">Find HIV Testing locations and care services close to you.</p>
        <!-- might add google maps API instead of iframe -->
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2918.769633654516!2d-81.25054408514464!3d42.98312610351882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef21cf012e81d%3A0xc2124c8409950117!2s186%20King%20St%2C%20London%2C%20ON%20N6A%201C7!5e0!3m2!1sen!2sca!4v1582313402657!5m2!1sen!2sca" allowfullscreen=""></iframe>
        <div class="locations-wrapper">
            <location v-for="(location, index) in locations" :name="location.name"
            :address="location.address" :key="index">
            </location>
        </div>
        <p>For more information on where to get tested:</p>
        <a href="https://hivaidsconnection.ca/get-facts/get-tested/where-get-tested" target="_blank" class="testing-link">Go to HIV/AIDS Connections</a>
    </section>
    `,

    data() {
        return {
            // locations: [
            //     { name: 'Regional HIV/AIDS Connections', address: '186 King St #30 London, ON N6A 1C7'},
            //     { name: 'London InterCommunity Health Centre', address: '659 Dundas St London, ON N5W 2Z1'},
            //     { name: 'Anova', address: '101 Wellington Rd London, ON N6C 4M7'},
            // ]

            locations: []
        }
    },

    components: {
        location: LocationComponent
    },

    created: function() {
        this.fetchLocations();
    },

    methods: {
        fetchLocations() {
            let url = './includes/admin/ajax.php?location=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.locations = data;
            })
            .catch((err) => console.log(err))
        }
    }
}