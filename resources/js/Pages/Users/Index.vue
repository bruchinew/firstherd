<template>
    <div>
        <!-- Filters -->
        <div>
            <input
                type="text"
                v-model="filters.name"
                @input="fetchData"
                placeholder="Filter by name"
            />
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.email">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td class="justify-between flex">
                        {{ user.created_at }}
                        <a :href="route('users.show', { id: user.id })">-></a>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination (optional) -->
        <div v-if="users.last_page > 1">
            <button
                @click="changePage(users.current_page - 1)"
                :disabled="users.current_page === 1"
            >
                Previous
            </button>
            <span>{{ users.current_page }} / {{ users.last_page }}</span>
            <button
                @click="changePage(users.current_page + 1)"
                :disabled="users.current_page === users.last_page"
            >
                Next
            </button>
        </div>
    </div>
    <a :href="route('apple.index')" class="underline italic m-4 text-red-500"
        >Apple.com</a
    >
    <br />
    <a
        :href="route('halperninsurance.index')"
        class="underline italic m-4 text-red-500"
        >Halpern-Insurance.com</a
    >
</template>

<script setup lang="ts">
import { ref, reactive, watch, onMounted } from "vue";
import axios from "axios";

const filters = reactive({
    name: "",
});

const props = defineProps<{
    users: {
        data: App.Data.UserData[];
        current_page: number;
        last_page: number;
    };
}>();

const users = reactive({
    data: props.users.data,
    current_page: props.users.current_page,
    last_page: props.users.last_page,
});

const fetchData = () => {
    axios
        .get("/usersapi", {
            params: {
                name: filters.name,
                page: users.current_page,
            },
        })
        .then((response) => {
            Object.assign(users, response.data);
        })
        .catch((error) => {
            console.log("fetching data");
            console.error("There was an error fetching data:", error);
        });
};

const changePage = (page: number) => {
    if (page < 1 || page > users.last_page) return;
    users.current_page = page;
    fetchData(); // Re-fetch data for the new page
};

watch(filters, fetchData, { deep: true });

onMounted(fetchData);
</script>

<style scoped>
/* Add some basic styles */
table {
    width: 100%;
    border-collapse: collapse;
}
table th,
table td {
    padding: 10px;
    border: 1px solid #ddd;
}
button {
    padding: 5px 10px;
    margin: 5px;
}
</style>
