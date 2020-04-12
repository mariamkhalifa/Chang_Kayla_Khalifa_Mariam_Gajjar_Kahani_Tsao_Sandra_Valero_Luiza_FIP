export default {
    template: `
    <section class="video-section">
        <div class="vid-grid">
            <div class="video-top">
                <div class="line"></div>
            </div>
            <div @click="showLightbox" class="video-wrapper">
                <img class="temp" src="images/thumb.jpg" alt="video thumbnail">
                <div class="video-icon"><img src="images/play_icon.svg" alt="play video icon"></div>
            </div>
        </div>

        <div class="video-text">
            <h3 class="sub-heading">{{ video.heading }}</h3>
            <p>{{ video.text }}</p>
        </div>

        <div v-if="lightbox" class="lightbox" ref="lightbox">
            <div @click="closeLightbox" class="close-lightbox"><span>x</span></div>
            <video class="video" controls>
                <source :src="'video/' + video.video" type="video/mp4">
            </video>
        </div>
    </section>
    `,

    data() {
        return {
            video: {
                heading: '',
                text: '',
                video: ''
            },

            lightbox: false
        }
    },

    created: function() {
        this.fetchVideo();
    },

    methods: {
        fetchVideo() {
            let url = './includes/admin/ajax.php?video=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.video.heading = data[0].heading;
                this.video.text = data[0].p;
                this.video.video = data[0].video;
            })
            .catch((err) => console.log(err))
        },

        showLightbox() {
            //this.$refs.lightbox.style.display = 'flex';
            this.lightbox = true;
            console.log('!');
        },

        closeLightbox() {
            this.lightbox = false;
        }
    }
}