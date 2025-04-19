<template>
    <div
      class="theme-toggle"
      :data-state="isDark ? 'dark' : 'light'"
      @click="toggle"
    >
      <span class="icon">☀️</span>
      <div class="knob"></div>
      <span class="icon">🌙</span>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';

  const isDark = ref(false);

  function apply(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    isDark.value = theme === 'dark';
  }

  function toggle() {
    const next = isDark.value ? 'light' : 'dark';
    localStorage.setItem('theme', next);
    apply(next);
  }

  onMounted(() => {
    const saved = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    apply(saved || (prefersDark ? 'dark' : 'light'));
  });
  </script>

  <style scoped>
  .theme-toggle {
    width: 64px;
    height: 30px;
    background: var(--bg-secondary);
    border-radius: 15px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 4px;
    cursor: pointer;
    user-select: none;
    transition: background 0.3s ease;
  }

  .theme-toggle .icon {
    font-size: 0.75rem;
    z-index: 1;
    opacity: 0.6;
    transition: opacity 0.3s ease;
  }

  .theme-toggle[data-state="light"] .icon:first-child,
  .theme-toggle[data-state="dark"] .icon:last-child {
    opacity: 1;
  }

  .knob {
    position: absolute;
    top: 2.5px;
    left: 3px;
    width: 25px;
    height: 25px;
    background: white;
    border-radius: 50%;
    transition: transform 0.3s ease;
  }

  .theme-toggle[data-state="dark"] .knob {
    transform: translateX(33px);
  }
  </style>
