<template>
<div>
  <div class="bg-gradient-to-tl from-cyan-500 to-blue-500">
    <div class="max-w-xl mx-auto px-6 text-center h-screen">
      <h1 class="text-3xl duration-75 ease-in-out text-white">Welcome</h1>
      <form class="py-4">
        <input class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none placeholder:text-white" type="text" placeholder="Username">
        <input class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none placeholder:text-white" type="password" placeholder="Password">
        <button class="block mx-auto my-3 p-2 w-10/12 text-center border border-white bg-white rounded" type="submit" id="login-button">Login</button>
      </form>
    </div>
  </div>
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
