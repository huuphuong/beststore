<template>
  <div id="root">
    <div class="row">
      <div class="btn-group pull-right m-r-10">
        <router-link :to="{name: 'RoleList'}" class="btn btn-default">
          <span class="glyphicon glyphicon-th-list"></span> Danh sách quyền
        </router-link>

        <router-link :to="{name: 'RoleCreate'}" class="btn btn-default">
          <span class="glyphicon glyphicon-plus"></span> Tạo quyền
        </router-link>
        
        <router-link :to="{name: 'RoleDetail'}" class="btn btn-default">
          <span class="glyphicon glyphicon-eye-open"></span> Chi tiết
        </router-link>
      </div>
    </div>


    <div class="panel panel-default m-t-20">
      <div class="panel-heading">
        <h3 class="panel-title">Sửa quyền</h3>
      </div>
      <form autocomplete="off" method="POST" v-on:submit.prevent="validateBeforeSubmit">
        <div class="panel-body">
          <div class="form-group">
            <label for="">Tên quyền:</label>
            <input type="text" :class="{'form-control': true}" name="postBody.role_name" v-validate="'required'" data-vv-as="Tên nhóm người dùng" v-model="postBody.role_name">
            <span class="label label-danger" v-show="errors.has('postBody.role_name')">{{ errors.first('postBody.role_name') }}</span>
          </div>
          <div class="form-group">
            <label for="">Ghi chú (không bắt buộc):</label>
            <input type="text" class="form-control" v-model="postBody.role_desc">
          </div>
        </div>
        <div class="panel-footer">
          <button type="reset" class="btn btn-default">Hủy bỏ</button>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        <!-- /.panel-footer -->
      </form>
    </div>
  </div>
</template>

<script src="./RoleEdit.js"></script>