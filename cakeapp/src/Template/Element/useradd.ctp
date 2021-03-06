        <section class="mb-5">
            <?= $this->Form->create(null, [
                'type' => 'post',
                'url' => [
                    'controller' => 'users',
                    'action' => $actionkey
                ]
            ]) ?>
            <div class="row col-md-10">
                <div class="col-md-2"><?= __("氏名") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("姓") ?>　</label>
                    <input type="text" name="sei" value="<?= $sei ?>" class="form-control buttoncheck" placeholder="姓を入力してください" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("名") ?>　</label>
                    <input type="text" name="mei" value="<?= $mei ?>" class="form-control buttoncheck" placeholder="名を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("氏名(ふりがな)") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("せい") ?>　</label>
                    <input type="text" name="sei_kana" value="<?= $sei_kana ?>" class="form-control buttoncheck" placeholder="せいを入力してください" />
                </div>
                <div class="col-md-4 form-inline">
                    <label><?= __("めい") ?>　</label>
                    <input type="text" name="mei_kana" value="<?= $mei_kana ?>" class="form-control buttoncheck" placeholder="めいを入力してください" />

                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("企業名") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="company" value="<?= $company ?>" class="form-control buttoncheck" placeholder="企業名を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("業種") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-7">
                    <select class="form-control buttoncheck" name="job">
                        <option value="<?= $job ?>"><?= __("業種を選択してください。") ?></option>
                        <?php foreach ($array_job as $key => $value) :  ?>
                            <?php $selected = "";
                            if ($this->request->is(['post'])) :
                                if ($key == $this->request->getData("job")) :
                                    $selected = "selected";
                                endif;
                            else :
                                if ($key === $job) :
                                    $selected = "selected";
                                endif;
                            endif;
                            ?>
                            <option value="<?= h($key) ?>" <?= $selected ?>><?= h($value) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("住所") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9 ">
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <label><?= __("郵便番号") ?></label>

                            <input type="text" name="post1" value="<?= $post1 ?>" class="form-control buttoncheck" size=3 maxlength=3 placeholder="000" />
                            　-　
                            <input type="text" name="post2" value="<?= $post2 ?>" class="form-control buttoncheck" size=4 maxlength=4 placeholder="0000" onKeyUp="AjaxZip3.zip2addr('post1','post2','prefecture','city','city');" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2"><?= __("都道府県") ?>
                            <select class="form-control buttoncheck" name="prefecture">
                                <option value=""><?= __("都道府県を選択してください") ?></option>
                                <?php foreach ($array_prefecture as $key => $value) :  ?>
                                    <?php $selected = "";
                                    if ($this->request->is(['post'])) :
                                        if ($key == $this->request->getData("prefecture")) :
                                            $selected = "selected";
                                        endif;
                                    else :
                                        if ($key === $prefecture) :
                                            $selected = "selected";
                                        endif;
                                    endif;
                                    ?>

                                    <option value="<?= h($key) ?>" <?= $selected ?>><?= h($value) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2"><?= __("市区町村") ?>
                            <input type="text" name="city" value="<?= $city ?>" class="form-control buttoncheck" placeholder="市区町村を入力してください" />
                        </div>
                        <div class="col-md-12 mt-2"><?= __("番地") ?>
                            <input type="text" name="space" value="<?= $space ?>" class="form-control buttoncheck" placeholder="番地を入力してください" />
                        </div>
                        <div class="col-md-12 mt-2"><?= __("ビル・マンション名") ?>
                            <input type="text" name="build" value="<?= $build ?>" class="form-control buttoncheck" placeholder="ビル・マンション名を入力してください" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("担当部署") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="busyo" value="<?= $busyo ?>" class="form-control buttoncheck" placeholder="担当部署を入力してください" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("電話番号") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9 form-inline ">
                    <input type="text" name="tel1" value="<?= $tel1 ?>" size=3 maxlength=3 class="form-control buttoncheck" placeholder="000" />　-　
                    <input type="text" name="tel2" value="<?= $tel2 ?>" size=4 maxlength=4 class="form-control buttoncheck" placeholder="0000" />　-　
                    <input type="text" name="tel3" value="<?= $tel3 ?>" size=4 maxlength=4 class="form-control buttoncheck" placeholder="0000" />
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("メールアドレス") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9">
                    <input type="text" name="email" value="<?= $email ?>" class="form-control buttoncheck" placeholder="メールアドレスを入力してください" />
                    <div class="alert alert-secondary text-left col-md-12 mt-3" role="alert">
                        受信拒否をしている場合、本人登録用のURLが届かないため、<br />（info@coa-bridge.jp）からの受信ができるように設定してください。
                    </div>
                </div>
            </div>
            <div class="row col-md-10 mt-3">
                <div class="col-md-2"><?= __("パスワード") ?>
                </div>
                <div class="col-md-1">
                    <span class="badge badge-danger">
                        <?= __("必須") ?>
                    </span>
                </div>
                <div class="col-md-9">
                    <?php
                        $placeholder = __("パスワードを入力してください。");
                        if($this->request->getParam("action") === "edit"):
                            $placeholder = __("変更しない場合はパスワードを未入力にしてください。");
                        endif;
                    ?>
                    <input type="password" name="password" value="<?= $password ?>" class="form-control buttoncheck" placeholder="<?=$placeholder?>" />
                    <div class="alert alert-secondary col-md-12 mt-3" role="alert">
                        <p class="text-left"><?= __("下記の条件でパスワードを作成してください。") ?></p>
                        <ul class="text-left">
                            <?php if($this->request->getParam("action") === "edit"):?>
                            <li><?= $placeholder ?></li>
                            <?php endif; ?>
                            <li><?= __("8文字以上") ?></li>
                            <li><?= __("半角英数を含む") ?></li>
                            <li><?= __("半角英字を含む") ?></li>
                        </ul>
                    </div>
                    <?php
                    if (
                        $user->agree == 0 ||
                        (empty($role) || $role != "admin" ) &&
                        !$id
                    ): ?>
                        <div class="alert alert-danger col-md-12 form-control text-center" role="alert">
                            <?= $this->Form->checkbox("agree",[
                                'required'=>true
                            ])?>
                            <a href="/pdf/termofuse.pdf" target=_blank class="alert-link">利用規約</a>
                            に同意する
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="agree" value=1 >
                    <?php endif; ?>
                    <div class="text-center">
                        <?php
                            $button = __("登録確認");
                            if($id > 0 ) $button = __("更新確認");
                        ?>
                        <?= $this->Form->submit($button, [
                            'class' => 'btn btn-warning text-white',
                            'disabled' => 'disabled',
                            'id' => 'regist',
                            'name'=> 'editconf'
                        ]) ?>
                    </div>
                </div>
            </div>

            <?= $this->Form->end(); ?>
        </section>
