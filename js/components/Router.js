import HomeComponent from './HomeComponent.js'
import CommunityComponent from './CommunityComponent.js'
import ContactComponent from './ContactComponent.js'

let router = new VueRouter({
    routes: [
        { path: '/', name: 'home', component: HomeComponent },
        { path: '/community', name: 'community', component: CommunityComponent },
        { path: '/contact', name: 'contact', component: ContactComponent },
    ]
});

export default router