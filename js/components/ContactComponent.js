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
                
                <section class="cont-social-media-wrapper">
                    <h4 class="sub-heading">{{ socialmedia.heading }}</h4>
                    <p>{{ socialmedia.intro }}</p>
                    <ul class="cont-social-media">
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                    <p>{{ socialmedia.text }}</p>
                </section>

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
            </section>
        </section>
    `,

    data() {
        return {
            contactintro: {
                heading: "Contact Us",
                text: `We’re here to help. Got questions? Want to use stuff from our campaign? Please don’t hesitate to reach out.`
            },

            formlabel: {
                name: "Your name",
                email: "Email",
                phone: "Phone",
                message: "Message"
            },

            socialmedia: {
                heading: "Social media",
                intro: "Follow us here!",
                text: "All social media accounts are updated and monitored Monday to Friday from 8 a.m. to 8 p.m. EST/EDT. "
            },

            contactinfo: {
                address: "683 King Street, London, ON, W2C 8QX",
                phone: "519-230-6781",
                email: "support@keepitneutral.ca"
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

    methods: {
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
                    body: formData
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
    }
}