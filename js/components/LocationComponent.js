export default {
    props: ['name', 'address'],

    template: `
    <div class="location">
        <h4>{{ name }}</h4>
        <p>{{ address }}</p>
    </div>
    `,
}