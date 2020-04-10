(()=> {

    const ham = document.querySelector("#hamburger_menu"),
        navBox = document.querySelector(".mainNav");

        if(ham != null) {
            console.log('CMS js fired');
            function toggleNav() {
                navBox.classList.toggle("navOpen");
                ham.classList.toggle("rot90");
                console.log("nav click");
            }
        
            ham.addEventListener("click", toggleNav);

            function refreshPage(){
                window.location.reload();
            } 
        } else {
            console.log('CMS js fired');
        }

            
            
})();