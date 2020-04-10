export default {
    props: ['img', 'url'],

    template: `
        <li>
            <img class="org-img" :src="'images/' + img " alt="Organization Logo">
            <a :href="url" class="org-link" target="_blank">{{ url }}</a>
        </li>
    `,

    data() {
        return {
            
        }
    }
}