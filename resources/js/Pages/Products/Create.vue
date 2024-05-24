<template>
    <Head title="Créer un produit" />

    <AuthenticatedLayout>
        <!-- @submit.prevent pour annuler le comportement par défaut   -->
        <form @submit.prevent="onSubmitForm">
            <p>Ajouter un produit</p>
            <p>Nom: <input type="text" required v-model="form.name"></p>
            <p>Description <input type="text" required v-model="form.description"></p> <!-- voir nombre ligne max-->
            <p>Taille: <input type="text" v-model="form.size"></p>
            <p>Marque: <input type="text" required v-model="form.brand"></p>
            <p>Image 1: <input type="file" accept="image/jpeg, image/png" required v-on:change="onFirstImageChanged"></p>
            <p>Image 2: <input type="file" accept="image/jpeg, image/png" required v-on:change="onSecondImageChanged"></p>
            <p>Type:
                <select name="" id="" v-model="form.type" required>
                    <option value="rental">Location</option>
                    <option value="swap">Troque</option>
                </select>
            </p>
            <p>Catégorie:
                <select name="" id="" v-model="form.category" required>
                    <option value="sac">Sac</option>
                    <option value="robe">Robe</option>
                    <option value="pantalon">Pantalon</option>
                    <option value="smoking">Smoking</option>
                    <option value="jupe">Jupe</option>
                </select>
            </p>
            <button type="submit">Ajouter le produit</button>
        </form>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {router} from "@inertiajs/vue3";
import {reactive} from "vue";

const form = reactive({
    name: null,
    description: null,
    size: null,
    brand: null,
    first_img: null,
    second_img: null,
    type: null,
    category: null,
})

// Fonction pour soumettre le formulaire
function onSubmitForm() {
    router.post('/products', form)
}

// Fonction pour gérer le changement de la première image
function onFirstImageChanged(event) {
    form.first_img=event.target.files[0];
}

// Fonction pour gérer le changement de la deuxième image
function onSecondImageChanged(event) {
    form.second_img=event.target.files[0];
}

</script>

<style scoped>

</style>
