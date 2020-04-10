import InstaFeedComponent from "./ InstaFeedComponent.js"

export default {
    template: `
    <div class="insta-feed-wrapper">
        <instafeed v-for="(feed, index) in instagram" class="insta-feed-group"
        :img="feed.img" :quote="feed.quote" :author="feed.author" :key="index">
        </instafeed> 
    </div>
    `,

    data() {
        return {
            // instagram: [
            //     { img: "i_asian_girl.jpg",
            //       quote: "Let us give publicity to HIV/AIDS and not hide it. beacuse that is the only way to make it appear like a normal illness.",
            //       author: "Nelson Mandela"
            //     },
    
            //     { img: "i_blondie_teenger.jpg",
            //       quote: "It is bad enough that people are dying of AIDS, but no one should die of ignorance.",
            //       author: "Elizabeth Taylor"
            //     },
    
            //     { img: "supporters.jpg",
            //       quote: "HIV does not make people dangerous to know, so you can shake their hands and give them a hug: Heaven knows they need it.",
            //       author: "Princess Diana"
            //     },
    
            //     { img: "high_school_teenagers.jpg",
            //       quote: "I tell you, it’s funny because the only time I think about HIV is when I have to take my medicine twice a day.",
            //       author: "Magic Johnson"
            //     },
    
            //     { img: "girls.jpg",
            //       quote: "Education, awareness and prevention are the key, but stigmatisation and exclusion from family is what makes people suffer most.",
            //       author: "Ralph Fiennes"
            //     },
    
            //     { img: "group_supporters.jpg",
            //       quote: "HIV infection and AIDS is growing- but so too is public apathy. We have already lost too many friends and collegues.",
            //       author: "David Geffen"
            //     },
    
            //     { img: "i_african_american.jpg",
            //       quote: "It’s not the years in your life that count. It’s the life in your years.",
            //       author: "ABE LINCLON"
            //     },
            // ],

            instagram: []
        }
    },

    components: {
        instafeed: InstaFeedComponent
    },

    created: function() {
        this.fetchInstagram();
    },

    methods: {
        fetchInstagram() {
            let url = './includes/admin/ajax.php?instagram=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                console.log(data);
                this.instagram = data;
            })
            .catch((err) => console.log(err))
        }
    }
}