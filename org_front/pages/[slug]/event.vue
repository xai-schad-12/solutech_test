<template>
    <Navbar/>
    <div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto space-y-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Événements pour « {{ slug }} »</h1>

      <div v-if="!events" class="text-gray-600">Chargement des événements...</div>
    
      <div v-else-if="!events || events.length === 0" class="text-gray-600">Aucun événement trouvé.</div>
      
      <ul v-else class="space-y-6">
        <li v-for="event in events" :key="event.id" class="bg-white p-6 rounded-lg shadow">
          <h2 class="text-2xl font-semibold mb-2">{{ event.title }}</h2>
          <p class="text-gray-700 mb-1"><strong>Description:</strong> {{ event.description }}</p>
          <p class="text-gray-700 mb-1"><strong>Lieu:</strong> {{ event.venue }}</p>
          <p class="text-gray-700 mb-1"><strong>Date:</strong> {{ formatDate(event.date) }}</p>
          <p class="text-gray-700 mb-1"><strong>Prix:</strong> {{ formatPrice(event.price) }}</p>
          <p class="text-gray-700"><strong>Capacité maximale:</strong> {{ event.max_attendees }} participants</p>
          <!-- Bouton d'inscription -->
          <button
            @click="register(event.id)"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
          >
            S'inscrire
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>
<script setup lang="ts">
import Navbar from '~/layout/Navbar.vue';
const route = useRoute();
const router = useRouter();
const slug = route.params.slug;
interface Event {
  id: number
  organization_id: number
  title: string
  description: string
  venue: string
  date: string
  price: string
  max_attendees: number
  created_at: string
  updated_at: string
  deleted_at: string | null
}
function formatDate(dateStr?: string): string {
  if (!dateStr) return ''
  return new Date(dateStr).toLocaleDateString('fr-FR', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  });
}
let events:any;
try {
    const data:Event = await $fetch(`http://127.0.0.1:8000/api/${slug}/events`);
    events=data;
} catch (error) {
    
}

function formatPrice(price?: string): string {
  if (!price) return ''
  return new Intl.NumberFormat('fr-FR', {
    style: 'currency',
    currency: 'EUR'
  }).format(parseFloat(price));
}

function register(eventId: number) {
  
  router.push(`/${eventId}/inscription`);
  // Ici, tu peux appeler une API pour inscrire l'utilisateur
}
</script>