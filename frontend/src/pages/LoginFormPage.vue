<template>
  <div>
    <div class="bg-gradient-to-tl from-cyan-500 to-blue-700">
      <div class="max-w-xl mx-auto px-6 text-center h-screen">
        <h1 class="text-3xl duration-75 ease-in-out text-white">Welcome to Chat Demo</h1>
        <form @submit.prevent class="py-4">
          <input v-model="userName" class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none text-white placeholder:text-white" type="text" placeholder="Username">
          <input v-model="password" class="block mx-auto my-3 p-2 w-10/12 text-center border border-white/40 bg-white/20 rounded appearance-none text-white placeholder:text-white" type="password" placeholder="Password">
          <button @click="login()" class="block mx-auto my-3 p-2 w-10/12 text-center border border-white bg-white rounded" type="submit" id="login-button">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from '@vue/reactivity';
import { useStore } from 'vuex';
import { useRouter } from 'vue-router';

export default {
  name: 'LoginFromPage',
  setup() { 
    const store = useStore();
    const router = useRouter();
    
    const userName = ref('');
    const password = ref('');

    
    const login = async () => {
      try {
        const payload = {
          userName:  userName.value,
          password: password.value
        }
        await store.dispatch('authLogin', payload);
        router.push('/chat/');

      } catch (error){
        console.log(error);
      }
    }
    return {
      userName,
      password,
      login
    }  
  }
}
</script>

<style>

</style>