<template>
  <div id="root">
    <div class="row">
      <div class="btn-group pull-right m-r-10">
        <router-link :to="{name: 'UserList'}" class="btn btn-default">
          <span class="glyphicon glyphicon-th-list"></span> Danh sách người dùng
        </router-link>
      </div>
    </div>
    <div class="panel panel-default m-t-10">
      <div class="panel-heading">
        <h3 class="panel-title">Tạo người dùng</h3>
      </div>
      <form @submit.prevent="validateBeforeSubmit" method="POST" enctype="multipart/form-data">
        <div class="panel-body">
          <div class="form-group">
            <label for="">Họ tên:</label>
            <input v-validate="'required'" type="text" :class="{'form-control': true, 'is-danger': errors.has('user.name') }" name="user.name" v-model="user.name" data-vv-as="Tên người dùng">
            <span v-show="errors.has('user.name')" class="label label-danger">{{ errors.first('user.name') }}</span>
          </div>
          <div class="form-group">
            <label for="gender">Giới tính:</label>
            <div class="container">
              <input type="radio" value="Male" v-model="user.gender">
              Nam
            </div>
            <div class="container">
              <input type="radio" value="Female" v-model="user.gender">
              Nữ
            </div>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="">Số điện thoại:</label>
            <input type="text" :class="{'form-control': 'true'}" name="user.phone" v-validate="'required|numeric'" v-model="user.phone" data-vv-as="Số điện thoại">
            <span v-show="errors.has('user.phone')" class="label label-danger">{{ errors.first('user.phone') }}</span>
          </div>
          <div class="form-group">
            <label for="role">Quyền:</label>
            <select name="user.role_id" :class="{'form-control': 'true'}" v-validate="'required'" data-vv-as="Nhóm người dùng" v-model="user.role_id">
              <option value="">-- Chọn --</option>
              <option v-for="role in listRole" v-bind:value="role.id">{{ role.role_name }}</option>
            </select>
            <span v-show="errors.has('user.role_id')" class="label label-danger">{{ errors.first('user.role_id') }}</span>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label for="">Email:</label>
            <input type="text" :class="{'form-control': 'true'}" name="user.email" v-validate="'required|email'" v-model="user.email" data-vv-as="Email">
            <span v-show="errors.has('user.email')" class="label label-danger">{{ errors.first('user.email') }}</span>
          </div>
          <div class="form-group">
            <label for="">Mật khẩu:</label>
            <input type="password" :class="{'form-control': 'true'}" name="user.password" v-validate="'required|min:3'" v-model="user.password" data-vv-as="Mật khẩu">
            <span v-show="errors.has('user.password')" class="label label-danger">{{ errors.first('user.password') }}</span>
          </div>
          <div class="form-group">
            <label for="">Xác nhận mật khẩu:</label>
            <input type="password" :class="{'form-control': 'true'}" name="repassword" v-validate="'required|confirmed:user.password'" v-model="repassword" data-vv-as="Xác nhận mật khẩu">
            <span v-show="errors.has('repassword')" class="label label-danger">{{ errors.first('repassword') }}</span>
          </div>
          <div class="form-group">
            <label for="">Ảnh đại diện (không bắt buộc):</label>
            <picture-input
              ref="pictureInput"
              @change="onChangeImage"
              width="350"
              height="350"
              accept="image/jpeg,image/png"
              size="10"
              :crop="true"
              :removable="true"
              :buttonClass="'btn btn-default'"
              :removeButtonClass="'btn btn-warning'"
              :customStrings="{
              upload: '<h1>Bummer!</h1>',
              drag: 'Chọn ảnh đại diện'
              }"
              v-validate="'image'"
              data-vv-value-path="innerValue"
              data-vv-name="customImage"
              data-vv-as="Ảnh đại diện"
              >
            </picture-input>
            <p v-show="errors.has('customImage')" class="label label-danger text-center">{{ errors.first('customImage') }}</p>
          </div>
        </div>
        <div class="panel-footer">
          <button type="reset" class="btn btn-default">Hủy bỏ</button>
          <button type="submit" class="btn btn-primary">Tạo người dùng</button>
        </div>
        <!-- /.panel-footer -->
      </form>
    </div>
  </div>
</template>
<script src="./UserCreate.js"></script>