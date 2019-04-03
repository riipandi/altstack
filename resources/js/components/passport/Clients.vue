<template>
    <div>
        <!-- List Clients -->
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
            <div class="flex items-center justify-between bg-grey-lighter text-grey-darkest py-2 px-6 mb-0 rounded-t">
                <div class="my-1 font-bold">
                    <i class="fas fa-users mr-2"></i> OAuth Clients
                </div>
                <div class="my-1">
                    <button
                        class="btn-xs text-xs bg-grey-dark hover:bg-grey-darker text-white py-2 px-3 focus:outline-none rounded"
                        >New Client</button>
                </div>
            </div>
            <div class="w-full">
                <table class="w-full border-collapse">
                    <tbody>
                        <tr class="hover:bg-blue-lightest">
                            <td class="py-3 px-6 border-b border-grey-light">Conversations</td>
                            <td class="py-3 px-6 border-b border-grey-light text-grey">https://domain.tld/oauth/callback</td>
                            <td class="py-3 px-6 border-b border-grey-light text-right">
                                <div class="inline-flex">
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-l">Edit</button>
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-r">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-lightest">
                            <td class="py-3 px-6 border-b border-grey-light">Question-Buttons</td>
                            <td class="py-3 px-6 border-b border-grey-light text-grey">https://domain.tld/oauth/callback</td>
                            <td class="py-3 px-6 border-b border-grey-light text-right">
                                <div class="inline-flex">
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-l">Edit</button>
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-r">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-blue-lightest">
                            <td class="py-3 px-6 border-b border-grey-light">Image Attachment</td>
                            <td class="py-3 px-6 border-b border-grey-light text-grey">https://domain.tld/oauth/callback</td>
                            <td class="py-3 px-6 border-b border-grey-light text-right">
                                <div class="inline-flex">
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-l">Edit</button>
                                    <button class="btn-xs text-xs bg-grey-light hover:bg-grey text-grey-darkest font-semibold py-2 px-4 focus:outline-none rounded-r">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clients: [],
                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },
                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },
        mounted() {
            this.prepareComponent();
        },
        methods: {
            prepareComponent() {
                this.getClients();
                $('#modal-create-client').on('shown.bs.modal', () => {
                    $('#create-client-name').focus();
                });

                $('#modal-edit-client').on('shown.bs.modal', () => {
                    $('#edit-client-name').focus();
                });
            },
            getClients() {
                axios.get('/oauth/clients').then(response => { this.clients = response.data; });
            },
            showCreateClientForm() {
                $('#modal-create-client').modal('show');
            },
            store() {
                this.persistClient( 'post', '/oauth/clients', this.createForm, '#modal-create-client' );
            },
            edit(client) {
                this.editForm.id = client.id;
                this.editForm.name = client.name;
                this.editForm.redirect = client.redirect;
                $('#modal-edit-client').modal('show');
            },
            update() {
                this.persistClient(
                    'put', '/oauth/clients/' + this.editForm.id,
                    this.editForm, '#modal-edit-client'
                );
            },
            persistClient(method, uri, form, modal) {
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
            destroy(client) {
                axios.delete('/oauth/clients/' + client.id).then(response => { this.getClients(); });
            }
        }
    }
</script>
