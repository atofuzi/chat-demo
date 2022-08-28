<template>
  <div>
    <div class="bg-gradient-to-tl from-cyan-500 to-blue-700">
      <div class="max-w-xl mx-auto px-6 text-center h-screen">
        <h1 class="text-3xl duration-75 ease-in-out text-white">Welcome to Chat Demo</h1>
        <form class="py-4">
          <input class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none text-white placeholder:text-white" type="text" placeholder="Username">
          <input class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none text-white placeholder:text-white" type="password" placeholder="Password">
          <button class="block mx-auto my-3 p-2 w-10/12 text-center border border-white bg-white rounded" type="submit" id="login-button">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LoginFromPage'
}
</script>

<style>

</style>