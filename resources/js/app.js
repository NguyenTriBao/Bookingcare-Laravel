import './bootstrap';
import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

import Echo from "laravel-echo";
import Pusher from  "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster : "pusher",
    key : import.meta.env.VITE_PUSHER_APP_KEY,
    cluster : import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS : true,
    authEndpoint : "/broadcasting/auth",
    auth : {
        headers: {
            Authorization : "Bearer " + localStorage.getItem("token"),
        },
    },
});