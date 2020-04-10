import EventComponent from "./EventComponent.js"
import InstaFeedComponent from "./ InstaFeedComponent.js"

export default {
    name: 'community',

    template: `
    <section class="comm-page">
        <h2 class="sr-only">Community Page</h2>
        <img class="comm-banner" src="images/banner_symbol3.svg" alt="">
        <section class="comm-intro">
            <h3 class="main-heading">{{ intro.heading}}</h3>
            <p>{{ intro.text}}</p>
        </section>

        <section class="comm-events">
            <h3 class="sub-heading">{{ eventsheading }}</h3>

            <div class="events-grid">

                <event v-for="(event, index) in events"
                :day="event.day" :month="event.month" :img="event.img" :time="event.time"
                :name="event.name" :desc="event.desc" :location="event.location"
                :link="event.link" :key="index">
                </event>

            </div>

        </section>

        <section class="more-community">

            <h3 class="sub-heading">{{ instagramfeed.heading}}</h3>

            <div class="insta-feed-wrapper">
                <instafeed v-for="(feed, index) in instagram" class="insta-feed-group"
                :img="feed.img" :quote="feed.quote" :author="feed.author" :key="index">
                </instafeed> 
            </div>

            <a href="#" target="_blank" class="button insta-link">{{ instagramfeed.btn }}</a>

        </section>

        <section class="share-story">
            <h3 class="sub-heading">{{ story.heading }}</h3>
            <p>{{ story.text }}</p>

            <form class="story-form" action="includes/story/story.php" method="post">
                <img class="top-form" src="images/top_card.svg" alt="">
                <label for="story">{{ story.formlabel }}</label>
                <textarea id="story" name="story" rows="11" placeholder="My story is..." required></textarea>
                <input class="button" type="submit" name="submit" value="Submit">
                <img class="bottom-form" src="images/bottom_card.svg" alt="">
            </form>
        </section>

        <section class="comm-help">
            <h3 class="sub-heading">{{ helplines.heading }}</h3>
            <p>{{ helplines.text }}</p>
            <img class="help-icon" :src="'images/' + helplines.img" alt="contact icon">
            <p class="help-small-text">{{ helplines.rhaclinkheading }}</p>
            <a class="help-link" :href="helplines.rhaclink" target="_blank">{{ helplines.rhaclink }}</a>
        </section>
    </section>
    `,

    data() {
        return {
            intro: {
                heading: "Find Amazing Events Happening Around You",
                text: "Stay up to date with all the recent amazing events."
            },

            eventsheading: "Events in London",

            instagramfeed: {
                heading: "Join our Community on Instagram",
                btn: "More Instagram"
            },

            story: {
                heading: "Share Your Story",
                text: "We provide people living with HIV and their close ones with the opportunity to share their life changing stories with Canada and the world. We respect your privacy. Your story can be submitted anonymously.",
                formlabel: "What's Your Story?"
            },

            helplines: {
                heading: "Helplines and Anonymous Services for HIV",
                text: "Peer-to-peer support group for individuals or family living with HIV, newly diagnosed to long-term survivors.",
                img: "contact.svg",
                rhaclinkheading: "Contact to Regional HIV/AIDS Connection",
                rhaclink: "https://hivaidsconnection.ca/contact"
            },

            events: [
                { name: "Coffee Drop-In",
                  img: "coffee_cups.jpg",
                  month: "April",
                  day: "01",
                  time: "Wednesday Mornings, 10:00 AM - 11:30 AM",
                  desc: "Join us for coffee and support. For people living with HIV.",
                  location: "RHAC Boardroom, #30-186 King St.",
                  link: "www.hivaidsconnection.ca/events" },
    
                { name: "Couch Crew",
                  img: "friends.jpg",
                  month: "April",
                  day: "01",
                  time: "Monday & Wednesday, 12:00 PM - 4:00 PM",
                  desc: "Drop in and volunteer with us!",
                  location: "RHAC Boardroom, #30-186 King St.",
                  link: "www.hivaidsconnection.ca/events" },
    
                { name: "PrEP Clinic",
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
    
                { img: "high_school_teenagers.jpg",
                  quote: "I tell you, it’s funny because the only time I think about HIV is when I have to take my medicine twice a day.",
                  author: "Magic Johnson"
                },
    
                { img: "girls.jpg",
                  quote: "Education, awareness and prevention are the key, but stigmatisation and exclusion from family is what makes people suffer most.",
                  author: "Ralph Fiennes"
                },
    
                { img: "group_supporters.jpg",
                  quote: "HIV infection and AIDS is growing- but so too is public apathy. We have already lost too many friends and collegues.",
                  author: "David Geffen"
                },
    
                { img: "i_african_american.jpg",
                  quote: "It’s not the years in your life that count. It’s the life in your years.",
                  author: "ABE LINCLON"
                },
            ],
        }
    
    },

    components: {
        event: EventComponent,
        instafeed: InstaFeedComponent
    }
}