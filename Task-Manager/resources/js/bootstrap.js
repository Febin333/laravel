import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js'
window.axios = axios;
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.private('tasks')
    .listen('TaskStatusUpdated', (e) => {
        console.log('Task Notification:', e.message);
        alert(e.message); // Simple alert, can be replaced with custom notification UI
    });
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
