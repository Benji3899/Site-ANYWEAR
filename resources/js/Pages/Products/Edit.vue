<template>
    <Head :title="`Éditer votre produit ${form.name}`" ><title>Modifier votre produit</title></Head>
    <AuthenticatedLayout>
        <div class="py-12">
            <h2 class="font-semibold text-lg mb-6 text-center">Éditer votre produit {{ product.name }}</h2>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- @submit.prevent pour annuler le comportement par défaut du formulaire -->
                <form @submit.prevent="onSubmitForm" class="max-w-lg mx-auto">
                    <div class="grid grid-cols-1 gap-6">
                        <label for="name" class="block">
                            <span>Nom</span>
                            <input type="text" required v-model="form.name"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="size" class="block">
                            <span>Taille</span>
                            <input type="text" v-model="form.size"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="description" class="block">
                            <span>Description</span>
                            <input type="text" required v-model="form.description"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="price" class="block">
                            <span>Prix</span>
                            <input type="number" v-model="form.price"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="brand" class="block">
                            <span>Marque</span>
                            <input type="text" required v-model="form.brand"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="image_1" class="block">
                            <span>Image 1</span>
                            <input type="file" accept="image/jpeg, image/png" @change="onFirstImageChanged"
                                   class="mt-1 block w-full border-gray-300 focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="image_2" class="block">
                            <span>Image 2</span>
                            <input type="file" accept="image/jpeg, image/png" @change="onSecondImageChanged"
                                   class="mt-1 block w-full border-gray-300 focus:ring-blue-500 focus:ring-opacity-50">
                        </label>
                        <label for="type" class="block">
                            <span>Type</span>
                            <select name="" id="" v-model="form.type" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                                <option value="rental">Location</option>
                                <option value="swap">Troque</option>
                            </select>
                        </label>
                        <label for="category" class="block">
                            <span>Catégorie</span>
                            <select name="" id="" v-model="form.category" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:ring-opacity-50">
                                <option value="sac">Sac</option>
                                <option value="robe">Robe</option>
                                <option value="pantalon">Pantalon</option>
                                <option value="smoking">Smoking</option>
                                <option value="jupe">Jupe</option>
                            </select>
                        </label>
                        <div class="mt-8 flex justify-center">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-md">
                                Modifier le produit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {reactive, ref} from "vue";
import {router, usePage} from "@inertiajs/vue3";
import axios from "axios";

// Récupération des données du produit depuis la page Inertia
const {product} = usePage().props;
const errors = ref([]);

// Initialisation du formulaire réactif avec les valeurs du produit
const form = reactive({
    name: product.name,
    description: product.description,
    price: product.price,
    size: product.size,
    brand: product.brand,
    first_img: null,
    second_img: null,
    type: product.type,
    category: product.category,
});


/*** Fonction pour soumettre le formulaire ***/
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

    // Debug: Log formData content
    for (let pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }
    // console.log(...formData); // Pour vérifier les données envoyées

    try {
        await axios.patch(`/products/${product.id}`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });
        router.visit(`/dashboard`);
    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = Object.values(error.response.data.errors).flat();
        } else {
            console.error('Error submitting form', error);
        }
    }
}
/*** FIN fonction pour soumettre le formulaire ***/

// Fonction pour gérer le changement d'image
function onFirstImageChanged(event) {
    form.first_img = event.target.files[0];
}

function onSecondImageChanged(event) {
    form.second_img = event.target.files[0];
}


</script>

<style scoped>

</style>
