<template>
    <div id="root">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Settings</h3>
            </div>

            <form method="post" @submit.prevent="validateBeforeSubmit" enctype="multipart/form-data">
                <div class="panel-body">
                    <!-- HEADER INFORMATION -->
                    <div class="row">
                        <legend class="m-b-20">
                            <h1>HEADER INFOMATION</h1>
                        </legend>

                        <div class="form-group">
                            <label for="">Icon info 1</label>
                            <input type="text" class="form-control" name="header_icon_info_1"
                                   v-model="header_icon_info_1"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_icon_info_1')">{{ errors.first('header_icon_info_1')
                                }}</span>
                        </div>

                        <div class="form-group">
                            <label for="">Text info 1</label>
                            <input type="text" class="form-control" name="header_text_info_1"
                                   v-model="header_text_info_1"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_text_info_1')">{{ errors.first('header_text_info_1')
                                }}</span>
                        </div>

                        <div class="form-group">
                            <label for="">Icon info 2</label>
                            <input type="text" class="form-control" name="header_icon_info_2"
                                   v-model="header_icon_info_2"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_icon_info_2')">{{ errors.first('header_icon_info_2')
                                }}</span>
                        </div>

                        <div class="form-group">
                            <label for="">Text info 2</label>
                            <input type="text" class="form-control" name="header_text_info_2"
                                   v-model="header_text_info_2"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_text_info_2')">{{ errors.first('header_text_info_2')
                                }}</span>
                        </div>

                        <div class="form-group">
                            <label for="">Icon info 3</label>
                            <input type="text" class="form-control" name="header_icon_info_3"
                                   v-model="header_icon_info_3"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_icon_info_3')">{{ errors.first('header_icon_info_3')
                                }}</span>
                        </div>

                        <div class="form-group">
                            <label for="">Text info 3</label>
                            <input type="text" class="form-control" name="header_text_info_3"
                                   v-model="header_text_info_3"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('header_text_info_3')">{{ errors.first('header_text_info_3')
                                }}</span>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- SOCIALITE -->
                    <div class="row">
                        <legend class="m-t-20"><h1>SOCIALITE</h1></legend>
                        <button type="button" class="btn btn-success" @click="addSocial">Add Socialite</button>

                        <div class="input-group m-t-15" v-for="(social,key) in socials">
                            <div class="input-group-addon">Social name:</div>
                            <input type="text" class="form-control" name="social_name" v-model="social_name[key]"/>

                            <div class="input-group-addon">Icon</div>
                            <input type="text" class="form-control" name="social_icon" v-model="social_icon[key]"/>

                            <div class="input-group-addon">URL</div>
                            <input type="text" class="form-control" name="social_url" v-model="social_url[key]"/>

                            <div class="input-group-addon">Order</div>
                            <input type="number" class="form-control" name="social_order" min="1"
                                   v-model="social_order[key]"/>
                            <div class="input-group-addon" style="cursor: pointer;" @click="removeSocialItem(key)"
                                 v-if="key == (socials.length - 1)">X
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- FOOTER -->
                    <div class="row m-t-20">
                        <legend><h1>Footer</h1></legend>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Logo</label>
                                <picture-input
                                        ref="pictureInput"
                                        @change="onChangeImage"
                                        width="200"
                                        height="200"
                                        accept="image/jpeg,image/png"
                                        size="10"
                                        :crop="true"
                                        :removable="true"
                                        :buttonClass="'btn btn-default'"
                                        :removeButtonClass="'btn btn-warning'"
                                        :customStrings="{
                                    upload: '<h1>Bummer!</h1>',
                                    drag: 'Size: 186x74.'
                                }"
                                        v-validate="'image'"
                                        data-vv-value-path="innerValue"
                                        data-vv-name="customImage"
                                        data-vv-as="Ảnh đại diện"
                                >
                                </picture-input>
                            </div>

                            <div class="form-group">
                                <img v-bind:src="avatar" class="img-responsive img-circle" width="100px" height="auto"
                                     v-show="avatar"/>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <textarea name="slogan" class="form-control" v-validate="'required'" v-model="slogan"
                                          data-vv-as="Slogan"></textarea>
                                <span class="label label-danger" v-show="errors.has('slogan')">{{ errors.first('slogan')
                                    }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Newletter</label>
                                <input type="text" class="form-control" name="newletter" v-model="newletter"
                                       v-validate="'required'" data-vv-as="Thông tin thêm">
                                <span class="label label-danger"
                                      v-show="errors.has('newletter')">{{ errors.first('newletter') }}</span>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="">Copyright</label>
                                <textarea class="form-control" name="copyright" v-model="copyright"
                                          v-validate="'required'"></textarea>
                                <span class="label label-danger"
                                      v-show="errors.has('copyright')">{{ errors.first('copyright') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Category name</label>
                                <input type="text" class="form-control" name="categories" v-model="categories"
                                       v-validate="'required'">
                                <span class="label label-danger"
                                      v-show="errors.has('categories')">{{ errors.first('categories') }}</span>
                                <!-- /#inputID.form-control -->
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-success" @click="addPage">Add page</button>

                                <div class="input-group m-t-15" v-for="(page,key) in pages">
                                    <div class="input-group-addon">Page name</div>
                                    <input type="text" class="form-control" name="page_name" v-model="page_name[key]"
                                           placeholder="Page name" v-validate="'required'">
                                    <div class="input-group-addon">Slug</div>
                                    <input type="text" class="form-control" name="page_slug" v-model="page_slug[key]"
                                           placeholder="slug" v-validate="'required'">
                                    <div class="input-group-addon" style="cursor: pointer;" @click="removeItem(key)"
                                         v-if="key == (pages.length - 1)">X
                                    </div>
                                </div>
                                <span class="label label-danger"
                                      v-show="errors.has('page_name')">{{ errors.first('page_name') }}</span>
                                <span class="label label-danger"
                                      v-show="errors.has('page_slug')">{{ errors.first('page_slug') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Shop info (label):</label>
                                <input type="text" class="form-control" name="shop_info" v-model="shop_info"
                                       v-validate="'required'">
                                <span class="label label-danger"
                                      v-show="errors.has('shop_info')">{{ errors.first('shop_info') }}</span>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label for="">Address:</label>
                                <input type="text" class="form-control" name="address" v-model="address"
                                       v-validate="'required'">
                                <span class="label label-danger"
                                      v-show="errors.has('address')">{{ errors.first('address')
                                    }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="text" class="form-control" name="email" v-model="email"
                                       v-validate="'required|email'">
                                <span class="label label-danger" v-show="errors.has('email')">{{ errors.first('email')
                                    }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Phone:</label>
                                <input type="text" class="form-control" name="phone" v-model="phone"
                                       v-validate="'required'">
                                <span class="label label-danger" v-show="errors.has('phone')">{{ errors.first('phone')
                                    }}</span>
                            </div>

                            <div class="form-group">
                                <label for="">Skype:</label>
                                <input type="text" class="form-control" name="skype" v-model="skype"
                                       v-validate="'required'">
                                <span class="label label-danger" v-show="errors.has('skype')">{{ errors.first('skype')
                                    }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- NEW ARRIVAL -->
                    <div class="row m-t-20">
                        <legend><h1>NEW ARRIVALS</h1></legend>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="arr_title" v-model="arr_title"
                                   v-validate="'required'">
                            <span class="label label-danger"
                                  v-show="errors.has('arr_title')">{{ errors.first('arr_title') }}</span>
                            <!-- /#inputID.form-control -->
                        </div>

                        <div class="form-group">
                            <label for="Description">Description:</label>
                            <textarea class="form-control" name="arr_desc" v-model="arr_desc" v-validate="'required'"></textarea>
                            <span class="label label-danger" v-show="errors.has('arr_desc')">{{ errors.first('arr_desc') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="Description">Collection 1:</label>
                            <select name="arr_collection_1" class="form-control" v-model="arr_collection_1" v-validate="'required'">
                                <option value=""> -- Select -- </option>
                                <option v-for="collection in listCollection" v-bind:value="collection.pg_id">{{ collection.pg_name }}</option>
                            </select>
                            <span class="label label-danger" v-show="errors.has('arr_collection_1')">{{ errors.first('arr_collection_1') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="Description">Vendor 1:</label>
                            <select name="vendor_1" class="form-control" v-model="vendor_1" v-validate="'required'">
                                <option value=""> -- Select -- </option>
                                <option v-for="vendor in listVendors" v-bind:value="vendor.vendor_id">{{ vendor.vendor_name }}</option>
                            </select>
                            <span class="label label-danger" v-show="errors.has('vendor_1')">{{ errors.first('vendor_1') }}</span>
                            <!-- /#inputID.form-control -->
                        </div>

                        <div class="form-group">
                            <label for="Description">Text 1:</label>
                            <input type="text" class="form-control" name="text_1" v-model="text_1" v-validate="'required'">
                            <span class="label label-danger" v-show="errors.has('text_1')">{{ errors.first('text_1') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="Description">Vendor 2:</label>
                            <select name="vendor_2" class="form-control" v-model="vendor_2" v-validate="'required'">
                                <option value=""> -- Select -- </option>
                                <option v-for="vendor in listVendors" v-bind:value="vendor.vendor_id">{{ vendor.vendor_name }}</option>
                            </select>
                            <span class="label label-danger" v-show="errors.has('vendor_2')">{{ errors.first('vendor_2') }}</span>
                            <!-- /#inputID.form-control -->
                        </div>

                        <div class="form-group">
                            <label for="Description">Text 2:</label>
                            <input type="text" class="form-control" name="text_2" v-model="text_2" v-validate="'required'">
                            <span class="label label-danger" v-show="errors.has('text_2')">{{ errors.first('text_2') }}</span>
                            <!-- /#inputID.form-control -->
                        </div>

                        <div class="form-group">
                            <label for="Description">Collection 2:</label>
                            <select name="arr_collection_2" class="form-control" v-model="arr_collection_2" v-validate="'required'">
                                <option value=""> -- Select -- </option>
                                <option v-for="collection in listCollection" v-bind:value="collection.pg_id">{{ collection.pg_name }}</option>
                            </select>
                            <span class="label label-danger" v-show="errors.has('arr_collection_2')">{{ errors.first('arr_collection_2') }}</span>
                        </div>
                    </div>
                    <!-- /.row m-t-20 -->
                </div>


                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-lg fix-button">Update Settings</button>
                </div>
            </form>
            <!-- /.form-group -->
        </div>
        <!-- /.panel panel-default -->
    </div>
    <!-- /#root -->
</template>

<script src="./Setting.js"></script>

