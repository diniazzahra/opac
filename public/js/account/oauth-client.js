/**
 * Templates
 */
var vcMainTemplate = {
    template: '#vc-account-oauth-client',
    props:{

    },
    data: function(){
        return {
            clients: [],

            createForm: {
                errors: [],
                name: '',
                redirect: '',
                confidential: true
            },

            editForm: {
                errors: [],
                name: '',
                redirect: ''
            }
        };
    },
    methods: {
        /**
         * Prepare the component.
         */
        prepareComponent: function() {
            this.getClients();

            $('#modal-create-client').on('shown.bs.modal', () => {
                $('#create-client-name').focus();
            });

            $('#modal-edit-client').on('shown.bs.modal', () => {
                $('#edit-client-name').focus();
            });
        },

        /**
         * Get all of the OAuth clients for the user.
         */
        getClients: function() {
            axios.get('/oauth/clients')
                .then(response => {
                    this.clients = response.data;
                });
        },

        /**
         * Show the form for creating new clients.
         */
        showCreateClientForm: function() {
            $('#modal-create-client').modal('show');
        },

        /**
         * Create a new OAuth client for the user.
         */
        store: function() {
            this.persistClient(
                'post', '/oauth/clients',
                this.createForm, '#modal-create-client'
            );
        },

        /**
         * Edit the given client.
         */
        edit: function(client) {
            this.editForm.id = client.id;
            this.editForm.name = client.name;
            this.editForm.redirect = client.redirect;

            $('#modal-edit-client').modal('show');
        },

        /**
         * Update the client being edited.
         */
        update: function() {
            this.persistClient(
                'put', '/oauth/clients/' + this.editForm.id,
                this.editForm, '#modal-edit-client'
            );
        },

        /**
         * Persist the client to storage using the given form.
         */
        persistClient: function(method, uri, form, modal) {
            form.errors = [];
            axios[method](uri, form)
                .then(response => {
                    this.getClients();
                    form.name = '';
                    form.redirect = '';
                    form.errors = [];
                    $(modal).modal('hide');
                })
                .catch(error => {
                    if (typeof error.response.data === 'object') {
                        form.errors = _.flatten(_.toArray(error.response.data.errors));
                    } else {
                        form.errors = ['Something went wrong. Please try again.'];
                    }
                });
        },

        /**
         * Destroy the given client.
         */
        destroy: function(client) {
            axios.delete('/oauth/clients/' + client.id)
                .then(response => {
                    this.getClients();
                });
        }
    },
    mounted: function () {
        this.prepareComponent();
    }
};

var vcAuthorizedClient = {
    template: '#vc-account-authorized-client',
    props:{
    },
    data: function(){
        return {
            tokens: []
        };
    },
    methods: {
        /**
         * Prepare the component (Vue 2.x).
         */
        prepareComponent: function() {
            this.getTokens();
        },

        /**
         * Get all of the authorized tokens for the user.
         */
        getTokens: function() {
            axios.get('/oauth/tokens')
                .then(response => {
                    this.tokens = response.data;
                });
        },

        /**
         * Revoke the given token.
         */
        revoke: function(token) {
            axios.delete('/oauth/tokens/' + token.id)
                .then(response => {
                    this.getTokens();
                });
        }
    },
    mounted: function() {
        this.prepareComponent();
    },
};
/**
 * init
 */
function initVue() {
    var vm = new Vue({
        el: '#app',
        data: {
        },
        mounted: function () {
            if(typeof pjax !== 'undefined'){
                pjax.refresh();
            }
        },
        components: {
            'vc-account-oauth-client': vcMainTemplate,
            'vc-account-authorized-client': vcAuthorizedClient
        }
    });
    $('.app-placeholder').addClass('d-none');
    $('.main_content_app').removeClass('d-none');
}
try{
    initVue();
}catch (e) {
    window.location.reload();
}
