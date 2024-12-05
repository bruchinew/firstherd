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
            <select v-model="filters.category" @change="fetchData">
                <option value="">Select Category</option>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <!-- Add more categories as needed -->
            </select>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items.data" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.category }}</td>
                    <td>{{ item.price }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination (optional) -->
        <div v-if="items.last_page > 1">
            <button
                @click="changePage(items.current_page - 1)"
                :disabled="items.current_page === 1"
            >
                Previous
            </button>
            <span>{{ items.current_page }} / {{ items.last_page }}</span>
            <button
                @click="changePage(items.current_page + 1)"
                :disabled="items.current_page === items.last_page"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            filters: {
                name: "",
                category: "",
            },
            items: {
                data: [],
                current_page: 1,
                last_page: 1,
            },
        };
    },
    methods: {
        // Fetch data based on filters
        fetchData() {
            axios
                .get("/api/items", {
                    params: {
                        name: this.filters.name,
                        category: this.filters.category,
                        page: this.items.current_page,
                    },
                })
                .then((response) => {
                    this.items = response.data;
                })
                .catch((error) => {
                    console.error("There was an error fetching data:", error);
                });
        },

        // Handle pagination
        changePage(page) {
            if (page < 1 || page > this.items.last_page) return;
            this.items.current_page = page;
            this.fetchData(); // Re-fetch data for the new page
        },
    },
    watch: {
        // Watch for filter changes to refresh the table data
        "filters.name": "fetchData",
        "filters.category": "fetchData",
    },
    mounted() {
        this.fetchData(); // Fetch initial data
    },
};
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
