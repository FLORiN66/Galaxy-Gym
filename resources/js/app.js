import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from  './Shared/Layout';

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;
    if(page.layout === undefined) {
      page.layout = Layout;
    }
    // page.layout ??= Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component("Link", Link)
      .component("Head", Head)
      .mount(el)
  },
  title: title => `My app - ${title}`
});


InertiaProgress.init({
    showSpinner: true
});


window.onload = () => {
    //Get all the parameters from URL and check if loggedin param exist
    try {
        let paramString = window.location.href.split('?')[1];
        if( paramString && paramString.includes('loggedin')) throw 'You are already connected!';
    } catch( err ) {
        var error = document.getElementById('messages');
        error.innerHTML = `<p class="error">${err}</p>`;
        error.addEventListener('remove', () => {

        });
        setTimeout(()=> {
            document.querySelector('#messages .error').remove();
        }, 2000);
    }
}

