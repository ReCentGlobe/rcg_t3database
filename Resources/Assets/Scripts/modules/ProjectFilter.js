import {module as AbstractModule} from '../util/main'

export default class extends AbstractModule {
    constructor(m) {
        super(m);

        this.events = {
            click: {
                filterSubmit: 'submitForm',
                filterReset: 'resetSelectElements'
            },
            change: {
                filterSelect: 'submitForm'
            },
            keyup: {
                filterInput: 'submitForm'
            }
        }
    }

    init() {
        console.log('loaded ProjectFilter');
    }

    submitForm(e) {
        e.preventDefault();
        console.log('fetchAction');
        this.fetchData();
    }

    fetchData() {
        const form = this.$('filterForm')[0];
        const results = this.$('filterResults')[0];
        const reqHeaders = new Headers();
        reqHeaders.append('pragma', 'no-cache');
        reqHeaders.append('cache-control', 'no-cache, no-store, must-revalidate');


        fetch(form.getAttribute('action'), {
            method: form.getAttribute('method'),
            headers: reqHeaders,
            body: new FormData(form)
        }).then((response) => {
            console.log('success!', response);
            return response.text()
        }).then((data) => {
            results.innerHTML = data;
        }).catch(function (err) {
            // There was an error
            console.warn('Something went wrong.', err);
        });
    }

    resetSelectElements() {
        const form = this.$('filterForm')[0];
        form.querySelectorAll('select').forEach(function (select) {
            const options = select.options;
            // Look for a default selected option
            for (let i = 0, iLen = options.length; i < iLen; i++) {
                if (options[i].defaultSelected) {
                    select.selectedIndex = i;
                    return;
                }
            }
            // If no option is the default, select first or none as appropriate
            select.selectedIndex = -1; // or -1 for no option selected
        })
        this.fetchData();
    }
}