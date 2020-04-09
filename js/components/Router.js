import HomeComponent from './HomeComponent.js'

let router = new VueRouter({
    routes: [
        { path: '/', name: 'home', component: HomeComponent },
    ]
});

export default router