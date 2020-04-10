import EventComponent from "./EventComponent.js"

export default {
    template: `
    <div>
        <event v-for="(event, index) in events"
        :day="event.day" :month="event.month" :img="event.img" :time="event.time"
        :name="event.name" :des="event.des" :location="event.location"
        :link="event.link" :key="index">
        </event>
    </div>
    `,

    data() {
        return {
            events: []
        }
    },
    components: {
        event: EventComponent,
    },

    created: function() {
        this.fetchEvents();
    },

    methods: {
        fetchEvents() {
            let url = './includes/admin/ajax.php?event=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.events = data;
            })
            .catch((err) => console.log(err))
        }
    }
}