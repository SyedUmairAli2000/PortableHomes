<template>
    <div style="padding:1.25rem">
    <h5 class="text-uppercase text-secondary font-weight-bolder pt-4">All Reviews</h5>

     <div v-if="loading">Loading...</div>
     <div></div>

    <div class="border-bottom d-none d-md-block" v-for="(review,index) in reviews" :key="index">
      <div class="row pt-4">
        <div class="col-md-6">Jhone doe</div>
        <div class="col-md-6 d-flex justify-content-end">
            <star-rating :rating="review.rating" class="fa-2x"></star-rating>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">{{ review.created_at | fromNow }}</div>
        </div>
        <div class="row pt-4 pb-4">
            <div class="col-md-12">
                {{ review.content }}
            </div>
        </div>

    </div>

    </div>
</template>

<script>
import moment from 'moment';
export default {
    props:{
    hotelId: String
    },
    data(){
        return{
            loading: false,
            reviews: null
        }
    },
    created(){
        this.loading = true;
        axios.get(`/api/hotels/${this.hotelId}/reviews`)
        .then(response => this.reviews = response.data.data)
        .then(() =>this.loading=false);
    },
}
</script>