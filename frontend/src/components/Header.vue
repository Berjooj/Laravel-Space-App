<template>
  <b-navbar toggleable="sm" type="light" variant="light">
    <b-navbar-brand>
      <f-icon icon="rocket" class="icon icon-left r45"/>
    </b-navbar-brand>

    <b-collapse is-nav>
      <b-navbar-nav>
        <b-nav-text class="logo-texto">Laravel Space App</b-nav-text>
      </b-navbar-nav>
    </b-collapse>

    <b-navbar-brand right>
      <span class="username">{{ user_name }}</span>
      <f-icon icon="user-alt" class="icon icon-right"/>
    </b-navbar-brand>
  </b-navbar>
</template>

<script>
export default {
  name: "Header",
  data() {
    return {
      user_name: 'Olá, Usuário'
    }
  }
}
</script>

<style scoped>
.username {
  font-size: 15px;
  margin-right: 15px;
}
.icon {
  font-size: 30px;
  color: rgba(51, 51, 51, 0.68);
}

.r45 {
  transform: rotate(-45deg);
}

.icon-left {
  margin-top: .5rem;
  margin-left: 2rem;
}

.icon-right {
  margin-right: 2rem;
}

.logo-texto {
  color: #333333 !important;
  font-weight: bold;
  font-family: Helvetica, Arial, sans-serif;
}
</style>