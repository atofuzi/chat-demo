<template>
<div>
  <header class="flex h-10 leading-10 justify-between">
    <h1 class="ml-2">Chat Demo</h1>
    <!-- use the router-link component for navigation. -->
    <!-- specify the link by passing the `to` prop. -->
    <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
    <nav class="space-x-2">
      <router-link to="/home">Home</router-link>
      <router-link to="/login">Login</router-link>
    </nav>
  </header>
  <router-view></router-view>
</div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'

export default {
  name: 'App',
  // components: {
  //   HelloWorld
  // }
}
</script>

<style>

</style>
