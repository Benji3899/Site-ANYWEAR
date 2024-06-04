<script setup>
import {Head} from '@inertiajs/vue3';
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
    <Head title="Accueil"><title>Accueil</title></Head>
    <AuthenticatedLayout>

        <div class="bg-gray-50 text-black">

            <div
                class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
            >
                <div class="relative w-full p-0">
                    <header class="w-full h-screen bg-center bg-cover"
                            style="background-image: url('images/hero-banner.jpg'); background-repeat: no-repeat">
                        <div class="flex justify-center items-center h-full">
                            <img class="object-scale-down bg-contain size-60 lg:size-96" src="/images/logo-slogan.png"
                                 alt="Logo AnyWear et slogan: AnyWear, luxury pieces, anytime, anywhere">
                        </div>
                    </header>


                    <main class="text-sm mt-20 mx-auto flex flex-col items-center">

                        <!-- Section comment ça marche  -->
                        <div class="mb-20 w-10/12 lg:w-11/12">
                            <div class="mb-8 text-center">
                                <h2 class="text-3xl font-semibold lg:text-4xl">AnyWear, comment ça marche ?</h2>
                                <p class="mt-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                                    excepturi. Lorem10 ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                                    excepturi. lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus,
                                    excepturi.</p>
                            </div>

                            <div class="grid gap-6 lg:grid-cols-3 lg:gap-8 text-white">
                                <div class="bg_blue p-10 rounded-lg">
                                    <h3 class="text-xl font-semibold text-center lg:text-1xl lg:mb-8">Dépôt vêtements et accessoires</h3>
                                    <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid
                                        asperiores assumenda culpa nostrum tempore totam voluptates. Molestiae nihil
                                        quia rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Necessitatibus, totam.</p>
                                </div>

                                <div class="bg_blue p-10 rounded-lg">
                                    <h3 class="text-xl font-semibold text-center lg:text-1xl lg:mb-8">Éstimation des pièces</h3>
                                    <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet
                                        distinctio eius error iure nesciunt, non ratione saepe suscipit ut voluptatum?
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, rem?</p>
                                </div>

                                <div class="bg_blue p-10 rounded-lg">
                                    <h3 class="text-xl font-semibold text-center lg:text-1xl lg:mb-8">Évaluation du prix</h3>
                                    <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi
                                        architecto dicta eaque fuga fugiat maiores nisi placeat temporibus veritatis
                                        vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda,
                                        sequi.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Section catégories  -->
                        <div class="mb-20 w-10/12 lg:w-11/12">
                            <div class="mb-8 text-center">
                                <h2 class="text-3xl font-semibold lg:text-4xl">Nos catégories</h2>
                            </div>

                            <div class="grid gap-6 lg:grid-cols-3 lg:gap-8 font-semibold text-white">
                                <div class="relative text-center">
                                    <div class="w-full h-96 overflow-hidden relative">
                                        <img class="rounded-lg w-full h-full object-cover" src="/images/sac-et-montre600-400.jpg" alt="Catégorie sacs à main">
                                        <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                    </div>
                                    <h3 class="absolute inset-0 flex items-center justify-center text-xl">Sacs à main</h3>
                                </div>

                                <div class="relative text-center">
                                    <div class="w-full h-96 overflow-hidden relative">
                                        <img class="rounded-lg w-full h-full object-cover" src="/images/categorie-robe600-400.jpg" alt="Catégorie robes">
                                        <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                    </div>
                                    <h3 class="absolute inset-0 flex items-center justify-center text-xl">Robes</h3>
                                </div>

                                <div class="relative text-center">
                                    <div class="w-full h-96 overflow-hidden relative">
                                        <img class="rounded-lg w-full h-full object-cover" src="/images/categorie-smoking600-400.jpg" alt="Catégorie smokings">
                                        <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                    </div>
                                    <h3 class="absolute inset-0 flex items-center justify-center text-xl">Smokings</h3>
                                </div>

                            </div>
                        </div>

                        <!-- Section réassurance  -->
                        <div class="bg_blue mb-20 w-full text-white">
                            <div class="w-10/12 lg:w-11/12 mx-auto py-16">
                                <div class="text-center">
                                    <h2 class="text-3xl font-semibold lg:text-4xl">Nos services</h2>
                                </div>

                                <div class="grid gap-6 grid-cols-3 lg:gap-8 my-8 text-center">
                                    <div>
                                        <h3><span class="text-2xl font-semibold">25</span><br>Marques</h3>
                                    </div>
                                    <div>
                                        <h3><span class="text-2xl font-semibold">10 000</span><br>Utilisateurs</h3>
                                    </div>
                                    <div>
                                        <h3><span class="text-2xl font-semibold">1000</span><br>Articles loués</h3>
                                    </div>
                                </div>

                                <!-- Cards réassurance  -->
                                <div class="grid gap-6 grid-cols-2 lg:grid-cols-4 lg:gap-8 font-semibold text-white">

                                    <div class="relative text-center">
                                        <div class="w-full h-96 overflow-hidden relative">
                                            <img class="rounded-lg w-full h-full object-cover" src="/images/section-authenticite480-400.jpg" alt="information sur la certification des accessoires">
                                            <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                        </div>
                                        <h3 class="absolute text-lg inset-0 flex items-center justify-center lg:text-xl">Certification</h3>
                                    </div>

                                    <div class="relative text-center">
                                        <div class="w-full h-96 overflow-hidden relative">
                                            <img class="rounded-lg w-full h-full object-cover" src="/images/section-assurance600-400.jpg" alt="information sur l'assurance des accessoires">
                                            <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                        </div>
                                        <h3 class="absolute text-lg inset-0 flex items-center justify-center lg:text-xl">Assurance</h3>
                                    </div>

                                    <div class="relative text-center">
                                        <div class="w-full h-96 overflow-hidden relative">
                                            <img class="rounded-lg w-full h-full object-cover" src="/images/section-livraison600-400.jpg" alt="information sur les livraisons des accessoires">
                                            <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                        </div>
                                        <h3 class="absolute text-lg inset-0 flex items-center justify-center lg:text-xl">Livraison</h3>
                                    </div>

                                    <div class="relative text-center">
                                        <div class="w-full h-96 overflow-hidden relative">
                                            <img class="rounded-lg w-full h-full object-cover" src="/images/section-nettoyage600-400.jpg" alt="information sur le nettoyage des vêtements avant location ou troque">
                                            <div class="rounded-lg absolute inset-0 bg-black opacity-15"></div>
                                        </div>
                                        <h3 class="absolute text-lg inset-0 flex items-center justify-center lg:text-xl">Nettoyage</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    <!-- Footer  -->
                    <footer class="py-16 text-center text-sm text-black">
                        Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                    </footer>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
