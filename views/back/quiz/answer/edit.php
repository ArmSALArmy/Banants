<?php
/**
 * Created by PhpStorm.
 * User: crosscomp
 * Date: 23.01.2015
 * Time: 12:23
 */

use Lang\Lang;
?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1>Edit Quiz Answer</h1>
        </div>
        <form method="post" action="<?= Helpers\Uri::makeUriFromId('Admin/Quiz/Answer/Edit/'.$item->id) ?>" enctype="multipart/form-data" id="form">
            <div class="panel-body">
                <div class="group container-fluid">
                    <div class="form-group col-sm-13">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= $name->text ?>" class="form-control" id="name" placeholder="Entity..." required>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <? foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang): ?>
                            <li class="<?= (Lang::instance()->isPrimary($iso)) ? 'active' : '' ?>"><a href="#<?= $iso ?>" data-toggle="tab"><?= $lang['name'] ?></a></li>
                        <? endforeach ?>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <? foreach(Lang::instance()->getLangsExcept(Lang::DEFAULT_LANGUAGE) as $iso => $lang): ?>
                            <div class="tab-pane <?= (Lang::instance()->isPrimary($iso)) ? 'active' : '' ?>" id="<?= $iso ?>">
                                <input type="hidden" name="content[<?= $iso ?>][id]" value="<?= $translations[$iso]->id ?>">
                                <div class="form-group col-sm-13">
                                    <label for="text">Text</label>
                                    <input type="text" name="content[<?= $iso ?>][text]" value="<?= $translations[$iso]->text ?>" class="form-control" id="text" placeholder="Text" <?= ((Lang::instance()->isPrimary($iso)) ? ' required' : '') ?>>
                                </div>
                            </div>
                        <? endforeach ?>

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

