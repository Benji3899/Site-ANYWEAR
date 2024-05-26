<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const { props } = usePage();
console.log('Props:', props);
const products = props.products || [];
console.log('Products:', products);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Vous êtes connectés</div>
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-lg mb-6 text-center">Mes Produits</h2>
                        <ul v-if="products && products.length" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                            <li v-for="product in products" :key="product.id" class="bg-white shadow-md rounded-lg overflow-hidden">
                                <img :src="`/storage/products/${product.first_img}`" alt="Image 1" class="w-full h-auto">
                                <h4 class="text-center m-6">{{ product.name }}</h4>
                                <div class="flex justify-center space-x-4 mb-4">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                </div>
                            </li>
                        </ul>
                        <p v-else>Aucun produit trouvé.</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
