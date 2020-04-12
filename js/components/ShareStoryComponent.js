export default {
    template: `
        <section class="share-story">
            <h3 class="sub-heading">{{ story.heading }}</h3>
            <p>{{ story.text }}</p>

            <form @submit.prevent="submitStory" class="story-form" action="includes/story/story.php" method="post">
                <p class="form-msg">{{ formmsg }}</p>

                <img class="top-form" src="images/top_card.svg" alt="">

                <label for="story">{{ story.formlabel }}</label>
                <textarea v-model="input.story" id="story" name="story" rows="11" placeholder="My story is..." required></textarea>

                <input class="button" type="submit" name="submit" value="Submit">
                <img class="bottom-form" src="images/bottom_card.svg" alt="">
            </form>
        </section>
    `,

    data() {
        return {
            story: {
                heading: '',
                text: '',
                formlabel: ''
            },

            input: {
                story: ''
            },

            formmsg: ''
        }
    },

    created: function() { 
        this.fetchStory();
    },

    methods: {
        fetchStory() {
            let url = './includes/admin/ajax.php?story=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.story = data[0];
            })
            .catch((err) => console.log(err))
        },

        submitStory() {
            if (this.input.story !== '') {
                let url = './includes/story/story.php?submit=true',
                formData = new FormData();

                formData.append('story', this.input.story);

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    this.formmsg = data;
                    this.input.story = '';
                })
                .catch((err) => console.log(err))
            } else {
                this.formmsg = 'Please fill out the required field!';
            }

            setTimeout(function() {
                gsap.to('.form-msg', {opacity: 0, duration: .5, ease: 'power4' });
            }, 3000);

            setTimeout(function() {
                this.formmsg = '';
            }, 4000);
            
        }
    }
}