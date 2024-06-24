<template>

    <AuthenticatedLayout>
        <!-- @submit.prevent pour annuler le comportement par défaut du formulaire -->
        <form @submit.prevent="onSubmitForm" method="post" enctype="multipart/form-data">
            <p>Modifier le produit</p>
            <p>Nom: <input type="text" required v-model="form.name" /></p>
            <p>Description: <input type="text" required v-model="form.description" /></p>
            <p>Prix: <input type="number" v-model="form.price" /></p>
            <p>Taille: <input type="text" v-model="form.size" /></p>
            <p>Marque: <input type="text" required v-model="form.brand" /></p>
            <p>Image 1: <input type="file" accept="image/jpeg, image/png" @change="onFirstImageChanged" /></p>
            <p>Image 2: <input type="file" accept="image/jpeg, image/png" @change="onSecondImageChanged" /></p>
            <p>Type:
                <select v-model="form.type" required>
                    <option value="rental">Location</option>
                    <option value="swap">Troque</option>
                </select>
            </p>
            <p>Catégorie:
                <select v-model="form.category" required>
                    <option value="sac">Sac</option>
                    <option value="robe">Robe</option>
                    <option value="pantalon">Pantalon</option>
                    <option value="smoking">Smoking</option>
                    <option value="jupe">Jupe</option>
                </select>
            </p>
            <button type="submit">Modifier le produit</button>
        </form>

        <!-- Affichage des erreurs de validation -->
        <!-- v-if="errors.length" pour afficher les erreurs seulement s'il y en a -->
        <div v-if="errors.length">
            <p>Il y a des erreurs dans votre formulaire :</p>
            <ul>
                <li v-for="error in errors" :key="error">{{ error }}</li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {reactive, ref} from "vue";
import { router, usePage } from "@inertiajs/vue3";
import axios from "axios";

// Récupération des données du produit depuis la page Inertia
const { props } = usePage();
const product = props.product;


// Initialisation du formulaire réactif avec les valeurs du produit
const form = reactive({
    name: product.name,
    description: product.description,
    price: product.price,
    size: product.size,
    brand: product.brand,
    // first_img: product.first_img,
    // second_img: product.second_img,
    first_img: null,
    second_img: null,
    type: product.type,
    category: product.category,
});

const errors = ref([]);

/***** test ******/
// Fonction pour gérer le changement d'image
function onFirstImageChanged(event) {
    form.first_img = event.target.files[0];
}

function onSecondImageChanged(event) {
    form.second_img = event.target.files[0];
}
/***** test ******/

// Fonction pour soumettre le formulaire
async function onSubmitForm() {
    const formData = new FormData();
    formData.append('name', form.name);
    formData.append('description', form.description);
    formData.append('price', form.price);
    formData.append('size', form.size);
    formData.append('brand', form.brand);
    formData.append('type', form.type);
    formData.append('category', form.category);

    if (form.first_img) {
        formData.append('first_img', form.first_img);
    }
    if (form.second_img) {
        formData.append('second_img', form.second_img);
    }

    // console.log(...formData); // Pour vérifier les données envoyées

    try {
        const response = await axios.patch(`/products/${product.id}`, formData, {
            headers: {
                "Content-Type": "multipart/form-data",
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });
        console.log('Form submitted successfully', response.data);
        router.visit('/dashboard');
    } catch (error) {
        console.error('Error submitting form', error);
        if (error.response && error.response.status === 422) {
            errors.value = Object.values(error.response.data.errors).flat();
        } else {
            errors.value = ['Une erreur inconnue est survenue.'];
        }
    }

    // router.patch(`/products/${product.id}`, formData, {
    //     headers: {
    //         "Content-Type": "multipart/form-data",
    //     },
    // });
}

// Fonction pour soumettre le formulaire
// function onSubmitForm() {
//     console.log(form);
//     console.log(product);
//     router.patch(`/products/${product.id}`, form, {
//         headers: {
//             "Content-Type": "multipart/form-data",
//         },
//     });

</script>

<style scoped>

</style>
