<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">List Role</h3>
    </div>
    <div class="panel-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Index</th>
            <th>RoleID</th>
            <th>Role name</th>
            <th>Description</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role, key in listRole">
            <td>{{ ++key }}</td>
            <td>RL{{ role.id }}</td>
            <td>{{ role.role_name }}</td>
            <td>{{ role.role_desc }}</td>
            <td>{{ role.updated_at }}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
                <span class="glyphicon glyphicon-option-horizontal"></span></button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <router-link :to="{name: 'RoleEdit', params: {'id': role.id} }" tag="li">
                    <a><i class="mdi mdi-pencil"></i> Edit Role</a>
                  </router-link>
                  <li v-bind:class="{'point': true}"><a v-on:click="removeRole(role.id)"><i class="mdi mdi-window-close"></i> Delete Role</a></li>
                  <router-link :to="{name: 'RoleDetail', params: {id: role.id} }" tag="li">
                    <a><i class="mdi mdi-eye"></i> View Role Detail</a>
                  </router-link>
                </ul>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script src="./RoleList.js"></script>