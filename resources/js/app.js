import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp , Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueSnip from 'vue-snip'
import VueApexCharts from "vue3-apexcharts";
import { QuillEditor } from '@vueup/vue-quill'
import { vMaska } from "maska"

import "bootstrap"
// 
import  '@/assets/js/vendor/uploader/image-uploader.min.js';

import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
// Jquery instace
import $ from 'jquery';
window.$ = $;

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSnip)
            .use(ZiggyVue, Ziggy)
            .use(ToastPlugin , {
                // One of the options
                position: 'top-right'
            })
            .component('inertia-link',Link)
            .component('apexchart',VueApexCharts)
            .component('QuillEditor', QuillEditor)
            .directive("maska", vMaska)
            .mount(el);
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
           delay: 250,

           // Whether to include the default NProgress styles...
           includeCSS: true,

           // Whether the NProgress spinner will be shown...
           showSpinner: true,
   },
});
