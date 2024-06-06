<template>
    <footer class="bg_blue text-white py-16 text-center text-sm">
        <div class="flex flex-col items-center space-y-8 mx-auto">
            <div class="flex flex-col lg:flex-row lg:w-full lg:justify-around">
                <img src="/images/logo-anywear.png" alt="Logo" class="mb-8">
                <div class="my-14">
                    <p class="text-lg font-semibold">Réseaux sociaux</p>
                    <div class="flex space-x-6 mt-4">
                        <a href=""><img class="size-12" src="/images/TikTok.svg" alt=""></a>
                        <a href=""><img class="size-12" src="/images/Instagram%20Circle.svg" alt=""></a>
                        <a href=""><img class="size-12" src="/images/Facebook.svg" alt=""></a>
                        <a href=""><img class="size-12" src="/images/LinkedIn%20Circled.svg" alt=""></a>
                    </div>
                </div>
                <nav class="flex flex-col items-center space-y-4">
                    <NavLink :href="route('accueil')" :active="route().current('accueil')">Accueil</NavLink>
                    <NavLink>Location</NavLink>
                    <NavLink>Troc</NavLink>
                    <NavLink>Certification</NavLink>
                    <NavLink>Contact</NavLink>
                </nav>
            </div>
            <p class="mt-8 text-white">&copy; 2024 by AnyWear | <a :href="route('legal')">Information légales</a>
                - <a href="#">RGPD</a></p>
        </div>
    </footer>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>

<style scoped>
footer a {
    color: white;
    text-decoration: none;
}

/*footer a:hover {*/
/*    text-decoration: underline;*/
/*}*/
</style>
