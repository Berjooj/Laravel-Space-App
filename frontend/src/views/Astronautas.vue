<template>
  <div class="animated fadeIn container-fluid">
    <b-card title="Astronautas" sub-title="Registre ou edite um astronauta">
      <b-alert
          :show="dismissSecs"
          :variant="variant"
          @dismissed="dismissCountDown=0"
          @dismiss-count-down="countDownChanged"

      >
        {{ response }}... {{ dismissCountDown }}
      </b-alert>
      <br>
      <b-row>
        <b-col cols="4">
          <label>Nome</label>
          <b-form-input id="input-small" size="sm" placeholder="Digite o nome do Astronauta"
                        v-model="astronauta.nome"></b-form-input>
        </b-col>

        <b-col cols="4">
          <label>CPF </label>
          <b-form-input id="input-small" size="sm" placeholder="Digite o cpf do Astronauta"
                        v-model="astronauta.cpf"></b-form-input>
        </b-col>

        <b-col cols="4">
          <label>Telefone</label>
          <b-form-input id="input-small" size="sm" placeholder="Digite o telefone do Astronauta"
                        v-model="astronauta.telefone"></b-form-input>
        </b-col>
      </b-row>
      <br>
      <b-row>
        <b-col cols="4">
          <label>Endereço</label>
          <b-form-input id="input-small" size="sm" placeholder="Digite o endereço do Astronauta"
                        v-model="astronauta.endereco"></b-form-input>
        </b-col>

        <b-col cols="4">
          <label>É astronauta?</label>
          <b-form-checkbox
              v-model="astronauta.is_astronauta"
              name="checkbox-1"
              value="accepted"
              unchecked-value="not_accepted">

          </b-form-checkbox>
        </b-col>

        <b-col>
          <b-button variant="primary" @click="adicionar">
            Adionar Novo
          </b-button>
        </b-col>
      </b-row>
      <br>


      <b-row>
        <b-col>
          <b-table striped hover :items="items" :fields="fields" show-empty>
            <template #empty>
              Sem registros para listar
            </template>

            <template v-slot:cell(nome)="data">
              <b-form-input v-model="data.item.nome"></b-form-input>
            </template>

            <template v-slot:cell(cpf)="data">
              <b-form-input v-model="data.item.cpf"></b-form-input>
            </template>

            <template v-slot:cell(telefone)="data">
              <b-form-input v-model="data.item.telefone"></b-form-input>
            </template>

            <template v-slot:cell(endereco)="data">
              <b-form-input v-model="data.item.endereco"></b-form-input>
            </template>

            <template v-slot:cell(is_astronauta)="data">
              <b-form-checkbox
                  id="checkbox-1"
                  v-model="data.item.is_astronauta"
                  name="checkbox-1"
                  value="accepted"
                  unchecked-value="not_accepted"
              >
              </b-form-checkbox>
            </template>
          </b-table>
        </b-col>
      </b-row>

      <b-row>
        <b-col>
          <b-button variant="primary" @click="salvar">
            Salvar
          </b-button>
        </b-col>
      </b-row>
    </b-card>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Astronautas",
  data() {
    return {
      dismissSecs: 5,
      response: '',
      variant: 'success',
      dismissCountDown: 5,
      astronauta: {
        nome: '',
        cpf: '',
        telefone: '',
        endereco: '',
        is_astronauta: ''
      },
      fields: [
        {key: 'nome', label: 'Nome'},
        {key: 'cpf', label: 'CPF'},
        {key: 'telefone', label: 'Telefone'},
        {key: 'endereco', label: 'Endereço'},
        {key: 'is_astronauta', label: 'Astronauta'},
      ],
      items: []
    }
  },
  methods: {
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert() {
      this.dismissCountDown = this.dismissSecs
    },
    salvar() {

    },
    adicionar() {
      axios({
        method: "POST",
        url: "http://localhost:8000/api/usuario",
        data: this.astronauta,
        headers: {"content-type": "application/json", 'Access-Control-Allow-Origin': 'http://localhost:8080'}
      }).then(response => {
        this.response = response.data
        this.variant = 'success'

        this.showAlert()
        // this.getDB()
      }).catch(error => {
        this.variant = 'danger'
        this.response = error

        this.showAlert()
      })
    },
    getDB() {
      axios
          .get('http://localhost:8000/api/usuario')
          .then(response => {
            this.items = response.data.usuarios
            console.log(response)
          })
    }
  },
  beforeMount() {
    this.getDB()
  }
}
</script>

<style scoped>
div {
  font-size: 15px;
}
</style>