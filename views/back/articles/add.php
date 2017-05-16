<?php
/**
 * Created by PhpStorm.
 * User: crosscomp
 * Date: 23.01.2015
 * Time: 12:23
 */
use Lang\Lang;

?>
<!--Begin Container-->
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Add Article</h1>
        </div>
        <form method="post" enctype="multipart/form-data" id="form">
            <div class="panel-body">
                <div class="group container-fluid">
                    <div class="row col-sm-5 pull-right">
                        <div class="form-group col-sm-13">
                            <label for="alias">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="parentId">Select Parent</label>
                            <select name="parentId">
                                <option value="0">
                                    &bull;
                                    Root
                                </option>
                                <?if(!empty($node)):?>
                                    <?foreach($node as $key => $n):?>
                                        <option value="<?=$key?>">
                                            <?=str_repeat('&nbsp',$n->lvl*2)?>&#1012<?=$n->lvl+2?>;
                                            <?=$n->title?>
                                        </option>
                                    <?endforeach?>
                                <?endif?>
                            </select>
                        </div>
                        <div class="checkbox form-group col-sm-13">
                            <label>
                                <input type="checkbox" name="status" value="1" checked> Status
                            </label>
                        </div>
                        <div class="checkbox-inline form-group col-md-6">
                            <label>
                                <label>
                                    <span>Default Image</span>
                                    <img id="article-photo-url" src="" class="img-thumbnail" alt="Not Selected">
                                    <input id="article-photo-id" type="text" name="photo-id" value="1" hidden>
                                </label>
                            </label>
                        </div>
                        <div class="row article-thumbnail">
                            <div class="col-lg-12">
                                <h1 class="page-header">Last Uploaded Images</h1>
                            </div>
                            <div id="photo-paginate" data-server-url="<?= \Helpers\Uri::makeRouteUri('back.server.photo')?>">
                                <!-- отрисовка View для картинок с постраницей -->
                            </div>
                        </div>
                    </div>
                    <div class="row col-sm-7 pull-left">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <?foreach(Lang::instance()->getLangs() as $iso => $lang):?>
                                <li class="<?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>"><a href="#<?=$iso?>" data-toggle="tab"><?=$lang['name']?></a></li>
                            <?endforeach?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?foreach(Lang::instance()->getLangs() as $iso => $lang):?>
                                <div class="tab-pane <?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>" id="<?=$iso?>">
                                    <div class="form-group col-sm-13">
                                        <label for="title">Title</label>
                                        <input type="text" name="content[<?=$iso?>][title]" class="form-control" id="title" placeholder="Title" <?=((Lang::instance()->isPrimary($iso)) ? ' required' : '')?>>
                                    </div>
                                    <div class="form-group col-sm-13">
                                        <label for="crumb">Crumb</label>
                                        <input type="text" name="content[<?=$iso?>][crumb]" class="form-control" id="crumb" placeholder="Crumb">
                                    </div>
                                    <div class="form-group col-sm-13">
                                        <label for="desc">Description</label>
                                        <textarea name="content[<?=$iso?>][desc]" class="tinymce"></textarea>
                                    </div>
                                    <legend>Meta Content</legend>
                                    <div class="form-group col-sm-13">
                                        <label for="meta_title">Title</label>
                                        <input type="text" name="content[<?=$iso?>][metaTitle]" class="form-control" id="metaTitle" placeholder="Meta Title">
                                    </div>
                                    <div class="form-group col-sm-13">
                                        <label for="meta_desc">Description</label>
                                        <input type="text" name="content[<?=$iso?>][metaDesc]" class="form-control" id="metaDesc" placeholder="Meta Description">
                                    </div>
                                    <div class="form-group col-sm-13">
                                        <label for="name">Keys</label>
                                        <input type="text" name="content[<?=$iso?>][metaKeys]" class="form-control" id="metaKeys" placeholder="Meta Keys">
                                    </div>
                                    <div class="form-group col-sm-13">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <input type="submit" name="submit" value="Add Article" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--End Container-->