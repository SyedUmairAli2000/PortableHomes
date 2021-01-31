import VueRouter from "vue-router";
import Hotels from "./hotels/Hotels.vue";
import Hotel from "./singleHotel/singleHotel.vue";

const routes = [
    {
        path: "/",
        component: Hotels,
        name: "home"
    },
    {
        path: "/hotel/:id",
        component: Hotel,
        name: "hotel" 
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;