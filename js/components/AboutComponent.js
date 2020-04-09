export default {
    template: `
        <section class="about">
            <div class="about-top">
                <div class="line"></div>
            </div>
            <div class="about-img">
                <picture>
                    <source media="(min-width: 598px)" :srcset="about.largeimg">
                    <img :src="about.smallimg" alt="girl">
                </picture>
            </div>
            <div class="about-text">
                <h3 class="main-heading">{{ about.heading }}</h3>
                <ul>
                    <li>{{ about.text1 }}</li>
                    <li>{{ about.text2 }}<span>{{ about.textbold }}</span></li>
                </ul>
            </div>
        </section>
    `,

    data() {
        return {
            about: {
                heading: `What's HIV Neutral?`,
                text1: 'We at Keep it Neutral want to create a community that openly talks about HIV/AIDS. Our goal is a world that’s “HIV Neutral” — where HIV is no longer transmittable or stigmatized.',
                text2: 'Here you’ll find ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV.',
                textbold: ` Let's Keep It Neutral.`,
                smallimg: 'images/girl3.jpg',
                largeimg: 'images/girl7.jpg'
            },
        }
    }
}