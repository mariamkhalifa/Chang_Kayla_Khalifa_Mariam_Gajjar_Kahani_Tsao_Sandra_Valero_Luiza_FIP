import router from './components/Router.js'

(()=> {
    
var vm = new Vue({
    props: {
        link: String,
        img: String,
        img2: String,
    },

    data: {
        burger: {
            isExpanded: false
        },

    },

    methods: {
        expandBurger() {
            //console.log('expanded');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        closeBurger() {
            //console.log('closed');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        
    },

    router
}).$mount("#app");
            

})();