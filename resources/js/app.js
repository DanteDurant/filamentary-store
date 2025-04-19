import './bootstrap';
import { createApp } from 'vue';
import ThemeToggle from './components/ThemeToggle.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// 1️⃣ Initialize theme from localStorage or system preference
const saved = localStorage.getItem('theme');
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
const theme = saved || (prefersDark ? 'dark' : 'light');
document.documentElement.setAttribute('data-theme', theme);

// 2️⃣ Helper to toggle
window.toggleTheme = () => {
  const next = document.documentElement.getAttribute('data-theme') === 'dark'
    ? 'light'
    : 'dark';
  document.documentElement.setAttribute('data-theme', next);
  localStorage.setItem('theme', next);
};


const app = createApp({});
app.component('theme-toggle', ThemeToggle);
app.mount('#app');
