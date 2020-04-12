import AllHeroComponent from "./AllHeroComponent.js";
import AboutComponent from "./AboutComponent.js";
import VideoComponent from "./VideoComponent.js";
import FAQComponent from "./FAQComponent.js";
import AllLocationsComponent from "./AllLocationsComponent.js";
import TopButtonComponent from "./TopButtonComponent.js";

export default {
    name: 'home',

    template: `
    <section class="home-wrapper">
        <h2 class="hidden">Home Page</h2>

        <allhero></allhero>

        <about></about>

        <kinvideo></kinvideo>

        <faq></faq>
        
        <testlocations></testlocations>

        <topbutton></topbutton>
        
    </section>
    `,

    data() {
        return {
            
        }
    },

    methods: {
        
    },

    components: {
        allhero: AllHeroComponent,
        about: AboutComponent,
        kinvideo: VideoComponent,
        faq: FAQComponent,
        testlocations: AllLocationsComponent,
        topbutton: TopButtonComponent
    }
}