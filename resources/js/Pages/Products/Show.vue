<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <h2 class="font-semibold text-lg mb-6 text-center">{{ pageTitle }}</h2>
            <div>
                <p>Nom: {{ product.name }}</p>
                <p>Description: {{ product.description }}</p>
                <p>Prix: {{ product.price }}</p>
                <p>Taille: {{ product.size }}</p>
                <p>Marque: {{ product.brand }}</p>
                <!-- Afficher d'autres détails du produit ici -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { usePage } from "@inertiajs/vue3";

// Récupération des données depuis Inertia
const { props } = usePage();
const product = props.product;
const pageTitle = props.pageTitle;
</script>

<style scoped>

</style>
