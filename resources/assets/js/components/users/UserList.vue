<template>
  <div id="root">
    <div class="row">
      <div class="btn-group pull-right m-r-10">
        <router-link :to="{name: 'UserCreate'}" class="btn btn-default">
          <span class="glyphicon glyphicon-plus"></span> Tạo người dùng
        </router-link>
      </div>
    </div>

    <div class="panel panel-default m-t-10">
      <div class="panel-heading">
        <h3 class="panel-title">Danh sách người dùng</h3>
      </div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Họ tên</th>
              <th>E-mail</th>
              <th>Điện thoại</th>
              <th>Giới tính</th>
              <th>Cập nhật lúc</th>
              <th>Quyền hạn</th>
              <th width="15%">Hành động</th>
            </tr>
            <tr>
              <th></th>
              <th>
                <input type="text" v-model="query.id" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.name" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.email" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.phone" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.gender" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.created_at" class="form-control">
              </th>
              <th>
                <input type="text" v-model="query.role" class="form-control">
              </th>
              <th>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary" @click="getListUser(1, query)">Lọc</button>
                  <a href="/users" class="btn btn-default">Hủy</a>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user, key in users">
              <td>
                <img v-if="user.avatar" v-bind:src="user.avatar" v-bind:alt="user.name" class="img-responsive img-circle" width="75px" height="75px">
                <img v-else src="https://jobseekers.vn/wp-content/themes/sb_theme/assets/images/default_avatar.png" v-bind:alt="user.name" class="img-responsive img-circle" width="75px" height="75px">
              </td>
              <td>#U{{ user.id }}</td>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ user.phone }}</td>
              <td>{{ user.gender }}</td>
              <td>{{ user.created_at }}</td>
              <td>{{ user.role_name }}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="glyphicon glyphicon-option-horizontal"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <router-link v-bind:to="{name: 'UserEdit', params: {'id': user.id}}" tag="li">
                     <a><span class="glyphicon glyphicon-pencil"></span> Sửa người dùng</a>
                   </router-link>
                   <router-link v-bind:to="{name: 'UserDetail', params: {'id': user.id}}" tag="li">
                     <a><span class="glyphicon glyphicon-eye-open"></span> Chi tiết</a>
                   </router-link>
                 </ul>
               </div>
             </td>
           </tr>
         </tbody>
       </table>
     </div>
     <div class="panel-footer">
      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-3">
            <ul class="pagination">
              <li>
                <strong>Tổng số: {{ total }}</strong>
              </li>
            </ul>
            <!-- /.pagination -->
          </div>
          <!-- /.col-sm-3 -->
          <div class="col-sm-6">
            <paginate
            :page-count="last_page"
            :click-handler="getListUser"
            :page-range="3"
            :margin-pages="2"
            :prev-text="'Trước'"
            :next-text="'Sau'"
            :container-class="'pagination'"
            :page-class="'page-item'">
          </paginate>
        </div>
      </div>
      <!-- /.col-sm-12 -->
    </div>
  </div>
    </div>
  </div><!-- /.root -->
</template>
<script src="./UserList.js"></script>