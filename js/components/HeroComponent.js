export default {
    props: ['img', 'text', 'textcap', 'index'],

    template: `
    <div>
        <img class="hero-img" :src="'images/' + img" alt="image">
                
        <div class="hero-text">
            <p class="hero-p">
                <span class="small-txt">{{ text }}</span>
                <span class="large-txt">{{ textcap }}</span>
            </p>
        </div>
    </div>
    `,
}