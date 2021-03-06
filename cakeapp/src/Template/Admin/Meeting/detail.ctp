<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php echo $this->element('admin_head'); ?>

<div class="container-fluid">
  <div class="row">
  <?php echo $this->element('menu'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">商談ルーム詳細</h1>

      </div>
      <?= $this->Flash->render() ?>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <?= $this->Form->create("",[
                    'action'=>"",
                    'method'=>"POST"
                ])?>
                <div class="row">
                    <div class="col-md-12">
                        <p>ID : <?= $compnent->setId($builds->id) ?></p>
                        <p class="h5"><?= h($builds->name) ?></p>
                    </div>
                    <table class="table table-bordered">
                        <tr class="text-center bg-secondary text-white">
                            <th>企業名</th>
                            <th>所在地</th>
                            <th>店舗面積</th>
                            <th>ステータス</th>
                            <th>物件登録日</th>
                            <th>マッチング開始日</th>
                        </tr>
                        <tr>
                            <td><?= h($builds->Users['company']) ?></td>
                            <td>
                                <?php if(isset($array_prefecture[$builds->pref])): ?>
                                <?= h($array_prefecture[$builds->pref]) ?>
                                <?php endif; ?>
                            </td>
                            <td><?= h($builds->shop_area) ?>坪</td>
                            <td>
                                <?php //交渉中と交渉中止、交渉成立以外の場合はリストではなくテキストで
                                    //リストの中身は交渉中と交渉中止、交渉成立
                                ?>
                                <?php
                                    if(
                                        $builds->status == 1 ||
                                        $builds->status == 5 ||
                                        $builds->status == 6
                                    ):
                                    unset($array_status[0]);
                                    unset($array_status[2]);
                                    unset($array_status[3]);
                                    unset($array_status[4]);
                                ?>
                                <?= $this->Form->select('build_status',$array_status,[
                                    'class'=>'appearance-normal',
                                    'default'=>$builds->status
                                ])?>
                                <?php else: ?>
                                <?=$array_status[$builds->status]?>
                                <?php endif; ?>
                            </td>
                            <td><?= h(date("Y/m/d",strtotime($builds->created))) ?></td>
                            <td>
                                <?php if(isset($firstdate->created)): ?>
                                <?= h(date("Y/m/d",strtotime($firstdate->created))) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
        <div class="text-right">
            <a href="/admin/meeting/room/build/<?=$build_id?>" class="btn btn-success text-white">物件登録者商談ルーム</a>
        </div>
        <?php if(empty($buildcomment)):?>
            <div class="card mb-4 mt-2 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <h5>
                            <?= h($builds->Users[ 'sei' ])?>
                            <?= h($builds->Users[ 'mei' ])?>
                        </h5>
                        <div class="col-md-12 text-center">
                            メッセージなし
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="card mb-4 mt-2 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <h6>
                            <?= h($builds->Users[ 'company' ]) ?>
                        </h6>
                        <h5>
                            <?= h($builds->Users[ 'sei' ])?>
                            <?= h($builds->Users[ 'mei' ])?>
                        </h5>
                        <div class="col-md-2">
                            <?php if($buildcomment->readflag == 1):?>
                                <span class="badge badge-secondary"><?= h($array_read[$buildcomment->readflag]) ?></span>
                            <?php else: ?>
                                <span class="badge badge-success text-white"><?= h($array_read[$buildcomment->readflag]) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4">
                            <p><?= nl2br($buildcomment->comment) ?></p>
                        </div>
                        <div class="col-md-6 text-right">
                            <?= h(date("Y/m/d h:i:s",strtotime($buildcomment->created))) ?>
                        </div>
                    </div>
                </div>
                <?php if(isset($buildcomment->file) && $buildcomment->file): ?>
                    <div class="card-footer">
                        <a href="/upload/<?=h($buildcomment->file)?>" class="btn btn-warning text-white" ><?=h($buildcomment->filename)?></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <hr size=2 />
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>管理者⇔テナント登録者</h5>
            </div>
            <div class="col-md-6 text-right">
                <p>交渉中：
                    <?php if(isset($nego[1]) ): ?>
                    <?= $nego[1] ?>
                    <?php else:?> 0
                    <?php endif; ?>
                件　交渉中止：
                    <?php if(isset($nego[5]) ): ?>
                    <?= $nego[5] ?>
                    <?php else:?> 0
                    <?php endif; ?>
                件</p>

                <a href="/admin/meeting/address/<?= h($builds->id) ?>" class="btn btn-primary text-white">新規メッセージ</a>
            </div>
        </div>

        <?php foreach($tenantcomment as $key=>$value): ?>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h6 class="mt-1"><?= h($value->usercompany)?></h6>
                    <h6 class="mt-1"><?= h($value->username)?></h6>

                    <div class="row">

                        <p class="text-right">ステータス：<?=$array_status[$value->status]?></p>
                        <div class="col-md-2 mt-3">
                            <span class="badge badge-secondary">
                            <?= $array_read[$value->readflag] ?>
                            </span>
                        </div>
                        <div class="col-md-4 mt-3">
                            <?= nl2br($value->comment) ?>
                        </div>
                        <div class="col-md-6 text-right mt-1 mt-3">
                            <?= h(date("Y/m/d H:i:s",strtotime($value->created))) ?>
                            <div class="mt-2"><span class="bg-secondary text-white p-1">テナント名</span>：
                                <?= h($value->Tenants[ 'name' ])?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 text-right">
                            <a href="/admin/meeting/room/tenant/<?= h($value->build_id) ?>/<?= h($value->tenant_id) ?>" class="btn btn-danger">商談ルーム</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </main>
  </div>
</div>

