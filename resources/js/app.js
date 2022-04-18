import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from "./Shared/Layout"
createInertiaApp({
    resolve: async name => {
        let page = (await import(`./Pages/${name}`)).default;
        if (page.layout === undefined) {
            page.layout = Layout;

        }
        // page.layout ??= Layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('Link', Link)
            .component('Head', Head)
            .use(plugin)
            .mount(el)
    },
    title: title => `My App - ${title}`
})
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: 'blue',

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true,
})
