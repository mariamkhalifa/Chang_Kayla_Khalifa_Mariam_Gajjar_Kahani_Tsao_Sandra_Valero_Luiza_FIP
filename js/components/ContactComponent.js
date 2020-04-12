import SocialMediaInfoComponent from "./SocialMediaInfoComponent.js";
import ContactInfoComponent from "./ContactInfoComponent.js";

export default {
    name: 'contact',

    template: `
        <section class="contact-wrapper">
            <h2 class="sr-only">Contact Page</h2>
            <img class="cont-banner" src="images/banner_symbol2.svg" alt="">
        
            <section class="contact">
                <h3 class="main-heading">{{ contactintro.heading }}</h3>
                <p>{{ contactintro.text }} &#9786;</p>
            </section>

            <form @submit.prevent="handleMail" class="cont-form" action="includes/contact/contact_form.php" method="post">
                
                <label for="name">{{ formlabel.name }}</label>
                <input v-model="input.name" id="name" name="name" type="text" required>

                <label for="email">{{ formlabel.email }}</label>
                <input v-model="input.email" id="email" name="email" type="email" required>

                <label for="phone">{{ formlabel.phone }}</label>
                <input v-model="input.phone" id="phone" name="phone" type="tel">

                <label for="msg">{{ formlabel.message }}</label>
                <textarea v-model="input.message" id="msg" name="message" type="text"  rows="10" required></textarea>

                <input id="contact-submit" type="submit" name="submit" value="submit">

                <p class="form-msg">{{ formmsg }}</p>
            </form>

            <section class="info">
                <h3 class="sr-only">Contact info</h3>
                
                <socialmedia></socialmedia>

                <contactinfo></contactinfo>
            </section>
        </section>
    `,

    data() {
        return {
            contactintro: {
                heading: '',
                text: ''
            },

            formlabel: {
                name: '',
                email: '',
                phone: '',
                message: ''
            },

            formmsg: '',

            input: {
                name: '',
                email: '',
                phone: '',
                message: ''
            }
        }
    },

    created() {
        this.fecthContactIntro();
        this.fecthContactFormLabels();
    },

    methods: {
        fecthContactIntro() {
            let url = './includes/admin/ajax.php?contactintro=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.contactintro = data[0];
            })
            .catch((err) => console.log(err))
        },

        fecthContactFormLabels() {
            let url = './includes/admin/ajax.php?contactformlabels=true';

            fetch(url)
            .then(res => res.json())
            .then(data => {
                //console.log(data);
                this.formlabel = data[0];
            })
            .catch((err) => console.log(err))
        },

        handleMail() {
            //console.log('!');
            if (this.input.email !== "" && this.input.name !== "" &&  this.input.message !== "") {
                let url = './includes/contact/contact_form.php?submit=true',
                formData = new FormData(document.querySelector('.cont-form'));

                formData.append('name', this.input.name);
                formData.append('email', this.input.email);
                formData.append('phone', this.input.phone);
                formData.append('message', this.input.message);

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-type': 'application/json'
                    },
        
                    body: JSON.stringify(formData)
                })
                .then(res => res.text())
                .then(data => {
                    console.log(data);
                    if(data === true) {
                        this.formmsg = data;
                    } else {
                        this.formmsg = data;
                        this.input.email = '';
                    }
                })
                .catch((err) => console.log(err));
            } else {
                this.formmsg = 'Please fill out the required field!';
            }
            
            setTimeout(function() {
                gsap.to('.form-msg', {opacity: 0, duration: .5, ease: 'power4' });
            }, 3000);

            setTimeout(function() {
                this.formmsg = '';
            }, 4000)
          
        }
    },

    components: {
        socialmedia: SocialMediaInfoComponent,
        contactinfo: ContactInfoComponent
    }
}