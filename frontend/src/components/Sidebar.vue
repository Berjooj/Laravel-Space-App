<template>
  <div class="sidebar" id="sidebar">
    <router-link :class="$route.path === '/' ? 'active' : ''" to="/">Home</router-link>
    <router-link :class="$route.path === '/astronautas' ? 'active' : ''" to="/astronautas">Astronautas</router-link>
    <router-link :class="$route.path === '/naves' ? 'active' : ''" to="/naves">Naves</router-link>
    <router-link :class="$route.path === '/missoes' ? 'active' : ''" to="/missoes">Missões</router-link>
<!--    <router-link :class="activeIndex === 3 ? 'active' : ''" @click="activeIndex = 3" to="/">Contact</router-link>-->
<!--    <router-link :class="activeIndex === 4 ? 'active' : ''" @click="activeIndex = 4" to="/">About</router-link>-->
  </div>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      activeIndex: 1
    }
  }
}
</script>

<style scoped>
.sidebar {
  border-top: 1px solid #e3e3e3;
  border-right: 1px solid #e3e3e3;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #333333;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: #F8F9FA;
  padding: 16px;
  text-decoration: none;
}

.sidebar a:hover {
  cursor: pointer;
}

.sidebar a.active {
  background-color: #F8F9FA;
  color: black;
}

.sidebar a:hover:not(.active) {
  background-color: #F8F9FA;
  color: #555;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>