
<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew" @click="openModalWindow">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
             
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Modify</th>
                  </tr> 

                  
                </tbody></table>
              </div>
            
              <div class="card-footer">
                 
              </div>
            </div>
           
          </div>
        </div>


            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">

                    <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New User</h5>
                    <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update User</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

<form @submit.prevent="editMode ? updateUser() : createUser()">
<div class="modal-body">
     
    <div class="form-group">
        <select name="user_id" class='form-control' v-model='pengguna'>
          <option value='0' >Select User</option>
          <option v-for='data in penggunas' :value='data.id'>{{ data.first_name }}</option>
        </select>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
    <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
</div>

</form>

    </div>
        </div>
        </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                editMode: false,
                pengguna: 0,
                penggunas: []
            }
        },
        methods: {
            getUsers: function(){
                axios.get('api/user_department/get_users')
                .then(function (response) {
                    app.penggunas = response.data;
                });
            },
            openModalWindow(){
                this.editMode = false
                this.getUsers();
            },
        },
        created() { 

        }
    }
</script> 