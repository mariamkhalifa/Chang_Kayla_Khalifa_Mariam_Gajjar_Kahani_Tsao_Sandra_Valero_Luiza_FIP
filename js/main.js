
//console.log('linked');
var vm = new Vue({
    el: "#app",

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
        }
    }
});