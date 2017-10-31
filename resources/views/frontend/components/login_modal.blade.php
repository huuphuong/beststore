<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-info">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body modal-spa">
        <div class="login-grids">
          <div class="login">
            <div class="login-bottom" id="loginBottom">
              <h3>Đăng ký</h3>

              <div v-show="className" v-bind:class="className">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span v-html="message"></span>
              </div>

              <form method="POST" autocomplete="off" @submit.prevent="validateBeforeSubmit">
                <div class="sign-up">
                  <h4>Email :</h4>
                  <input type="text" placeholder="Type here" v-model="remail" name="remail" v-validate="'required|email'" data-vv-as="Email">
                  <label class="label label-danger" v-show="errors.has('remail')">
                    <span class="glyphicon glyphicon-exclamation-sign"></span> @{{ errors.first('remail') }}
                  </label>
                </div>

                <div class="sign-up">
                  <h4>Mật khẩu :</h4>
                  <input type="password" v-model="rpassword" name="rpassword" v-validate="'required|min:5'" data-vv-as="Mật khẩu">
                   <label class="label label-danger" v-show="errors.has('rpassword')">
                    <span class="glyphicon glyphicon-exclamation-sign"></span> @{{ errors.first('rpassword') }}
                  </label>
                </div>

                <div class="sign-up">
                  <h4>Nhập lại mật khẩu :</h4>
                  <input type="password" v-model="rcpassword" name="rcpassword" v-validate="'required|confirmed:rpassword'" data-vv-as="Xác nhận mật khẩu">
                   <label class="label label-danger" v-show="errors.has('rcpassword')">
                    <span class="glyphicon glyphicon-exclamation-sign"></span> @{{ errors.first('rcpassword') }}
                  </label>
                </div>

                <div class="sign-up m-t-6">
                  <input type="submit" value="Đăng ký ngay" />
                </div>
              </form>
            </div>


            <div class="login-right">
              <h3>Đăng nhập tài khoản của mình</h3>
              <form>
                <div class="sign-in">
                  <h4>Email :</h4>
                  <input type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                </div>
                <div class="sign-in">
                  <h4>Mật khẩu :</h4>
                  <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                  <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="single-bottom">
                  <input type="checkbox"  id="brand" value="">
                  <label for="brand"><span></span>Lưu đăng nhập.</label>
                </div>
                <div class="sign-in">
                  <input type="submit" value="Đăng nhập" />
                </div>
              </form>
            </div>
            <div class="clearfix"></div>
          </div>
          <p>Bằng cách đăng nhập, bạn đã đồng ý với những <a href="#">điều khoản</a> và <a href="#">chính sách</a> của chúng tôi.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- //login -->