<template>
    <Navbar/>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Inscription à l'événement #{{ eventId }}
      </h1>

      <form @submit.prevent="handleSubmit" class="space-y-4">
        <div>
          <label class="block text-gray-700 font-medium mb-1" for="name">Nom complet</label>
          <input
            v-model="form.name"
            id="name"
            type="text"
            class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
          <input
            v-model="form.email"
            id="email"
            type="email"
            class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1" for="phone">Téléphone</label>
          <input
            v-model="form.phone"
            id="phone"
            type="tel"
            class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500"
            required
          />
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
        >
          S'inscrire
        </button>

        <p v-if="successMessage" class="text-green-600 text-sm mt-3">{{ successMessage }}</p>
      </form>
    </div>
  </div>
</template>
<script setup lang="ts">
import Navbar from '~/layout/Navbar.vue';
const route = useRoute();
const slug = route.params.slug;

import { ref } from 'vue';
import api from '@/composables/useApi'
const eventId = route.params.id as string;

// Données du formulaire
const form = ref({
  name: 'mesha ben',
  email: 'meshben@gmail.com',
  phone: '+243994480142'
});

const successMessage = ref('');

// Soumission du formulaire
async function handleSubmit() {
   try {
    
 
    const responseData  = await api.post(`/${slug}/attendee`, {
        
            event_id: slug,
    
    name:form.value.name,
    email: form.value.email,
    phone :form.value.phone
        
    })

    console.log(responseData)
} catch (error) {
    console.log(error) 
}
}
  


</script>