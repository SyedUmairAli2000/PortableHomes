<template>
    <div>
        <h4 class="text-uppercase text-secondary font-weight-bolder">
            Check for availability
            <span v-if="notAvailable" class="text-danger">( Not Available )</span>
            <span v-if="isAvailable" class="text-success">( Available )</span>
            </h4>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label>Arrival</label>
              <input
              type="text"
              name="arrival"
              class="form-control form-control-sm"
              placeholder="Date of arrival"
              v-model="arrival"
              @keyup.enter="check"
              :class="[{'is-invalid': errorFor('arrival')}]"
              />
              <div class="invalid-feedback" v-for="(error,index) in this.errorFor('arrival')" :key="'arrival'+ index">
                  {{ error }}
              </div>
          </div>
           <div class="form-group col-md-6">
              <label>Departure</label>
              <input
              type="text"
              name="departure"
              class="form-control form-control-sm"
              placeholder="Date of departure"
              v-model="departure"
              @keyup.enter="check"
              :class="[{'is-invalid': this.errorFor('departure')}]"
              />
              <div class="invalid-feedback" v-for="(error,index) in this.errorFor('departure')" :key="'departure'+ index">
                  {{ error }}
              </div>
          </div>
        </div>
        <button class="btn btn-secondary btn-block" :disabled="loading" @click="check">Check availability</button>
    </div>
</template>

<script>
export default {
    props:{
        hotelId: String
    },
    data(){
        return{
            arrival: null,
            departure: null,
            loading: false,
            status: null
        }
    },
    methods:{
        check(){
         this.loading = true;
         this.errors = null;

         axios.get(`/api/hotels/${this.hotelId}/availability?arrival=${this.arrival}&departure=${this.departure}`
         ).then(response => {
              this.status = response.status;
         }).catch(error =>{
             if(422 === error.response.status){
                 this.errors = error.response.data.errors;
             }
             this.status = error.response.status;
         }).then(() => (this.loading = false));
        },
        errorFor(field){
            return this.hasErrors && this.errors[field] ? this.errors[field] : null;
        }
    },
    computed: {
        hasErrors(){
            return 422 == this.status && this.errors != null;
        },
        isAvailable(){
            return 200 == this.status;
        },
        notAvailable(){
            return 404 == this.status;
        }

    }
}
</script>



<style scoped>
label{
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bold;
}
.is-invalid {
    border-color: #b22222;
    background-image: none;
}
.invalid-feedback{
    color: #b22222;
}
</style>
