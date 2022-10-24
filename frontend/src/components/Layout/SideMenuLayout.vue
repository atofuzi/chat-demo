<template>
<div>
  <HeaderNavigator></HeaderNavigator>
  <SideMenu></SideMenu>
  <router-view></router-view>
</div>

</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'
import HeaderNavigator from '@/components/Layout/parts/HeaderNavigator.vue';
import SideMenu from '@/components/Layout/parts/SideMenu.vue';

export default {
  name: 'App',
  components: {
    HeaderNavigator,
    SideMenu
  },
  data: function() {
    return {
      isShowUserMenue: false,
    }
  },
  methods: {
    toggleUserMenue() {
      this.isShowUserMenue = (this.isShowUserMenue)? false: true;
    }
    
  },
}
</script>

<style>

</style>
