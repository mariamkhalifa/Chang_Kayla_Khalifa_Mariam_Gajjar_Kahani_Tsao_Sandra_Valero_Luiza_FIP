export default {
    template: `
    <section class="contact-info-wrapper">
        <h4 class="sub-heading">Contact information</h4>
        <div class="info-text">
            <h5>Address</h5>
            <p>{{ contactinfo.address }}</p>
        </div>
        <div class="info-text">
            <h5>Phone</h5>
            <p>{{ contactinfo.phone }}</p>
        </div>
        <div class="info-text">
            <h5>Email</h5>
            <p>{{ contactinfo.email }}</p>
        </div>
    </section>
    `,

    data() {
        return {
            contactinfo: {
                address: '',
                phone: '',
                email: ''
            },
        }
    },

    created() {
        this.fetchContactInfo();
    },

    methods: {
        fetchContactInfo() {
            let url = './includes/admin/ajax.php?contactinfo=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.contactinfo = data[0];
            })
            .catch((err) => console.log(err))
        }
    }
}