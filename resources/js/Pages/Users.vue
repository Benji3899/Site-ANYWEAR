<template>
    <div>
        <div v-if="users.length">
            <div v-for="user in users" :key="user.id">
                <h3>{{ user.firstname }} {{ user.lastname }}</h3>
                <ul>
                    <li v-for="order in user.orders" :key="order.id">
                        Commande n°{{ order.id }} - Prix: {{ order.price }}
                    </li>
                </ul>
            </div>
        </div>
        <div v-else>
            <p>Chargement des utilisateurs...</p>
        </div>
    </div>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const { users } = usePage().props.value;
        return { users };
    }
};
</script>
