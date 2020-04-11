import router from './components/Router.js'

(()=> {
    
var vm = new Vue({
    props: {
        link: String,
        img: String,
        img2: String,
    },

    data: {
        burger: {
            isExpanded: false
        },

        input: {
            email: ''
        },

        formmsg: ''

    },

    methods: {
        expandBurger() {
            //console.log('expanded');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        closeBurger() {
            //console.log('closed');
            this.burger.isExpanded = (this.burger.isExpanded) ? false : true;
        },
        
        subscribe() {
            //console.log('!');
            if (this.input.email !== "") {
                let url = './includes/subscribe/subscribe.php?submit=true',
                formData = new FormData(document.querySelector('.subs-form'));

                formData.append('email', this.input.email);

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    //console.log(data);
                    if(data === true) {
                        this.formmsg = 'Thank you for subscribing!';
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

    router
}).$mount("#app");
            

})();