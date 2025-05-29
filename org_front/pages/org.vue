<template>
    <Navbar/>
   
    <div class="min-h-screen bg-gray-100 p-8">
  <h1 class="text-2xl font-bold mb-6">Liste des organisations</h1>

  <ul v-if="items?.length" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <li
      v-for="item in items"
      :key="item.id"
      class="bg-white p-6 rounded-lg shadow hover:shadow-md transition border border-gray-200"
    >
      <div class="flex items-center space-x-4">
        <!-- Placeholder for org logo or icon -->
        <div class="flex-shrink-0 w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center text-gray-500">
          <span class="text-xl font-semibold uppercase">{{ item.name.charAt(0) }}</span>
        </div>
        <div>
          <h2 class="text-lg font-semibold text-gray-800">{{ item.name }}</h2>
          <p class="text-sm text-gray-500">Slug: {{ item.slug }}</p>
        </div>
      </div>

      <div class="mt-4">
        <a
          :href="`/${item.slug}/event`"
          class="inline-block text-blue-600 hover:text-blue-800 text-sm font-medium"
        >
          Voir les détails →
        </a>
      </div>
    </li>
  </ul>

  <div v-else class="text-gray-500 mt-6">Aucun élément trouvé.</div>
</div>

</template>
<script setup lang="ts">
import Navbar from '~/layout/Navbar.vue';
// Définir le type attendu
interface Item {
  id: number
  name: string
}
let items:any=[];



try {
    const posts = await $fetch('http://127.0.0.1:8000/api/organization');
 items=posts;
} catch (error) {
     console.log(error);
}

</script>