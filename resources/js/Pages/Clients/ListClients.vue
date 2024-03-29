<template>
    <AppLayout title="Clientes">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clientes
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8 max-w-screen-2xl">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 grid justify-items-start">
                    <!-- Botón para crear cliente -->
                    <div class="flex justify-between w-full my-4">
                        <!-- Filtros -->
                        <form class="flex space-x-2" @submit.prevent="applyFilters">
                            <InputText v-model="filters.name" type="text" placeholder="Buscar por nombre" />
                            <!-- Agregar más campos de filtro según sea necesario -->

                            <Button size="small" type="submit">Aplicar Filtros</Button>
                        </form>
                        <Toolbar>
                            <router-link to="/" target="_blank" rel="noopener">
                                <Button label="Crear" icon="pi pi-plus" severity="success" class="mr-2" />
                            </router-link>

                            <Button label="Eliminar" icon="pi pi-trash" severity="danger" @click="confirmDeleteSelected"
                                :disabled="!selectedClients || !selectedClients.length" />
                        </Toolbar>
                    </div>


                    <!-- Tabla de clientes -->

                    <DataTable :value="clients" removableSort showGridlines stripedRows resizableColumns class="w-full"
                        paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
                        paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                        currentPageReportTemplate="{first} to {last} of {totalRecords}">
                        <template #paginatorstart>
                            <Button type="button" icon="pi pi-refresh" text />
                        </template>
                        <template #paginatorend>
                            <Button type="button" icon="pi pi-download" text />
                        </template>
                        <template #empty> No se encontraron clientes. </template>
                        <Column field="name" header="Nombre" sortable style="width: 25%"></Column>
                        <Column field="lastName" header="Apellido" sortable style="width: 25%"></Column>
                        <Column field="typeOfDocument" header="Tipo de Documento" sortable style="width: 25%"></Column>
                        <Column field="documentNumber" header="Número de Documento" sortable style="width: 25%">
                        </Column>
                        <Column field="historyNumber" header="Número de historia" sortable style="width: 25%">
                        </Column>
                        <Column field="email" header="Correo Electrónico" sortable style="width: 25%"></Column>
                        <Column field="phone" header="Teléfono" sortable style="width: 25%"></Column>
                        <Column field="address" header="Dirección" sortable style="width: 25%"></Column>
                    </DataTable>

                </div>
            </div>
        </div>
        <!-- CLIENT CREATE DIALOG -->
        <Dialog v-model:visible="clientDialog" :style="{ width: '450px' }" header="Detalles del Cliente" :modal="true"
            class="p-fluid">
            <div class="field">
                <label for="name">Nombre</label>
                <InputText id="name" v-model.trim="form.name" required autofocus
                    :class="{ 'p-invalid': submitted && !form.name }" />
                <small class="p-error" v-if="submitted && !form.name">El nombre es obligatorio.</small>
            </div>

            <div class="field">
                <label for="lastName">Apellido</label>
                <InputText id="lastName" v-model.trim="form.lastName" required
                    :class="{ 'p-invalid': submitted && !form.lastName }" />
                <small class="p-error" v-if="submitted && !form.lastName">El apellido es obligatorio.</small>
            </div>

            <div class="field">
                <label for="typeOfDocument">Tipo de Documento</label>
                <InputText id="typeOfDocument" v-model.trim="form.typeOfDocument" required
                    :class="{ 'p-invalid': submitted && !form.typeOfDocument }" />
                <small class="p-error" v-if="submitted && !form.typeOfDocument">El tipo de documento es
                    obligatorio.</small>
            </div>

            <div class="field">
                <label for="documentNumber">Número de Documento</label>
                <InputText id="documentNumber" v-model.trim="form.documentNumber" required
                    :class="{ 'p-invalid': submitted && !form.documentNumber }" />
                <small class="p-error" v-if="submitted && !form.documentNumber">El número de documento es
                    obligatorio.</small>
            </div>

            <div class="field">
                <label for="historyNumber">Número de Historia</label>
                <InputText id="historyNumber" v-model.trim="form.historyNumber" required
                    :class="{ 'p-invalid': submitted && !form.historyNumber }" />
                <small class="p-error" v-if="submitted && !form.historyNumber">El número de historia es
                    obligatorio.</small>
            </div>

            <template #footer>
                <Button label="Cancelar" icon="pi pi-times" text @click="hideDialog" />
                <Button label="Guardar" icon="pi pi-check" text @click="saveClient" />
            </template>
        </Dialog>

    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { usePage } from '@inertiajs/vue3';
import { reactive, ref } from 'vue';
import { router } from '@inertiajs/vue3'
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import RadioButton from 'primevue/radiobutton';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dropdown from 'primevue/dropdown';
const { props } = usePage();
const clients = props.clients;
const filters = reactive(props.filters);
const selectedClients = ref();
const client = ref({});
const submitted = ref();
const clientDialog = ref();
const openNew = () => {
    client.value = {};
    submitted.value = false;
    clientDialog.value = true;
};
const form = reactive({
    name: null,
    lastName: null,
    typeOfDocument: null,
    documentNumber: null,
    historyNumber: null,
    email: null,
    phone: null,
    address: null,
});

const applyFilters = () => {
    // Enviar solicitud a Laravel con los filtros
    console.log("filters", filters.name);
    router.get('/clients', { name: filters.name });
};

const createClient = () => {
    console.log("epale mi gente");
};
</script>
