<template lang="pug">
#app
  .header
    a-button(type="primary" @click="$router.push({ path: '/Session3' })") Session 3
  .nuxt-content
    Nuxt
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.header {
  margin-bottom: 4rem;
}
</style>
