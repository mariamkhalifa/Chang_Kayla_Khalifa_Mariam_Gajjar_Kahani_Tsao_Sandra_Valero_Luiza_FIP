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
                heading: 'Stories of HIV/AIDS',
                text: 'Start by listening to real stories from people who speak openly about their experience with HIV/AIDS.',
                video: ''
            },
        }
    }
}