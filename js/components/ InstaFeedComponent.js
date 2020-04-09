export default {
    props: ['img', 'quote', 'author'],

    template: `
    <div>
        <img class="comm-img" :src="'images/' + img"  alt="instagram image">
        <div class="quote">
            <p>{{ quote }}<br><span>-{{ author }}</span></p>
            <i class="fas fa-quote-right"></i>
            <img class="quote-logo" src="images/kin_symbol.svg" alt="logo">
        </div>
    </div>
    `,

    data() {
        return {
            
        }
    }
}