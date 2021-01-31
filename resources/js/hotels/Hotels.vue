<template>
    <div>
        <div class="navbar-brand" v-if="loading">Loading All Hotels....</div>
        <div v-else>
         <div class="row mb-4" v-for="row in rows" :key=" 'row' + row ">
        <div 
        class="col d-flex align-items-stretch"
        v-for="(Hotel,column) in HotelsInRow(row)"
        :key="'row' + row + column ">
        <HotelList v-bind="Hotel"></HotelList>
        </div>
        <div class="col" 
        v-for="p in PlaceholdersInRow(row)" :key="'placeholder' + row + p"></div>
         </div>
        </div>
    </div>
</template>

<script>
import HotelList from "./HotelList";
export default {
    components: {
       HotelList
    },
     data() {
        return{
            Hotels:null,
            loading: false,
            columns: 3
        };
    },
    methods:{
    HotelsInRow(row){
            return  this.Hotels.slice((row - 1) * this.columns, row * this.columns);
          },
    PlaceholdersInRow(row){
          return this.columns - this.HotelsInRow(row).length;
         }
    },
    computed:{
        rows(){
            return this.Hotels == null? 0 : Math.ceil(this.Hotels.length/this.columns)
        }
    },
    created() {
        this.loading = true;
    const request = axios.get("/api/hotels").then(response => {
        this.Hotels = response.data.data;
        this.loading = false;
    
    });
    
}

}
</script>