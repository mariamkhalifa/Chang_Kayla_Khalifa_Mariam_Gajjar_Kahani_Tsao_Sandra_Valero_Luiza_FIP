(()=> {

    const ham = document.querySelector("#hamburger_menu"),
        navBox = document.querySelector(".mainNav");

            function toggleNav() {
                navBox.classList.toggle("navOpen");
                ham.classList.toggle("rot90");
                console.log("nav click");
            }
        
            ham.addEventListener("click", toggleNav);

            function refreshPage(){
                window.location.reload();
            } 
            
})();