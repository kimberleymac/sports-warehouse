// This uses the swiper library to animate the image banner

const swiper = new Swiper('.swiper',{
    loop: true,
    autoplay:{
        delay: 6000, //6 seconds
        disableOnInteraction:false,
    },
    
//This allows pagination to work
    pagination: {
        el: ".swiper-pagination",
        clickable:true
    },    

});
