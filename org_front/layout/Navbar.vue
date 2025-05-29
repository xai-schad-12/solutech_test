<template>
    <nav class="bg-white shadow-md">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          
          <!-- Logo -->
          <div class="flex-shrink-0">
            <NuxtLink to="/" class="text-xl font-bold text-indigo-600">
              Events
            </NuxtLink>
          </div>
  
          <!-- Desktop Nav Links -->
          <div class="hidden md:flex space-x-8">
            <NuxtLink
              to="/"
              class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-700 hover:border-indigo-500 hover:text-indigo-600"
              active-class="border-indigo-600 text-indigo-600"
              exact
            >
              Home
            </NuxtLink>
            <NuxtLink
              to="/org"
              class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-700 hover:border-indigo-500 hover:text-indigo-600"
              active-class="border-indigo-600 text-indigo-600"
            >
              Organisation
            </NuxtLink>
            <NuxtLink
              to="/login"
              class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-700 hover:border-indigo-500 hover:text-indigo-600"
              active-class="border-indigo-600 text-indigo-600"
            >
              Connexion
            </NuxtLink>
          </div>
  
          <!-- Mobile menu button -->
          <button
            @click="isOpen = !isOpen"
            type="button"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
            aria-controls="mobile-menu"
            :aria-expanded="isOpen.toString()"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              v-if="!isOpen"
              class="block h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg
              v-else
              class="block h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div
        class="md:hidden"
        id="mobile-menu"
        v-show="isOpen"
      >
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <NuxtLink
            to="/"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
            active-class="bg-indigo-100 text-indigo-700"
            exact
            @click="isOpen = false"
          >
            Home
          </NuxtLink>
          <NuxtLink
            to="/event"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
            active-class="bg-indigo-100 text-indigo-700"
            @click="isOpen = false"
          >
          Event
          </NuxtLink>
          <NuxtLink
            to="/login"
            class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600"
            active-class="bg-indigo-100 text-indigo-700"
            @click="isOpen = false"
          >
            Connexion
          </NuxtLink>
        </div>
      </div>
    </nav>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  const isOpen = ref(false)
  </script>
  
  <style scoped>
  /* Optional: Add your styles here if needed */
  </style>
  