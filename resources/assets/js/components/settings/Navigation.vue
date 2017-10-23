<template>
    <div id="root">
        <div class="btn-group-vertical">
            <button type="button" class="btn btn-default" data-toggle="modal" @click="showModal">Create Navigation</button>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Create navigation</h4>
                        </div>
                        <form method="POST" enctype="multipart/form-data" @submit.prevent="onSubmit">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="text_link">Parent navigation(optional):</label>
                                    <select name="parent_id" class="form-control" v-model="nav.parent_id">
                                        <option value="">Chọn</option>
                                        <option v-for="parent in parents" v-bind:value="parent.id">{{ parent.text_link }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="text_link">Text link:</label>
                                    <input type="text" class="form-control" name="text_link" v-model="nav.text_link" v-validate="'required'" data-vv-as="Tên trang">
                                    <span class="label label-danger" v-show="errors.has('text_link')">{{ errors.first('text_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control" name="url" v-model="nav.url" v-bind:value="slugTitle" v-validate="'required'">
                                    <span class="label label-danger" v-show="errors.has('url')">{{ errors.first('url') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <input type="number" class="form-control" name="display" v-model="nav.position" min="1" maxlength="4" v-validate="'display'" data-vv-as="Vị trí hiển thị">
                                    <span class="label label-danger" v-show="errors.has('display')">{{ errors.first('display') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="display">Display</label>
                                    <div class="form-group">
                                        <input type="radio" name="display" value="1" v-model="nav.display">
                                        Yes
                                        <input type="radio" name="display" value="0" v-model="nav.display">
                                        No
                                    </div>
                                </div>
                                <div v-if="!nav.image" class="form-group">
                                    <label for="">Image(304x238)</label>
                                    <input type="file" @change="onFileChange" name="image">
                                    <span class="label label-danger" v-show="errors.has('image')">{{ errors.first('image') }}</span>
                                </div>
                                <div v-else class="form-group">
                                    <label for="">Image(304x238)</label>
                                    <img :src="nav.image" class="img-responsive" /> <br>
                                    <button @click="removeImage" class="btn btn-default">Remove image</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default m-t-10">
            <div class="panel-heading">
                <h3 class="panel-title">Navigation Setting</h3>
            </div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</template>
<script src="./Navigation.js"></script>