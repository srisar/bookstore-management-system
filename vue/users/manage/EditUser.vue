<template>

  <div>


    <!-- Modal -->
    <div class="modal fade" id="modal-edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-if="user">Edit User: {{ user.display_name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <label>Display name</label>
              <input type="text" v-model="selectedUser.display_name" class="form-control">
            </div>

            <div class="form-group">
              <label>New Password</label>
              <input type="password" v-model="selectedUser.new_password" class="form-control">
            </div>

            <div class="form-group">
              <label>Confirm new password</label>
              <input type="password" v-model="selectedUser.confirm_new_password" class="form-control">
            </div>

            <div class="form-group">
              <label>Role</label>
              <select class="form-control" v-model="selectedUser.role">
                <option v-for="item in roles" :value="item.key">{{ item.value }}</option>
              </select>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


  </div>

</template>

<script>
export default {
  name: "EditUser",
  props: ['user',],

  data() {
    return {
      selectedUser: {
        id: "",
        username: "",
        display_name: "",
        role: "",
        new_password: "",
        confirm_new_password: "",
      },

      roles: [
        {key: 'USER', value: 'User'},
        {key: 'MANAGER', value: 'Manager'},
        {key: 'ADMIN', value: 'Administrator'},
      ],

    }
  },

  watch: {
    user: function (value) {
      if (value !== undefined) {

       this.selectedUser.id = value.id;
       this.selectedUser.username = value.username;
       this.selectedUser.display_name = value.display_name;
       this.selectedUser.role = value.role;

        this.showModal();
      }
    },

  },

  computed: {
    //

    passwordValidated: function () {
      if (this.selectedUser.new_password === "") return false;
      return this.selectedUser.new_password === this.selectedUser.confirm_new_password;
    }

  },

  mounted() {

    $("#modal-edit-user").on('hidden.bs.modal', (e) => {
      this.selectedUser = {
        id: "",
        username: "",
        display_name: "",
        role: "",
        password: ""
      };

      this.$emit('close');
    });

  },

  methods: {

    showModal() {
      $("#modal-edit-user").modal('show');
    },

  },
}
</script>

<style scoped>

</style>