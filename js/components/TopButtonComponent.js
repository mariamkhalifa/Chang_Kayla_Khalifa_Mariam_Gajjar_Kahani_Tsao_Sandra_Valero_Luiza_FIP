export default {
    template: `
        <i @click="scrollToTop" class="fas fa-angle-up" role="button"></i>
    `,

    methods: {
        scrollToTop() {
            window.scrollTo(0,0);
        }
    },
}