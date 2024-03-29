<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
const items = [
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    {
        name: "African Elephant",
        species: "Loxodonta africana",
        diet: "Herbivore",
        habitat: "Savanna, Forests",
    },
    // ... more items
];
</script>

<template>
    <AppLayout title="Clients">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 grid justify-items-end">
                    <v-btn color="primary" class="">Create</v-btn>
                    <v-data-table :items="items"></v-data-table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
