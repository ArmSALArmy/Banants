<?php
/**
 * Created by PhpStorm.
 * User: crosscomp
 * Date: 23.01.2015
 * Time: 12:23
 */

use Lang\Lang;
use Helpers\Uri;

?>
<!--Begin Container-->
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Edit Player</h1>
        </div>
        <form method="post" enctype="multipart/form-data" id="form">
            <div class="panel-body">
                <div class="group container-fluid">
                    <div class="row col-sm-6 pull-right">
                        <div class="form-group col-sm-13">
                            <label for="alias">Slug</label>
                            <input type="text" name="slug" value="<?=$item->slug?>" class="form-control" id="slug" placeholder="Slug" required>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="country">Select Country</label>
                            <select name="country">
                                <?foreach(CountryModel::all() as $i):?>
                                    <option value="<?=$i->id?>" <?=($item->country_id == $i->id) ? ' selected' : ''?>>
                                        <?=$i->title()?>
                                    </option>
                                <?endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="position">Select Position</label>
                            <select name="position">
                                <?foreach(PositionModel::all() as $i):?>
                                    <option value="<?=$i->id?>" <?=($item->position_id == $i->id) ? ' selected' : ''?>>
                                        <?=$i->title()?>
                                    </option>
                                <?endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="team">Select Team</label>
                            <select name="team">
                                <?foreach(TeamModel::orderBy('id')->get() as $i):?>
                                    <option value="<?=$i->id?>" <?=($item->team_id == $i->id) ? ' selected' : ''?>>
                                        <?=$i->article()->title?>
                                    </option>
                                <?endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-sm-9">
                            <label for="number">Set Player Number</label>
                            <input type="number" value="<?=$item->number?>" name="number" class="form-control" id="number" placeholder="Number">
                        </div>
                        <div class="checkbox-inline form-group col-sm-13">
                            <label>
                                <input type="checkbox" name="status" value="1" <?=($item->status) ? ' checked' : ''?>> Status
                            </label>
                        </div>
                    </div>
                    <div class="row col-sm-6 pull-left">
                        <div class="bordered">
                            <div>
                                <div class="form-group col-sm-13">
                                    <label for="entity">First Name</label>
                                    <input type="text" value="<?=$item->firstName()?>" name="first_name" class="form-control" id="entity" placeholder="Primary Language" required>
                                </div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist" id="first-name">
                                    <?foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang):?>
                                        <li class="<?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>"><a href="#first-name-<?=$iso?>" data-toggle="tab"><?=$lang['name']?></a></li>
                                    <?endforeach?>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" id="first-name">
                                    <?foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang):?>
                                        <div class="tab-pane <?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>" id="first-name-<?=$iso?>">
                                            <input type="hidden" name="content[<?=$iso?>][first_name_id]" value="<?= isset($contents[$iso]['firstName']->id) ? $contents[$iso]['firstName']->id : ''?>">
                                            <div class="form-group col-sm-13">
                                                <label for="text">Translated Name</label>
                                                <input type="text" name="content[<?=$iso?>][first_name]" value="<?= isset($contents[$iso]['firstName']->text) ? $contents[$iso]['firstName']->text : ''?>" class="form-control" id="text" placeholder="Player Name" <?=((Lang::instance()->isPrimary($iso)) ? ' required' : '')?>>
                                            </div>
                                        </div>
                                    <?endforeach?>
                                </div>
                            </div>
                            <div>
                                <div class="form-group col-sm-13">
                                    <label for="entity">Last Name</label>
                                    <input type="text" value="<?=$item->lastName()?>" name="last_name" class="form-control" id="entity" placeholder="Primary Language" required>
                                </div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist" id="last-name">
                                    <?foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang):?>
                                        <li class="<?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>"><a href="#last-name-<?=$iso?>" data-toggle="tab"><?=$lang['name']?></a></li>
                                    <?endforeach?>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" id="last-name">
                                    <?foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang):?>
                                        <div class="tab-pane <?=(Lang::instance()->isPrimary($iso)) ? 'active' : ''?>" id="last-name-<?=$iso?>">
                                            <input type="hidden" name="content[<?=$iso?>][last_name_id]" value="<?= isset($contents[$iso]['lastName']->id) ? $contents[$iso]['lastName']->id : ''?>">
                                            <div class="form-group col-sm-13">
                                                <label for="text">Translated Name</label>
                                                <input type="text" name="content[<?=$iso?>][last_name]" value="<?= isset($contents[$iso]['lastName']->text) ? $contents[$iso]['lastName']->text : ''?>" class="form-control" id="text" placeholder="Player Name" <?=((Lang::instance()->isPrimary($iso)) ? ' required' : '')?>>
                                            </div>
                                        </div>
                                    <?endforeach?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-13">
                            <label class="control-label">Select File</label>
                            <input id="image" class="file-loading" name="image" type="file" data-show-upload="false" data-show-caption="true" accept="image/*">
                        </div>
                        <div class="form-group col-sm-13">
                            <div class="btn-group" role="group" aria-label="...">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--End Container-->
<script>
    $(document).on('ready', function() {
        $("#image").fileinput({
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
            allowedFileTypes: ["image"],
            previewClass: "bg-warning",
            initialPreview: [
                <?=($item->icon) ? '\'<img style="height:160px" src="'.File::getImagePath($item->icon).'">\'' : ''?>
            ],
            initialPreviewConfig: [{
                caption: '<?=$item->firstName().' Icon'?>',
                width: "120px",
                url: '<?=Uri::makeRouteUri("back.menus.image.delete")?>',
                key: <?=$item->id?>
            }]
        });

    });
</script>