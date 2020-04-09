export default {
    props: ['day', 'month', 'img', 'time', 'name', 'desc', 'location', 'link' ],
    
    template: `
    <section class="event-card">

        <p class="event-date"> 
            <span class="month">{{ month }}</span> 
            <span class="day">{{ day }}</span> 
        </p>
  
        <img class="event-img" :src="'images/' + img" alt=""> 
       
        <h4 class="event-heading">{{ name }}</h4> 
        
        <p class="event-time">{{ time }}</p> 
        
        <p class="event-desc">{{ desc }}</p> 
        
        <div class="event-location">
            <p>Location:</p>
            <p>{{ location }}</p> 
        </div>

        <div class="see-more-info">
            <p>See more information:</p>
            <a :href="link" target="_blank">{{ link }}</a> 
        </div>
    </section>
    `
}