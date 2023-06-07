// header debut
const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Animate Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Hamburger Animation
    hamburger.classList.toggle("toggle");
});
// header fin
jQuery(document).ready(function($) {
    $(".mwb-form-control").focus(function(){
        var tmpThis = $(this).val();
        if(tmpThis == '' ) {
            $(this).parent(".mwb-form-group").addClass("focus-input");
        }
        else if(tmpThis !='' ){
            $(this).parent(".mwb-form-group").addClass("focus-input");
        }
    });
    $(".mwb-form-control").blur(function(){
        var tmpThis = $(this).val();
        if(tmpThis == '' ) {
            $(this).parent(".mwb-form-group").removeClass("focus-input");
            $(this).siblings('.mwb-form-error').slideDown("3000");
        }
        else if(tmpThis !='' ){
            $(this).parent(".mwb-form-group").addClass("focus-input");
            $(this).siblings('.mwb-form-error').slideUp("3000");
            
        }
    });
    
}); 