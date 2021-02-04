<template>
   <div class="d-flex">
    <i class="fas fa-star" v-for="star in fullStars" :key="'full'+star"></i>
    <i class="fas fa-star-half-alt" v-if="halfStar"></i>
    <i class="far fa-star" v-for="star in emptyStars" :key="'empty'+star"></i>
   </div>
</template>

<script>
export default {
    props:{
        rating: Number
    },
    computed:{
    halfStar(){
        return false;
    },
    fullStars(){
        return Math.round(this.rating);
    },
    emptyStars(){
        return 5 - Math.ceil(this.rating);
    }
    },
//     created(){  
//      const numbers = [4.0,4.4,4.5,4.6,4.8];

//      numbers.forEach(n => {
//          console.log(`round for ${n} is ${Math.round(n)}`);
//          console.log(`floor for ${n} is ${Math.floor(n)}`);
//          console.log(`ceil for ${n} is ${Math.ceil(n)}`); 
//          console.log("====================")
//          });
//    }
    }

</script>