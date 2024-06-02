<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    user: {
        type: Object,
        required: false,
        default: () => ({}),
    }

});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Accueil" ><title>Accueil</title></Head>
    <AuthenticatedLayout>

    <div class="bg-gray-50 text-black">

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full p-0">
                <header class="w-full h-screen bg-center bg-cover" style="background-image: url('/storage/images/hero-banner.jpg');">
                    <div class="flex justify-center items-center h-full">
                        <img src="/storage/images/logo-slogan.png" width="400" alt="Logo AnyWear et slogan: AnyWear, luxury pieces, anytime, anywhere">
                    </div>
                </header>

                <main class="mt-20 mx-auto max-w-7xl flex flex-col items-center">
                    <div class="grid gap-6 lg:gap-8">
                        <div class="mb-6">
                        <h2 class="text-center text-4xl font-semibold">Comment ça marche ?</h2>
                        <p class="mt-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, excepturi. Lorem10 ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, excepturi. lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, excepturi.</p>
                        </div>
                        <div class="flex justify-between w-full text-white">
                            <div class="bg_blue p-10 rounded-lg flex-1 mx-5">
                                <h3 class="text-2xl font-semibold text-center">Dépôt vêtements et accessoires</h3>
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores assumenda culpa nostrum tempore totam voluptates. Molestiae nihil quia rerum.</p>
                            </div>
                            <div class="bg_blue p-10 rounded-lg flex-1 mx-5">
                                <h3 class="text-2xl font-semibold text-center">stimation des pièces</h3>
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet distinctio eius error iure nesciunt, non ratione saepe suscipit ut voluptatum?</p>
                            </div>
                            <div class="bg_blue p-10 rounded-lg flex-1 mx-5">
                                <h3 class="text-2xl font-semibold text-center">Évaluation du prix</h3>
                                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto dicta eaque fuga fugiat maiores nisi placeat temporibus veritatis vero?</p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
</template>
