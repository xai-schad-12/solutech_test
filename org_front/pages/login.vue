<template>
    <Navbar />
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
      <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Connexion</h2>
       
        <form @submit.prevent="handleLogin">
          <!-- Champ email -->
          <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-1">Email</label>
            <input
              id="email"
              v-model="email"
              type="email"
              required
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
  
          <!-- Champ mot de passe -->
          <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-1">Mot de passe</label>
            <input
              id="password"
              v-model="password"
              type="password"
              required
              class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
  
          <!-- Message d'erreur -->
          <div v-if="errorMessage" class="text-red-500 text-sm mb-4 text-center">
            {{ errorMessage }}
          </div>
  
          <!-- Bouton de soumission -->
          <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition"
          >
            Se connecter
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  import Navbar from '~/layout/Navbar.vue'
  
  // États
  const email = ref<string>('')
  const password = ref<string>('')
  const errorMessage = ref<string>('')
  
  const router = useRouter()
  
  // Type de la réponse API attendue
  interface LoginResponse {
    token: string
    user?: {
      id: number
      email: string
    }
  }
  
  const handleLogin = async (): Promise<void> => {
    errorMessage.value = ''
     try {
        
  
    const { data, error } = await useFetch<any>('http://127.0.0.1:8000/api/login', {
      method: 'POST',
      body: {
        email: email.value,
        password: password.value,
      },
    })
     console.log(data);
    if (error.value) {
      errorMessage.value = 'Identifiants incorrects ou erreur serveur.'
      console.error('Erreur API:', error)
      return
    }
  
    const token = data.value?.token
  
    if (token) {
      localStorage.setItem('token', token)
      router.push('/dashboard')
    } else {
      errorMessage.value = 'Connexion échouée.'
    }

} catch (error) {
         console.log(error)
    }
  }
  </script>
  