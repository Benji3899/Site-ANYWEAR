<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link, usePage} from '@inertiajs/vue3';

// État pour le menu de navigation mobile
const showingNavigationDropdown = ref(false);

const { props } = usePage();
const user = props.auth.user || null;

const showingUserDropdown = ref(false);
// Fonction pour basculer l'affichage du dropdown du profil utilisateur
const toggleUserDropdown = () => {
    showingUserDropdown.value = !showingUserDropdown.value;
};

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg_blue border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('accueil')">
                                    <img src="/storage/images/logo-anywear.png" width="40" alt="">
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-36 sm:flex">
                                 <NavLink :href="route('accueil')" :active="route().current('accueil')">
                                        Accueil
                                 </NavLink>
                                <NavLink>
                                    Location
                                </NavLink>
                                <NavLink>
                                    Troque
                                </NavLink>
                                <NavLink>
                                    Certification
                                </NavLink>
                                <NavLink>
                                    Contact
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative" v-if="user">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                @click="toggleUserDropdown"
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ user.lastname }} {{ user.firstname }}
                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content v-if="showingUserDropdown">
                                        <!-- Afficher uniquement lorsque l'utilisateur est connecté -->
                                            <DropdownLink :href="route('dashboard')"> Tableau de bord </DropdownLink>
                                            <DropdownLink :href="route('profile.edit')"> Profil </DropdownLink>
                                            <DropdownLink :href="route('logout')" method="post" as="button">
                                                Déconnexion
                                            </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>

                            <div v-else>
                                <NavLink :href="route('login')">
                                    <img src="/storage/images/User.svg" width="40" alt="">
                                </NavLink>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Tableau de bord
                        </ResponsiveNavLink>
                    </div>

                    <!-- Réglage des option responsive -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                <template v-if="user">{{ user.lastname }} {{ user.firstname }}</template>
                            </div>
                            <div>
                                <template v-if="user">{{ user.email }}</template>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink v-if="user" :href="route('dashboard')">Tableau de bord</ResponsiveNavLink>
                            <ResponsiveNavLink v-if="user" :href="route('profile.edit')">Profil</ResponsiveNavLink>
                            <ResponsiveNavLink v-if="user" :href="route('logout')" method="post" as="button">
                                Déconnexion
                            </ResponsiveNavLink>
                            <ResponsiveNavLink v-else :href="route('login')"> Connexion </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
