<template>
  <div id="root">
    <div class="row">
      <div class="btn-group pull-right m-r-10">
        <router-link :to="{name: 'RoleCreate'}" class="btn btn-default">
          <span class="glyphicon glyphicon-plus"></span> Tạo quyền
        </router-link>
      </div>
    </div>

    <!-- /.E -->
    <div class="panel panel-default m-t-10">
      <div class="panel-heading">
        <h3 class="panel-title">Danh sách quyền</h3>
      </div>
      <div class="panel-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Tên quyền</th>
              <th>Nội dung</th>
              <th>Cập nhật lúc</th>
              <th>Hành động</th>
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
                        <a><i class="mdi mdi-pencil"></i> Sửa quyền</a>
                      </router-link>
                      <li v-bind:class="{'point': true}"><a v-on:click="removeRole(role.id)"><i class="mdi mdi-window-close"></i> Xóa quyền</a></li>
                      <router-link :to="{name: 'RoleDetail', params: {id: role.id} }" tag="li">
                        <a><i class="mdi mdi-eye"></i> Xem chi tiết</a>
                      </router-link>
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </template>

  <script src="./RoleList.js"></script>