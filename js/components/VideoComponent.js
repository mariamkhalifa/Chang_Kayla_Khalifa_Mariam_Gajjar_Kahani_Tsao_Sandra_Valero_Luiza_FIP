export default {
    template: `
    <section class="video-section">
        <div class="vid-grid">
            <div class="video-top">
                <div class="line"></div>
            </div>
            <div class="video-wrapper">
                <img class="temp" src="images/temporary_video3.jpg" alt="temporary video">
                <div class="video-icon"><img src="images/play_icon.svg" alt="play video icon"></div>
                <video class="video">
                    <source :src="'video/' + video.video" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="video-text">
            <h3 class="main-heading">{{ video.heading }}</h3>
            <p>{{ video.text }}</p>
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
        }
    }
}