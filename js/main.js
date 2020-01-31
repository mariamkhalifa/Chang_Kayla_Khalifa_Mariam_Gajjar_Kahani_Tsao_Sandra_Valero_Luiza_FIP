
//console.log('linked');
var vm = new Vue({
    el: "#app",

methods: {
    expandBurger() {
        console.log('expanded');
        this.isExpanded = (this.isExpanded) ? false : true;
    }
}
});