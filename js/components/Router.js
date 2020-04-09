import HomeComponent from './HomeComponent.js'
import CommunityComponent from './CommunityComponent.js'

let router = new VueRouter({
    routes: [
        { path: '/', name: 'home', component: HomeComponent },
        { path: '/community', name: 'community', component: CommunityComponent },
    ]
});

export default router