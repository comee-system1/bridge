<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<main>
  <div class="container">
    <section class="m-5">

        <div class="col-md-6 mx-auto">
            <?= $this->Flash->render() ?>

            <?=$this->Form->create($member, [
                'type' => 'post',
                'url' => ['controller' => 'login', 'action' => 'index'],
            ]);?>

            <div class="row">
                <label>メールアドレス
                <span class="badge badge-danger">必須</span></label>
                <?=$this->Form->text( "email", [ "type" => "text",

                    "placeholder"=>"メールアドレスを入力してください",
                    "class"=>"form-control",
                    'div'=>false
                ] );
                ?>
            </div>
            <div class="row mt-3">
                <label>パスワード
                <span class="badge badge-danger">必須</span></label>
                <?=$this->Form->text( "password", [ "type" => "password",
                    "placeholder"=>"パスワードを入力してください",
                    "class"=>"form-control"
                ] );
                ?>
            </div>
            <div class="row mt-3">
                <?=$this->Form->input( 'open', array(
                    'type' => 'checkbox',
                    'label' => ' パスワードを表示する',
                    ));?>
            </div>
            <div class="row mt-3">
                <?=$this->Form->input("ログイン",[
                    "type"=>"submit",
                    "value"=>"on",
                    'class'=>"btn btn-warning w-100 text-white",
                    'div'=>false
                ]);?>
            </div>
            <?=$this->Form->end()?>
            <div class="row mt-3">
                パスワードを忘れた方は
                <?=$this->Html->link(
                    'パスワード再設定',
                    '/pages/home',
                );?>
            </div>
        </div>
    </section>
  </div>
</main>