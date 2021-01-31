<template>
    <div>
        <h4 class="text-uppercase text-secondary font-weight-bolder">Check for availability</h4>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="arrival">Arrival</label>
              <input 
              type="text" 
              name="from" 
              class="form-control form-control-sm" 
              placeholder="Date of arrival"
              v-model="arrival"
              @keyup.enter="check"
              >
          </div>
           <div class="form-group col-md-6">
              <label for="depart">Departure</label>
              <input 
              type="text" 
              name="from" 
              class="form-control form-control-sm" 
              placeholder="Date of departure"
              v-model="depart"
              @keyup.enter="check"
              >
          </div>
        </div>
        <button class="btn btn-secondary btn-block">Check availability</button>
    </div>
</template>

<script>
export default {
    data(){
        return{
            arrival: null,
            depart: null,
        }
    },
    methods:{
        check(){
            alert("This is an alert !");
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
</style>