<template lang="html">
  <div class="panel panel-default">
    <form @submit.prevent="validateBeforeSubmit" method="POST" enctype="multipart/form-data">
      <div class="panel-heading">
        <h3 class="panel-title">Crete User</h3>
      </div>
      <div class="panel-body">
        <div class="form-group">
          <label for="">Username:</label>
          <input v-validate="'required'" type="text" :class="{'form-control': true, 'is-danger': errors.has('user.name') }" name="user.name" v-model="user.name" data-vv-as="Tên người dùng">
          <span v-show="errors.has('user.name')" class="label label-danger">{{ errors.first('user.name') }}</span>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <div class="container">
            <input type="radio" value="Male" v-model="user.gender">
            Male
          </div>
          <div class="container">
            <input type="radio" value="Female" v-model="user.gender">
            Female
          </div>
          <!-- /.container -->
        </div>
        <!-- /.form-group -->
        <div class="form-group">
          <label for="">Phone number:</label>
          <input type="text" :class="{'form-control': 'true'}" name="user.phone" v-validate="'required|numeric'" v-model="user.phone" data-vv-as="Số điện thoại">
          <span v-show="errors.has('user.phone')" class="label label-danger">{{ errors.first('user.phone') }}</span>
        </div>
        <div class="form-group">
          <label for="">Email:</label>
          <input type="text" :class="{'form-control': 'true'}" name="user.email" v-validate="'required|email'" v-model="user.email" data-vv-as="Email">
          <span v-show="errors.has('user.email')" class="label label-danger">{{ errors.first('user.email') }}</span>
        </div>
        <div class="form-group">
          <label for="">Password:</label>
          <input type="password" :class="{'form-control': 'true'}" name="user.password" v-validate="'required|min:3'" v-model="user.password" data-vv-as="Mật khẩu">
          <span v-show="errors.has('user.password')" class="label label-danger">{{ errors.first('user.password') }}</span>
        </div>
        <div class="form-group">
          <label for="">Re-password:</label>
          <input type="password" :class="{'form-control': 'true'}" name="repassword" v-validate="'required|confirmed:user.password'" v-model="repassword" data-vv-as="Xác nhận mật khẩu">
          <span v-show="errors.has('repassword')" class="label label-danger">{{ errors.first('repassword') }}</span>
        </div>
        <div class="form-group">
          <label for="">Visa card (optional):</label>
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
                drag: 'Please choose your image.'
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
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Create user</button>
      </div>
      <!-- /.panel-footer -->
    </form>
  </div>
</template>

<script src="./UserCreate.js"></script>