<template>
  <b-breadcrumb class="breadcrumb" :items="items"></b-breadcrumb>
</template>

<script>
export default {
  name: 'Breadcrumb',
  data() {
    return {
      items: [
        {
          text: 'Home',
          href: '/'
        },
        {
          text: 'App2',
          href: '/app2'
        },
      ]
    }
  }
}
</script>

<style scoped>
.breadcrumb {
  margin-left: 200px;
  padding: 5px;
  background-color: whitesmoke;
  border-top: 1px solid #e3e3e3;
}
</style>