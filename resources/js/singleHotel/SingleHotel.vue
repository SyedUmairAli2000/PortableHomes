<template>
    <div class="row">
    <div class="col-md-8 pb-4">
     <div class="card">
      <div class="card-body">
          <h2>{{ Hotel.title }}</h2>
          <hr>
          <article>{{ Hotel.content }}</article>
      </div>
    </div>
    </div>
    <div class="col-md-4 pb-4">
        <Availability></Availability>
    </div>
    </div>
</template>

<script>
import Availability from "./Available";
export default {
    components: {
       Availability
    },
    data(){
        return {
            loading: false,
            Hotel:null,
        };
    },
    created(){
        this.loading = true;
        axios.get(`/api/hotels/${this.$route.params.id}`).then(response =>{
            this.Hotel = response.data.data
            this.loading = false;});
        
    }
}
</script>