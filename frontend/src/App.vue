<template>
  <div id="app">
    <Header></Header>
    <Sidebar></Sidebar>
    <Breadcrumb></Breadcrumb>
    <div class="main">
      <router-view/>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from './components/Header'
import Sidebar from './components/Sidebar'
import Footer from "@/components/Footer";
import Breadcrumb from "@/components/Breadcrumb";

export default {
  name: 'App',
  components: {
    Header,
    Sidebar,
    Footer,
    Breadcrumb
  }
}
</script>

<style scoped>
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0 10px;
}
</style>
