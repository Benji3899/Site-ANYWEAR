<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <h2 class="font-semibold text-xl mb-6 text-center">{{ pageTitle }}</h2>
            <div class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="mb-8">
                        <p class="text-lg font-bold mb-4">Nom : {{ product.name }}</p>
                        <p class="text-gray-700 mb-4">Prix : {{ product.price }}€</p>
                        <p class="text-gray-700 mb-4">Taille : {{ product.size }}</p>
                        <p class="text-gray-700 mb-4">Marque : {{ product.brand }}</p>
                        <p class="text-gray-700 mb-4">Description <br> {{ product.description }}</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="text-center">
                            <p class="text-gray-700 mb-4">Image 1</p>
                            <img :src="`/storage/products/${product.first_img}`" alt="Image 1"
                                 class="w-full h-auto mb-6 rounded-lg shadow-md md:w-full">
                        </div>
                        <div class="text-center">
                            <p class="text-gray-700 mb-4">Image 2</p>
                            <img :src="`/storage/products/${product.second_img}`" alt="Image 2"
                                 class="w-full h-auto rounded-lg shadow-md md:w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {usePage} from "@inertiajs/vue3";

// Récupération des données depuis Inertia
const {props} = usePage();
const product = props.product;
const pageTitle = props.pageTitle;
</script>

<style scoped>

</style>
